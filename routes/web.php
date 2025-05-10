<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FormConfirmationController;
use App\Http\Controllers\CandidateMotivationController;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/announcement', function () {
    return view('pages.announcement');
})->name('pages.announcement');

Route::get('/guidebook', function () {
    return redirect(asset('files/YFLI Handbook - Langkat Binjai 2025.pdf'));
})->name('guidebook');
Route::get('/poster', function () {
    return view('poster');
});



Route::get('/auth/google', [UserController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::middleware('auth')->prefix('confirmation')->group(function () {
    Route::get('/{candidate}/create', [FormConfirmationController::class, 'create'])->name('confirmation.create');
    Route::post('/{candidate}/store', [FormConfirmationController::class, 'store'])->name('confirmation.store');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::put('/selection-phases/update-deadline', [AdminController::class, 'updatePhaseDeadline'])->name('admin.selection-phases.update-deadline');

    Route::get('confirmation-data', [FormConfirmationController::class, 'index'])->name('confirmation.index');
    Route::get('confirmation-data/{id}', [FormConfirmationController::class, 'show'])->name('confirmation.show');

    Route::post('/send-reminder-emails', [AdminController::class, 'sendReminderEmails'])->name('admin.sendReminderEmail');
    Route::post('/send-reminder-whatsapp', [AdminController::class, 'sendReminderWhatsapp'])->name('admin.sendReminderWhatsapp');
    Route::post('/preview-reminder-count', [AdminController::class, 'previewReminderCount'])->name('admin.previewReminderCount');
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');
    Route::get('candidate/detail/{candidate}', [CandidateController::class, 'detail'])->name('candidate.detail');

    Route::prefix('notifications')->group(function () {
        Route::get('/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');
        Route::get('/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
        Route::get('/all', [NotificationController::class, 'index'])->name('notifications.all');
    });

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

    Route::resource('candidate', CandidateController::class);
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
