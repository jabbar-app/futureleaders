<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $notifications = Notification::where('user_id', $user->id)->latest()->take(10)->get();
                $unreadCount = Notification::where('user_id', $user->id)->where('is_read', false)->count();

                $view->with([
                    'user' => $user,
                    'notifications' => $notifications,
                    'unreadCount' => $unreadCount
                ]);
            }
        });
    }
}
