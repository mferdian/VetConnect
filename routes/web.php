<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/home', function () {
    return view('index');
})->name('index');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/article', function () {
    return view('articlePage');
})->name('articlePage');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');
