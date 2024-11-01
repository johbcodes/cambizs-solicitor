<?php

use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);

Route::get('/practice-areas', [PageController::class, 'practice'])->name('areas');
Route::get('/practice-areas/{area}', [PageController::class, 'practice_detail'])->name('areas_detail');

// Solicitor
Route::get('/solicitors', [PageController::class, 'index'])->name('solicitors');

Route::get('/solicitor/{id}', [PageController::class, 'show'])->name('solicitor.profile');

// Define routes for actions
Route::get('/solicitor/{id}/request-service', [PageController::class, 'requestService'])->name('request.service');
Route::get('/solicitor/{id/contact', [PageController::class, 'contactSolicitor'])->name('contact.solicitor');
Route::get('/solicitor/{id}/contract', [PageController::class, 'createContract'])->name('contract.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'otp.check'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {});
    Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
        Route::get('/service-requests', [UserController::class, 'getServiceRequests']);
    });

    Route::get('/otp/verify', [OtpController::class, 'showVerificationForm'])->name('otp.verify');
    Route::post('/otp/verify', [OtpController::class, 'verifyOtp'])->name('otp.verify.submit');
    Route::post('/otp/resend', [OtpController::class, 'resendOtp'])->name('otp.resend');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
