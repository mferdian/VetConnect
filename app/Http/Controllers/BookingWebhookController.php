<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BookingWebhookController extends Controller
{
    /**
     * Handle incoming webhook untuk booking
     */
    public function handleBookingWebhook(Request $request): JsonResponse
    {
        try {
            // Log incoming webhook request
            Log::info('Booking webhook received', [
                'payload' => $request->all(),
                'headers' => $request->headers->all()
            ]);

            // Validasi webhook signature (opsional, untuk keamanan)
            if (!$this->validateWebhookSignature($request)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid webhook signature'
                ], 401);
            }

            // Validasi data yang diterima
            $validator = Validator::make($request->all(), [
                'order_id' => 'required|string|unique:bookings,order_id',
                'user_id' => 'required|exists:users,id',
                'vet_id' => 'required|exists:vets,id',
                'vet_date_id' => 'required|exists:vet_dates,id',
                'vet_time_id' => 'required|exists:vet_times,id',
                'keluhan' => 'nullable|string',
                'total_harga' => 'required|integer|min:0',
                'status' => 'required|in:confirmed,pending,canceled',
                'status_bayar' => 'required|in:berhasil,gagal,pending',
                'metode_pembayaran' => 'required|in:transfer_bank,e-wallet,cash,lainnya'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Mulai database transaction
            DB::beginTransaction();

            try {
                // Buat booking baru
                $booking = Booking::create([
                    'order_id' => $request->order_id,
                    'user_id' => $request->user_id,
                    'vet_id' => $request->vet_id,
                    'vet_date_id' => $request->vet_date_id,
                    'vet_time_id' => $request->vet_time_id,
                    'keluhan' => $request->keluhan,
                    'total_harga' => $request->total_harga,
                    'status' => $request->status,
                    'status_bayar' => $request->status_bayar,
                    'metode_pembayaran' => $request->metode_pembayaran
                ]);

                // Commit transaction
                DB::commit();

                // Log successful booking creation
                Log::info('Booking created successfully via webhook', [
                    'booking_id' => $booking->id,
                    'order_id' => $booking->order_id
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Booking created successfully',
                    'data' => [
                        'id' => $booking->id,
                        'order_id' => $booking->order_id,
                        'status' => $booking->status,
                        'created_at' => $booking->created_at->toISOString()
                    ]
                ], 201);

            } catch (\Exception $e) {
                // Rollback transaction jika ada error
                DB::rollback();
                throw $e;
            }

        } catch (\Exception $e) {
            // Log error
            Log::error('Booking webhook failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'payload' => $request->all()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error',
                'error' => config('app.debug') ? $e->getMessage() : 'Something went wrong'
            ], 500);
        }
    }

    /**
     * Handle webhook untuk update status booking
     */
    public function updateBookingStatus(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'order_id' => 'required|string|exists:bookings,order_id',
                'status' => 'nullable|in:confirmed,pending,canceled',
                'status_bayar' => 'nullable|in:berhasil,gagal,pending'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $booking = Booking::where('order_id', $request->order_id)->first();

            $updateData = [];
            if ($request->has('status')) {
                $updateData['status'] = $request->status;
            }
            if ($request->has('status_bayar')) {
                $updateData['status_bayar'] = $request->status_bayar;
            }

            if (!empty($updateData)) {
                $booking->update($updateData);

                Log::info('Booking status updated via webhook', [
                    'order_id' => $booking->order_id,
                    'updates' => $updateData
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Booking status updated successfully',
                'data' => [
                    'order_id' => $booking->order_id,
                    'status' => $booking->status,
                    'status_bayar' => $booking->status_bayar
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Booking status update webhook failed', [
                'error' => $e->getMessage(),
                'payload' => $request->all()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update booking status'
            ], 500);
        }
    }

    /**
     * Validasi webhook signature untuk keamanan
     */
    private function validateWebhookSignature(Request $request): bool
    {
        $webhookSecret = config('app.webhook_secret'); // Set di .env

        if (!$webhookSecret) {
            return true; // Skip validation jika secret tidak diset
        }

        $signature = $request->header('X-Webhook-Signature');
        $payload = $request->getContent();

        $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $webhookSecret);

        return hash_equals($expectedSignature, $signature);
    }
}
