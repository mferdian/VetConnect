<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BaseController::class, 'home'])->name('home');


Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register Routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth')->group(function () {
    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/detailArticle', [NavBarController::class,'detailArticle'])->name('detailArticle'); // Nanti Di pindah di atas
Route::get('/booking', [NavBarController::class,'booking'])->name('booking.detail'); // Nanti Di pindah di atas
Route::get('/', [NavBarController::class,'home'])->name('home');
Route::get('/articles', [NavBarController::class,'article'])->name('articles');
Route::get('/doctor', [NavBarController::class,'doctor'])->name('doctor.page');

Route::get('/history', function () {
    return view('historyPage');
})->name('history');

Route::get('/doctors', function () {
    return view('doctorPage');
})->name('doctors');

Route::get('/service', function () {
    return view('downloadPage');
})->name('service');