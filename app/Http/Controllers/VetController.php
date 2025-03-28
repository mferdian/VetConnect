<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function doctor()
    {
        $vets = Vet::all(); 
        return view('doctorPage', compact('vets'));
    }
}
