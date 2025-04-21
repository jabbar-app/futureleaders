<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateMotivationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EnsureCandidateIsOwnerOrAdmin;
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
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });

    Route::prefix('notifications')->group(function () {
        Route::get('/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');
        Route::get('/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
        Route::get('/all', [NotificationController::class, 'index'])->name('notifications.all');
    });

    Route::get('dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');

    Route::middleware(EnsureCandidateIsOwnerOrAdmin::class)->group(function () {
        Route::get('candidate/detail/{candidate}', [CandidateController::class, 'detail'])->name('candidate.detail');

        Route::prefix('candidate/{candidate}/motivation')->group(function () {
            Route::get('', [CandidateMotivationController::class, 'create'])->name('candidate.motivation.create');
            Route::post('', [CandidateMotivationController::class, 'store'])->name('candidate.motivation.store');
            Route::get('/edit', [CandidateMotivationController::class, 'edit'])->name('candidate.motivation.edit');
            Route::put('/update', [CandidateMotivationController::class, 'update'])->name('candidate.motivation.update');
        });

        Route::prefix('candidate/{candidate}/education')->group(function () {
            Route::get('', [CandidateController::class, 'education_create'])->name('candidate.education.create');
            Route::post('', [CandidateController::class, 'education_store'])->name('candidate.education.store');
            Route::get('/edit', [CandidateController::class, 'education_edit'])->name('candidate.education.edit');
            Route::put('/update', [CandidateController::class, 'education_update'])->name('candidate.education.update');
        });

        Route::prefix('candidate/{candidate}/achievement')->group(function () {
            Route::get('', [CandidateController::class, 'achievement_create'])->name('candidate.achievement.create');
            Route::post('', [CandidateController::class, 'achievement_store'])->name('candidate.achievement.store');
            Route::get('/edit', [CandidateController::class, 'achievement_edit'])->name('candidate.achievement.edit');
            Route::put('/update', [CandidateController::class, 'achievement_update'])->name('candidate.achievement.update');
        });

        Route::prefix('candidate/{candidate}/organization')->group(function () {
            Route::get('', [CandidateController::class, 'organization_create'])->name('candidate.organization.create');
            Route::post('', [CandidateController::class, 'organization_store'])->name('candidate.organization.store');
            Route::get('/edit', [CandidateController::class, 'organization_edit'])->name('candidate.organization.edit');
            Route::put('/update', [CandidateController::class, 'organization_update'])->name('candidate.organization.update');
        });

        Route::resource('candidate', CandidateController::class)->except(['index'])->middleware('ownerOrAdmin');
    });
});


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
