<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vet;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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

}

