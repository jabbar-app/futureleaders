<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user belum login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika user login tapi bukan admin
        if (!Auth::user()->is_admin) {
            // Misalnya arahkan ke dashboard biasa
            return redirect()->route('candidate.dashboard');
        }

        // Jika user adalah admin
        return $next($request);
    }
}
