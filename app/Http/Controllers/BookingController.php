<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookingDetail($id)
    {
        $vet = Vet::with('vetDates.vetTimes')->findOrFail($id); // Ambil data dokter + tanggal + jam
        return view('booking-detail', compact('vet'));
    }
}
