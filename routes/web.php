<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MfaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/layanan', [FrontendController::class, 'services'])->name('services');
Route::get('/tentang', [FrontendController::class, 'about'])->name('about');
Route::get('/portofolio', [FrontendController::class, 'portfolio'])->name('case-studies');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('blog-detail')
    ->where('slug', '[a-zA-Z0-9\-]+');
Route::get('/karir', [FrontendController::class, 'career'])->name('career');
Route::view('/reservasi', 'frontend.reservasi')->name('booking');
Route::view('/kontak', 'frontend.kontak')->name('contact');
Route::view('/kebijakan-privasi', 'frontend.privasi')->name('privacy');
Route::view('/syarat-ketentuan', 'frontend.syarat')->name('terms');

Route::post('/kontak', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::prefix('admin/mfa')->name('mfa.')->group(function () {
    Route::get('/verify', [MfaController::class, 'showVerify'])->name('verify');
    Route::post('/verify', [MfaController::class, 'verify'])->name('verify.submit');
    Route::get('/setup', [MfaController::class, 'showSetup'])->name('setup');
    Route::post('/setup', [MfaController::class, 'enable'])->name('enable');
});
