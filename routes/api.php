<?php


use App\Http\Controllers\MidtransWebhookController;
use Illuminate\Routing\Route;

Route::post('/midtrans/webhook', [MidtransWebhookController::class, 'handle']);
