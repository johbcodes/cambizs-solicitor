<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'index']);
Route::get('/practice-areas', [PageController::class, 'practice'])->name('areas');
Route::get('/practice-areas/{name}', [PageController::class, 'practice_detail'])->name('areas.detail');
Route::get('/practice-areas/solicitor/{id}', [PageController::class, 'practice_solicitor'])->name('areas.solicitor');
Route::get('/solicitors', [PageController::class, 'index'])->name('solicitors');
Route::get('/solicitor/profile/{id}', [PageController::class, 'show'])->name('solicitor.profile');
Route::get('/solicitor/{id}/request-service', [PageController::class, 'requestService'])->name('solicitor.request.service');
Route::get('/solicitor/{id}/contact', [PageController::class, 'contactSolicitor'])->name('solicitor.contact');
Route::get('/solicitor/{id}/contract', [PageController::class, 'createContract'])->name('solicitor.contract.create');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'otp.check'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Admin Routes
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/service-requests', [AdminController::class, 'getServiceRequests'])->name('service.requests.index');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    });

    // Client Routes
    Route::prefix('client')->as('client.')->group(function () {
        Route::get('/service-requests', [UserController::class, 'getServiceRequests'])->name('service.requests.index');
    });

    // Solicitor Routes
    Route::prefix('solicitor')->as('solicitor.')->group(function () {
        Route::get('/service-requests', [SolicitorController::class, 'getServiceRequests'])->name('service.requests.index');
        Route::get('/practice-areas', [SolicitorController::class, 'getPracticeAreas'])->name('practice_areas.index');
        Route::post('/practice-areas', [SolicitorController::class, 'storePracticeAreas'])->name('practice_areas.store');
        Route::get('/practice-areas/create', [SolicitorController::class, 'createPracticeAreas'])->name('practice_areas.create');
        Route::get('/messages', [SolicitorController::class, 'messages'])->name('messages');
        Route::patch('/profile', [SolicitorController::class, 'updateProfile'])->name('update_profile');
    });

    // OTP Routes
    Route::get('/otp/verify', [OtpController::class, 'showVerificationForm'])->name('otp.verify');
    Route::post('/otp/verify', [OtpController::class, 'verifyOtp'])->name('otp.verify.submit');
    Route::post('/otp/resend', [OtpController::class, 'resendOtp'])->name('otp.resend');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Help Route
    Route::get('/help', [PageController::class, 'help'])->name('help');
});

// Auth routes
require __DIR__ . '/auth.php';
