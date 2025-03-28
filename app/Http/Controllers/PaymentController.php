<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Vet $vet)
    {
        return view('payment-page', compact('vet'));
    }
}
