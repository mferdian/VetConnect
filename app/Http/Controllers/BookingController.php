<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Review;
use App\Models\Vet;
use App\Models\VetDate;
use App\Models\VetTime;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookingDetail($id)
    {
        $vet = Vet::with(['vetReviews', 'vetDates.vetTimes'])->findOrFail($id);

        // Jika tidak ada tanggal, buat tanggal dan waktu untuk 14 hari ke depan
        if ($vet->vetDates->isEmpty()) {
            $this->generateAvailableDates($vet->id);
            // Reload vet dengan data baru
            $vet = Vet::with(['vetReviews', 'vetDates.vetTimes'])->findOrFail($id);
        }

        return view('booking-detail', compact('vet'));
    }

    public function getTimeSlots(Request $request)
    {
        $vetDate = \App\Models\VetDate::where('vet_id', $request->vet_id)
            ->where('tanggal', $request->date)
            ->with('vetTimes')
            ->first();

        if (!$vetDate) {
            return response()->json(['times' => []]); // Kosong jika tidak ada jadwal
        }

        return response()->json([
            'times' => $vetDate->vetTimes->map(function ($time) {
                return [
                    'id' => $time->id,
                    'jam' => $time->jam
                ];
            })
        ]);
    }


    private function generateAvailableDates($vetId)
    {
        $startDate = Carbon::today();

        // Generate tanggal untuk 14 hari ke depan
        for ($i = 0; $i < 14; $i++) {
            $date = $startDate->copy()->addDays($i);

            // Skip hari Minggu jika perlu
            if ($date->dayOfWeek === Carbon::SUNDAY) {
                continue;
            }

            $vetDate = \App\Models\VetDate::create([
                'vet_id' => $vetId,
                'tanggal' => $date
            ]);

            // Generate slot waktu dari jam 8 pagi sampai 5 sore
            $startTime = 8;
            $endTime = 17;

            for ($hour = $startTime; $hour < $endTime; $hour++) {
                \App\Models\VetTime::create([
                    'vet_date_id' => $vetDate->id,
                    'jam' => sprintf('%02d:00', $hour)
                ]);
            }
        }
    }


    public function store(Request $request)
    {

        $request->validate([
            'vet_id' => 'required|exists:vets,id',
            'vet_date_id' => 'required|exists:vet_dates,id',
            'vet_time_id' => 'required|exists:vet_times,id',
            'keluhan' => 'required|string',
        ]);

        // Simpan data booking di session (sementara)
        session(['booking_data' => [
            'user_id' => Auth::id(),
            'vet_id' => $request->vet_id,
            'vet_date_id' => $request->vet_date_id,
            'vet_time_id' => $request->vet_time_id,
            'keluhan' => $request->keluhan,
            'total_harga' => $request->harga, // Sesuaikan harga sesuai sistem
            'status' => 'pending',
            'status_bayar' => 'pending',
            'metode_pembayaran' => 'transfer_bank',
        ]]);

        // Redirect ke halaman pembayaran
        return redirect()->route('payment.page', ['vet' => $request->vet_id]);
    }

    public function getTimes($vetDateId)
    {
        $vetTimes = VetTime::where('vet_date_id', $vetDateId)->get();
        return response()->json($vetTimes);
    }


    public function show(Vet $vet)
    {
        return view('payment-page', compact('vet'));
    }

    public function confirmPayment(Request $request)
    {
        // Contoh: Cek apakah pembayaran berhasil dari sistem pembayaran
        $paymentStatus = $request->input('status');

        if ($paymentStatus === 'berhasil') {
            // Ambil data dari session
            $bookingData = session('booking_data');

            if ($bookingData) {
                // Simpan ke database
                Booking::create(array_merge($bookingData, [
                    'status_bayar' => 'berhasil',
                    'status' => 'confirmed',
                ]));

                // Hapus data session
                session()->forget('booking_data');

                return redirect()->route('booking.show', $bookingData['vet_id'])->with('success', 'Booking berhasil!');
            }
        }

        return redirect()->route('payment.page', $request->vet_id)->with('error', 'Pembayaran gagal, silakan coba lagi.');
    }

    public function create(Booking $booking)
    {

        // Cek apakah user memang pemilik booking
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // Cek apakah sudah ada review
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

    public function history()
    {
        // Ambil data riwayat transaksi dari model Booking
        $paymentHistory = Booking::where('user_id', Auth::id())
            ->where('status_bayar', '!=', null)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view
        return view('historyPage', compact('paymentHistory'));
    }
}
