<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavBarController extends Controller
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
        return view('doctorPage');
    }

    // public function booking()
    // {
    //     return view('bookingDetail');
    // }

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
}
