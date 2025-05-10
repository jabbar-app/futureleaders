<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroundsApiService
{
    public static function emailExists($email): bool
    {
        $url = config('services.ground_api.base_url') . '/check-email';

        $response = Http::get($url, [
            'email' => $email,
        ]);

        return $response->ok() && $response->json('exists') === true;
    }
}
