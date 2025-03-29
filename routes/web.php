<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VetController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BaseController::class, 'home'])->name('home');

// //Vet
// Route::get('/vets', [VetController::class, 'index'])->name('vets.index');


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

    Route::get('/detailArticle', [NavBarController::class,'detailArticle'])->name('detailArticle'); // Nanti Di pindah di atas
    Route::get('/payment/{vet}', [PaymentController::class, 'show'])->name('payment.page');
    Route::get('/booking/{id}', [BookingController::class, 'bookingDetail'])->name('booking.detail');
});


Route::get('/doctor', [VetController::class,'doctor'])->name('doctor');

Route::get('/', [NavBarController::class,'home'])->name('home');
Route::get('/articles', [NavBarController::class,'article'])->name('articles');
Route::get('/history', [NavBarController::class, 'history'])->name('history');
Route::get('/aplication', [NavBarController::class,'aplication'])->name('aplication');



