<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/guidebook', function () {
    return redirect(asset('files/YFLI Handbook - Langkat Binjai 2025.pdf'));
})->name('guidebook');
Route::get('/poster', function () {
    return view('poster');
});

Route::get('/auth/google', [UserController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');
    Route::get('detail/{candidate}', [CandidateController::class, 'detail'])->name('candidate.detail');

    Route::prefix('notifications')->group(function () {
        Route::get('/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');
        Route::get('/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
        Route::get('/all', [NotificationController::class, 'index'])->name('notifications.all');
    });

    Route::resource('candidate', CandidateController::class);
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
