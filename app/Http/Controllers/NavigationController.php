<?php

namespace App\Http\Controllers;

use App\Models\Review as ModelsReview;
use App\Models\Vet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function home()
    {

        $reviews = ModelsReview::with(['user', 'vet'])
        ->orderBy('rating', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        return view('home', compact('reviews'));
    }

    public function doctor()
    {
        return view('doctor-page');
    }

    public function myorder()
    {
        // Ambil pesanan yang terkait dengan pengguna yang sedang login
        $bookings = Auth::user()->bookings;

        // Kirim data ke view
        return view('my-order', compact('bookings'));
    }

    public function detailArticle()
    {
        return view('detailArticle');
    }

    public function history()
    {
        return view('historyPage');
    }

    public function aplication()
    {
        return view('downloadPage');
    }

    public function doctors()
    {
        $vets = Vet::all();
        return view('doctor-page', compact('vets'));
    }
}
