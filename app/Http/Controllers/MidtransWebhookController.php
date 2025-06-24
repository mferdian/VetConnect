<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $data = $request->all();

        // Log semua data request yang diterima
        Log::info('Midtrans webhook received', [
            'data' => $data,
        ]);

        // Ambil data penting dari request
        $orderId = $data['order_id'] ?? null;
        $transactionStatus = $data['transaction_status'] ?? null;
        $fraudStatus = $data['fraud_status'] ?? null;

        // Validasi awal
        if (!$orderId || !$transactionStatus) {
            Log::warning("Invalid Midtrans webhook data", $data);
            return response()->json(['status' => 'error', 'message' => 'Invalid payload'], 400);
        }

        // Cari booking berdasarkan order_id
        $booking = Booking::where('order_id', $orderId)->first();

        if (!$booking) {
            Log::warning('Booking not found: ' . $orderId);
            return response()->json(['status' => 'error', 'message' => 'Booking not found'], 404);
        }

        // Update status booking
        $this->updateBookingStatus($booking, $transactionStatus, $fraudStatus);

        return response()->json(['status' => 'success'], 200);
    }

    private function updateBookingStatus(Booking $booking, string $transactionStatus, ?string $fraudStatus = null)
    {
        $statusUpdate = [];

        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus === 'challenge') {
                    $statusUpdate = [
                        'status' => 'pending',
                        'status_bayar' => 'pending',
                    ];
                } elseif ($fraudStatus === 'accept') {
                    $statusUpdate = [
                        'status' => 'confirmed',
                        'status_bayar' => 'berhasil',
                    ];
                }
                break;

            case 'settlement':
                $statusUpdate = [
                    'status' => 'confirmed',
                    'status_bayar' => 'berhasil',
                ];
                break;

            case 'pending':
                $statusUpdate = [
                    'status' => 'pending',
                    'status_bayar' => 'pending',
                ];
                break;

            case 'deny':
            case 'cancel':
            case 'expire':
            case 'failure':
                $statusUpdate = [
                    'status' => 'canceled',
                    'status_bayar' => 'gagal',
                ];
                break;

            default:
                Log::warning("Unknown transaction status: {$transactionStatus} for booking {$booking->order_id}");
                return;
        }

        if (!empty($statusUpdate)) {
            $booking->update($statusUpdate);
            Log::info("Booking {$booking->order_id} updated", $statusUpdate);
        }
    }
}
