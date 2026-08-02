<?php

declare(strict_types=1);

use App\Http\Controllers\Api\BookingController;
use Illuminate\Support\Facades\Route;

Route::prefix('booking')->group(function () {
    Route::get('/consultants', [BookingController::class, 'consultants'])->name('booking.consultants');
    Route::get('/services', [BookingController::class, 'services'])->name('booking.services');
    Route::get('/slots/{consultant}/{date}', [BookingController::class, 'slots'])->name('booking.slots');
    Route::get('/availability/{consultant}', [BookingController::class, 'availability'])->name('booking.availability');

    Route::middleware('throttle:5,1')->group(function () {
        Route::post('/', [BookingController::class, 'store'])->name('booking.store');
    });
});
