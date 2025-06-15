<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Vet;
use Midtrans\Config;
use App\Models\Review;
use App\Models\Booking;
use App\Models\VetTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookingDetail($id)
    {
        $vet = Vet::with(['vetReviews', 'vetDates.vetTimes'])->findOrFail($id);

        // Generate tanggal dan waktu kalau kosong
        if ($vet->vetDates->isEmpty()) {
            $this->generateAvailableDates($vet->id);
            $vet = Vet::with(['vetReviews', 'vetDates.vetTimes'])->findOrFail($id);
        }

        return view('booking-detail', compact('vet'));
    }

    private function generateAvailableDates($vetId)
    {
        $startDate = Carbon::today();

        for ($i = 0; $i < 14; $i++) {
            $date = $startDate->copy()->addDays($i);

            // Skip hari Minggu
            if ($date->dayOfWeek === Carbon::SUNDAY) {
                continue;
            }

            $vetDate = \App\Models\VetDate::create([
                'vet_id' => $vetId,
                'tanggal' => $date
            ]);

            // PERBAIKAN: Gunakan field yang sesuai dengan model
            for ($hour = 8; $hour < 17; $hour++) {
                $jamMulai = sprintf('%02d:00:00', $hour);
                $jamSelesai = sprintf('%02d:00:00', $hour + 1);

                \App\Models\VetTime::create([
                    'vet_date_id' => $vetDate->id,
                    'jam_mulai' => $jamMulai,
                    'jam_selesai' => $jamSelesai,
                ]);
            }
        }
    }

    public static function generateUniqueOrderId(): string
    {
        $prefix = 'ORDER-';

        do {
            $randomString = $prefix . mt_rand(100000, 999999); // Random 6 digit
        } while (Booking::where('order_id', $randomString)->exists());

        return $randomString;
    }

    public function store(Request $request)
    {
        $request->validate([
            'vet_id' => 'required|exists:vets,id',
            'vet_date_id' => 'required|exists:vet_dates,id',
            'vet_time_id' => 'required|exists:vet_times,id',
            'keluhan' => 'required|string',
        ]);

        $orderId = self::generateUniqueOrderId();

        session(['booking_data' => [
            'user_id' => Auth::id(),
            'vet_id' => $request->vet_id,
            'vet_date_id' => $request->vet_date_id,
            'vet_time_id' => $request->vet_time_id,
            'keluhan' => $request->keluhan,
            'total_harga' => $request->harga,
            'status' => 'pending',
            'status_bayar' => 'pending',
            'metode_pembayaran' => 'transfer_bank',
            'order_id' => $orderId,
        ]]);

        return redirect()->route('payment.page', ['vet' => $request->vet_id]);
    }

    public function getTimes($vetDateId)
    {

        $vetTimes = VetTime::where('vet_date_id', $vetDateId)
            ->select('id', 'jam_mulai', 'jam_selesai')
            ->get()
            ->map(function ($time) {
                return [
                    'id' => $time->id,
                    'jam_mulai' => $time->jam_mulai,
                    'jam_selesai' => $time->jam_selesai,
                    // Format untuk display (opsional)
                    'display_time' => substr($time->jam_mulai, 0, 5) . ' - ' . substr($time->jam_selesai, 0, 5)
                ];
            });

        return response()->json($vetTimes);
    }

    public function show($vetId)
    {
        $vet = Vet::findOrFail($vetId);

        $bookingData = session('booking_data');

        if (!$bookingData) {
            return redirect()->route('home')->with('error', 'Data booking tidak ditemukan.');
        }

        // Midtrans Setup
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Kalau sudah ada Snap Token di session, pakai itu
        if (isset($bookingData['snap_token']) && !empty($bookingData['snap_token'])) {
            $snapToken = $bookingData['snap_token'];
        } else {
            // Kalau belum ada, baru generate Snap Token baru
            $params = [
                'transaction_details' => [
                    'order_id' => $bookingData['order_id'],
                    'gross_amount' => $bookingData['total_harga'],
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            // Update session dengan snap_token
            session(['booking_data' => array_merge($bookingData, [
                'snap_token' => $snapToken,
            ])]);
        }

        return view('payment-midtrans', compact('vet', 'snapToken'));
    }

    public function confirmPayment(Request $request)
    {
        $paymentStatus = $request->input('status');

        $bookingData = session('booking_data');

        if ($paymentStatus === 'berhasil' && $bookingData) {
            Booking::create(array_merge($bookingData, [
                'status' => 'confirmed',
                'status_bayar' => 'berhasil',
            ]));

            session()->forget('booking_data');

            // Setelah pembayaran berhasil, redirect ke riwayat booking
            return redirect()->route('myorder.index')->with('success', 'Booking berhasil! Silakan cek pesanan Anda di My Orders.');
        }

        return redirect()->route('payment.page', ['vet' => $bookingData['vet_id'] ?? null])->with('error', 'Pembayaran gagal, silakan coba lagi.');
    }

    public function create(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $existingReview = Review::where('booking_id', $booking->id)->first();
        if ($existingReview) {
            return redirect()->back()->with('error', 'Kamu sudah memberikan review untuk booking ini.');
        }

        return view('review', compact('booking'));
    }

    public function make_review(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'vet_id' => $booking->vet_id,
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('home')->with('success', 'Review berhasil dikirim!');
    }

    // In your BookingController:
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with(['vet', 'vetDate', 'vetTime', 'review'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historyPage', compact('bookings'));
    }

    public function debugTimezone()
    {
        return response()->json([
            'server_timezone' => date_default_timezone_get(),
            'app_timezone' => config('app.timezone'),
            'current_time' => now()->format('Y-m-d H:i:s T'),
            'carbon_now' => Carbon::now()->format('Y-m-d H:i:s T'),
            'carbon_singapore' => Carbon::now('Asia/Singapore')->format('Y-m-d H:i:s T'),
        ]);
    }
}
