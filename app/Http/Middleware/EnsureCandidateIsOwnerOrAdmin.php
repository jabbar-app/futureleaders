<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;

class EnsureCandidateIsOwnerOrAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $candidate = $request->route('candidate');

        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Jika tidak admin, pastikan user hanya bisa akses kandidat miliknya
        if ($candidate && Auth::id() === $candidate->user_id) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk data ini.');
    }
}
