<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            Log::info('🔁 Mulai handleGoogleCallback');

            $googleUser = Socialite::driver('google')->user();
            Log::info('✅ Data dari Google', [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                ]
            );

            Log::info('✅ User berhasil ditemukan atau dibuat', ['user_id' => $user->id]);

            Auth::login($user);
            Log::info('✅ User berhasil login', ['user_id' => $user->id]);

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            Log::error('❌ Gagal login Google', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect('/login')->with('error', 'Gagal login Google');
        }
    }
}
