<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\VetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;

// ==============================
// PUBLIC ROUTES (Guest)
// ==============================

Route::get('/', [BaseController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ==============================
// AUTHENTICATED USER ROUTES
// ==============================

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Booking
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}', [BookingController::class, 'bookingDetail'])->name('booking.show');

    // Time Slots (API)
    Route::get('/get-time-slots', [BookingController::class, 'getTimeSlots'])->name('booking.getTimeSlots');
    Route::get('/api/get-time-slots', [BookingController::class, 'getTimeSlots']); // bisa dihapus kalau fungsinya sama

    // Payment
    Route::get('/payment/{vet}', [PaymentController::class, 'show'])->name('payment.page');
    Route::post('/payment/confirm', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');
});

// ==============================
// GENERAL PAGES / NAVIGATION
// ==============================

Route::get('/doctor', [VetController::class, 'doctor'])->name('doctor');
Route::get('/articles', [NavBarController::class, 'article'])->name('articles');
Route::get('/detailArticle', [NavBarController::class, 'detailArticle'])->name('detailArticle');
Route::get('/history', [NavBarController::class, 'history'])->name('history');
Route::get('/aplication', [NavBarController::class, 'aplication'])->name('aplication');
