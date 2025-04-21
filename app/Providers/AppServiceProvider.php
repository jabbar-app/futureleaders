<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\SelectionPhase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Inject global endDate dari SelectionPhase aktif
            $activePhase = SelectionPhase::where('is_active', true)
                ->whereNotNull('end_date')
                ->orderByDesc('end_date')
                ->first();

            $view->with('endDate', $activePhase?->end_date);

            // Inject user + notifikasi jika user sudah login
            if (Auth::check()) {
                $user = Auth::user();
                $notifications = Notification::where('user_id', $user->id)->latest()->take(10)->get();
                $unreadCount = Notification::where('user_id', $user->id)->where('is_read', false)->count();

                $view->with([
                    'user' => $user,
                    'notifications' => $notifications,
                    'unreadCount' => $unreadCount,
                ]);
            }
        });
    }
}
