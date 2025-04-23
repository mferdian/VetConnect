<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\VetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;


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
    Route::get('/api/get-time-slots', [BookingController::class, 'getTimeSlots']); 
    Route::get('/booking/get-times/{vetDateId}', [BookingController::class, 'getTimes'])->name('booking.getTimeSlots');


    // Payment
    Route::get('/payment/{vet}', [BookingController::class, 'show'])->name('payment.page');
    Route::post('/payment/confirm', [BookingController::class, 'confirmPayment'])->name('payment.confirm');

    // Detail Article
    Route::get('/detailArticle', [NavigationController::class, 'detailArticle'])->name('detailArticle');

    //Transaction
    Route::get('/history', [NavigationController::class, 'history'])->name('history');
    Route::get('/my-orders', [NavigationController::class, 'myorder'])->name('myorder.index');

    // Review
    Route::middleware(['review'])->group(function () {
        Route::get('/review/{booking}', [BookingController::class, 'create'])->name('review.create');
        Route::post('/review/{booking}', [BookingController::class, 'make_review'])->name('review.store');
    });

});

// ==============================
// GENERAL PAGES / NAVIGATION
// ==============================

Route::get('/doctor', [NavigationController::class, 'doctors'])->name('doctor');
Route::get('/articles', [NavigationController::class, 'article'])->name('articles');
Route::get('/aplication', [NavigationController::class, 'aplication'])->name('aplication');
Route::get('/', [NavigationController::class, 'home'])->name('home');
