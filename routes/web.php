<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Login Route
Route::post('/login', [AuthController::class,'login']);
Route::get('/login', function () {
    return view('login');
})->name('login');


//Logout
Route::get('/logout',[AuthController::class.'logout']);


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/home', function () {
    return view('indexLogined');
})->name('indexLogin');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/article', function () {
    return view('articlePage');
})->name('articlePage');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');
