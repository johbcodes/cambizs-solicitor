<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/practice-areas', [PageController::class, 'practice'])->name('practice');
Route::get('/practice-areas/{name}', [PageController::class, 'practiceDetail'])->name('practice.detail');
Route::get('/practice-areas/solicitor/{id}', [PageController::class, 'solicitorProfile'])->name('practice.solicitor');
Route::get('/solicitors', [PageController::class, 'listSolicitors'])->name('solicitors');
Route::get('/solicitor/{id}/profile', [PageController::class, 'showSolicitorProfile'])->name('solicitor.profile');
Route::get('/solicitor/{id}/request-service', [PageController::class, 'requestService'])->name('solicitor.request');
Route::get('/solicitor/{id}/contact', [PageController::class, 'contactSolicitor'])->name('solicitor.contact');
Route::get('/solicitor/{id}/start-contract', [PageController::class, 'createContract'])->name('solicitor.contract');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'otp.check'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route::prefix('messages')->as('messages.')->group(function () {
    //     Route::get('/', [DashboardController::class, 'listMessages'])->name('index');
    //     Route::get('/new/{recipient}', [DashboardController::class, 'createMessage'])->name('create');
    // });

    Route::prefix('chat')->group(function () {
        Route::get('/', [ChatController::class, 'allMessages'])->name('chat');
        Route::get('/start/{solicitor}', [ChatController::class, 'startConversation'])->name('chat.start');
        Route::get('/conversation/{id}', [ChatController::class, 'showConversation'])->name('chat.conversation');
        Route::post('/conversation/{id}/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    });

    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/service-requests', [AdminController::class, 'listServiceRequests'])->name('serviceRequests');
        Route::get('/users', [AdminController::class, 'listUsers'])->name('users');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/messages', [AdminController::class, 'listMessages'])->name('messages'); // Admin message logs
    });

    Route::prefix('client')->as('client.')->group(function () {
        Route::get('/service-requests', [UserController::class, 'listServiceRequests'])->name('serviceRequests');
        Route::post('/service-requests', [UserController::class, 'storeServiceRequest'])->name('serviceRequests.store');
        Route::get('/service-requests/submit/{solicitor}', [UserController::class, 'createServiceRequest'])->name('serviceRequest.submit');
    });



    Route::prefix('solicitor')->as('solicitor.')->group(function () {
        Route::get('/service-requests', [SolicitorController::class, 'listServiceRequests'])->name('serviceRequests');
        Route::get('/practice-areas', [SolicitorController::class, 'listPracticeAreas'])->name('practiceAreas');
        Route::get('/practice-areas/create', [SolicitorController::class, 'createPracticeArea'])->name('practiceArea.create');
        Route::post('/practice-areas', [SolicitorController::class, 'storePracticeArea'])->name('practiceArea.store');
        Route::get('/profile/messages', [SolicitorController::class, 'listMessages'])->name('messages');
        Route::patch('/profile', [SolicitorController::class, 'updateProfile'])->name('profile.update');
    });

    Route::prefix('otp')->as('otp.')->group(function () {
        Route::get('/verify', [OtpController::class, 'showVerificationForm'])->name('verify');
        Route::post('/verify', [OtpController::class, 'verifyOtp'])->name('verify.submit');
        Route::post('/resend', [OtpController::class, 'resendOtp'])->name('resend');
    });

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('update');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::get('/help', [DashboardController::class, 'help'])->name('help');
});

require __DIR__ . '/auth.php';
