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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        try {
            DB::beginTransaction();

            // Cek apakah waktu masih tersedia
            $vetTime = VetTime::where('id', $request->vet_time_id)
                ->where('vet_date_id', $request->vet_date_id)
                ->first();

            if (!$vetTime) {
                return redirect()->back()->with('error', 'Waktu yang dipilih tidak tersedia');
            }

            // Cek apakah sudah ada booking untuk waktu yang sama
            $existingBooking = Booking::where('vet_date_id', $request->vet_date_id)
                ->where('vet_time_id', $request->vet_time_id)
                ->whereIn('status', ['confirmed', 'pending'])
                ->first();

            if ($existingBooking) {
                return redirect()->back()->with('error', 'Waktu tersebut sudah dibooking');
            }

            $orderId = self::generateUniqueOrderId();

            // Ambil harga dari tabel vet
            $vet = Vet::findOrFail($request->vet_id);
            $totalHarga = $vet->harga + 5000; // Tambah biaya admin

            // Simpan booking langsung ke database dengan status pending
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'vet_id' => $request->vet_id,
                'vet_date_id' => $request->vet_date_id,
                'vet_time_id' => $request->vet_time_id,
                'keluhan' => $request->keluhan,
                'total_harga' => $totalHarga,
                'status' => 'pending',
                'status_bayar' => 'pending',
                'metode_pembayaran' => 'transfer_bank',
                'order_id' => $orderId,
            ]);

            DB::commit();

            Log::info('Booking created successfully', [
                'booking_id' => $booking->id,
                'order_id' => $orderId,
                'user_id' => Auth::id(),
                'vet_id' => $request->vet_id
            ]);

            return redirect()->route('payment.page', ['vet' => $request->vet_id]);

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Booking creation failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'vet_id' => $request->vet_id
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat booking');
        }
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

    public function show(Vet $vet)
    {
        try {
            // Cari booking yang sedang pending untuk user ini dengan vet yang sama
            $booking = Booking::where('user_id', Auth::id())
                ->where('vet_id', $vet->id)
                ->where('status_bayar', 'pending')
                ->latest()
                ->first();

            if (!$booking) {
                Log::warning('No pending booking found', [
                    'user_id' => Auth::id(),
                    'vet_id' => $vet->id
                ]);
                return redirect()->route('home')->with('error', 'Booking tidak ditemukan atau sudah diproses');
            }

            // Cek apakah booking sudah expired (lebih dari 30 menit)
            if ($booking->created_at->diffInMinutes(now()) > 30) {
                $booking->update([
                    'status' => 'canceled',
                    'status_bayar' => 'gagal'
                ]);

                return redirect()->route('home')->with('error', 'Booking telah expired. Silakan buat booking baru.');
            }

            // Generate Snap Token
            $snapToken = $this->generateSnapToken($booking, $vet);

            if (!$snapToken) {
                return redirect()->back()->with('error', 'Gagal membuat token pembayaran');
            }

            return view('payment.confirm', compact('vet', 'booking', 'snapToken'));

        } catch (\Exception $e) {
            Log::error('Payment page error', [
                'error' => $e->getMessage(),
                'vet_id' => $vet->id,
                'user_id' => Auth::id()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function paymentFinish(Booking $booking)
    {
        try {
            // Pastikan booking milik user yang login
            if ($booking->user_id !== Auth::id()) {
                abort(403, 'Unauthorized access');
            }

            // Refresh data booking dari database untuk mendapatkan status terbaru
            $booking->refresh();

            // Load relasi yang diperlukan
            $booking->load(['vet', 'vetDate', 'vetTime', 'user']);

            return view('payment.success', compact('booking'));

        } catch (\Exception $e) {
            Log::error('Payment finish error', [
                'error' => $e->getMessage(),
                'booking_id' => $booking->id,
                'user_id' => Auth::id()
            ]);

            return redirect()->route('home')->with('error', 'Terjadi kesalahan sistem');
        }
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

    private function generateSnapToken(Booking $booking, Vet $vet)
    {
        try {
            // Set Midtrans configuration
            \Midtrans\Config::$serverKey = config('midtrans.serverkey');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $booking->order_id,
                    'gross_amount' => $booking->total_harga,
                ],
                'customer_details' => [
                    'first_name' => $booking->user->name,
                    'email' => $booking->user->email,
                    'phone' => $booking->user->phone ?? '',
                ],
                'item_details' => [
                    [
                        'id' => 'consultation_' . $vet->id,
                        'price' => $vet->harga,
                        'quantity' => 1,
                        'name' => 'Konsultasi dengan ' . $vet->nama,
                    ],
                    [
                        'id' => 'admin_fee',
                        'price' => 5000,
                        'quantity' => 1,
                        'name' => 'Biaya Admin',
                    ]
                ],
                'callbacks' => [
                    'finish' => route('payment.finish', ['booking' => $booking->id])
                ],
                // Tambahan konfigurasi
                'credit_card' => [
                    'secure' => true
                ],
                'expiry' => [
                    'start_time' => date("Y-m-d H:i:s O"),
                    'unit' => 'minutes',
                    'duration' => 30
                ]
            ];

            // Generate Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            Log::info('Snap token generated', [
                'order_id' => $booking->order_id,
                'booking_id' => $booking->id,
                'gross_amount' => $booking->total_harga
            ]);

            return $snapToken;

        } catch (\Exception $e) {
            Log::error('Failed to generate snap token', [
                'error' => $e->getMessage(),
                'booking_id' => $booking->id,
                'order_id' => $booking->order_id,
                'trace' => $e->getTraceAsString()
            ]);

            return null;
        }
    }
}
