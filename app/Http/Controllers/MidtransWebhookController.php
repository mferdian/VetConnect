<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log incoming webhook untuk debugging
        Log::info('Midtrans Webhook Received', $request->all());

        try {
            // Ambil data dari webhook
            $orderId = $request->order_id;
            $statusCode = $request->status_code;
            $grossAmount = $request->gross_amount;
            $transactionStatus = $request->transaction_status;
            $fraudStatus = $request->fraud_status ?? null;
            $signatureKey = $request->signature_key;

            // Verifikasi signature key untuk keamanan
            $serverKey = config('midtrans.serverkey');
            $hashedKey = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

            if ($hashedKey !== $signatureKey) {
                Log::error('Invalid signature key', [
                    'order_id' => $orderId,
                    'expected' => $hashedKey,
                    'received' => $signatureKey
                ]);
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
            }

            // Cari booking berdasarkan order_id
            $booking = Booking::where('order_id', $orderId)->first();

            if (!$booking) {
                Log::error('Booking not found', ['order_id' => $orderId]);
                return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
            }

            // Update status berdasarkan transaction_status dari Midtrans
            DB::beginTransaction();

            try {
                $this->updateBookingStatus($booking, $transactionStatus, $fraudStatus);
                DB::commit();

                Log::info('Booking status updated successfully', [
                    'order_id' => $orderId,
                    'booking_id' => $booking->id,
                    'new_status' => $booking->status,
                    'new_status_bayar' => $booking->status_bayar
                ]);

                return response()->json(['status' => 'success'], 200);

            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Webhook processing error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json(['status' => 'error', 'message' => 'Internal server error'], 500);
        }
    }

    private function updateBookingStatus(Booking $booking, string $transactionStatus, ?string $fraudStatus = null)
    {
        // Simpan status lama untuk logging
        $oldStatus = $booking->status;
        $oldStatusBayar = $booking->status_bayar;

        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus == 'challenge') {
                    // Pembayaran berhasil tetapi perlu verifikasi manual
                    $booking->status_bayar = 'pending';
                    $booking->status = 'pending';
                } else if ($fraudStatus == 'accept') {
                    // Pembayaran berhasil dan aman
                    $booking->status_bayar = 'berhasil';
                    $booking->status = 'confirmed';
                }
                break;

            case 'settlement':
                // Pembayaran berhasil (untuk non-credit card)
                $booking->status_bayar = 'berhasil';
                $booking->status = 'confirmed';
                break;

            case 'pending':
                // Pembayaran pending - hanya update jika belum berhasil
                if ($booking->status_bayar !== 'berhasil') {
                    $booking->status_bayar = 'pending';
                    $booking->status = 'pending';
                }
                break;

            case 'deny':
            case 'expire':
            case 'cancel':
                // Pembayaran ditolak/expired/dibatalkan
                $booking->status_bayar = 'gagal';
                $booking->status = 'canceled';
                break;

            case 'failure':
                // Pembayaran gagal
                $booking->status_bayar = 'gagal';
                $booking->status = 'canceled';
                break;

            default:
                Log::warning('Unknown transaction status', [
                    'order_id' => $booking->order_id,
                    'transaction_status' => $transactionStatus
                ]);
                return;
        }

        // Hanya save jika ada perubahan
        if ($oldStatus !== $booking->status || $oldStatusBayar !== $booking->status_bayar) {
            $booking->save();

            // Log perubahan status
            Log::info('Booking status changed', [
                'order_id' => $booking->order_id,
                'booking_id' => $booking->id,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'old_status' => $oldStatus,
                'new_status' => $booking->status,
                'old_status_bayar' => $oldStatusBayar,
                'new_status_bayar' => $booking->status_bayar
            ]);

            // Kirim notifikasi jika pembayaran berhasil
            if ($booking->status_bayar === 'berhasil' && $oldStatusBayar !== 'berhasil') {
                $this->sendNotificationToUser($booking);
            }
        }
    }

    // Opsional: Method untuk mengirim notifikasi
    private function sendNotificationToUser(Booking $booking)
    {
        // Implementasi notifikasi email/SMS
        // Contoh: Mail::to($booking->user->email)->send(new BookingConfirmation($booking));
    }
}
