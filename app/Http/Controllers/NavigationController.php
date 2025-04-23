<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function article()
    {
        return view('articlePage');
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
