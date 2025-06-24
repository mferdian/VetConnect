<?php

use App\Http\Controllers\Api\BookingWebhookController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// ==============================
// GUEST ROUTES
// ==============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ==============================
// AUTHENTICATED USER ROUTES
// ==============================
Route::middleware('auth')->group(function () {
    // Authentication
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->name('delete-account');

    // Profile Management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Booking & Payment
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/{id}', [BookingController::class, 'bookingDetail'])->name('show');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::get('/get-times/{vetDateId}', [BookingController::class, 'getTimes'])->name('getTimes');
    });

    Route::get('/payment/{vet}', [BookingController::class, 'show'])->name('payment.page');
    Route::get('/payment/finish/{booking}', [BookingController::class, 'paymentFinish'])->name('payment.finish');

    // Transaction History
    Route::get('/history', [BookingController::class, 'history'])->name('history');
    Route::get('/my-orders', [NavigationController::class, 'myorder'])->name('myorder.index');

    // Articles (authenticated access)
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

    // Review Management
    Route::prefix('review')->name('review.')->group(function () {
        Route::middleware(['review'])->group(function () {
            Route::get('/create/{booking}', [ReviewController::class, 'create'])->name('create');
        });
        Route::post('/store', [ReviewController::class, 'store'])->name('store');
    });

    Route::get('/payment/status/{booking}', [BookingController::class, 'checkPaymentStatus'])
        ->name('payment.status');
});

// ==============================
// PUBLIC PAGES (No authentication required)
// ==============================
Route::get('/', [NavigationController::class, 'home'])->name('home');
Route::get('/doctor', [NavigationController::class, 'doctors'])->name('doctor');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/aplication', [NavigationController::class, 'aplication'])->name('aplication');
Route::get('/detailArticle', [NavigationController::class, 'detailArticle'])->name('detailArticle');

// Public AJAX endpoints (bisa diakses tanpa auth jika diperlukan)
Route::get('/booking/get-times/{vetDateId}', [BookingController::class, 'getTimes'])
    ->name('public.booking.getTimes');

Route::post('/midtrans/webhook', [MidtransWebhookController::class, 'handle'])
    ->name('midtrans.webhook');
