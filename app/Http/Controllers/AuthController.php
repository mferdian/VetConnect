<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|password',
        ]);
        if(Auth::attempt($request->only('email','password'),$request->remember)){
            return redirect('/indexLogin');
        }
        return back()->with('failed','Email atau Password Salah');
    }

    public function logout()
    {
        Auth::logout(Auth::user());
        return redirect('/index');
    }
}
