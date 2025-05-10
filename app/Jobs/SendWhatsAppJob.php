<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsAppJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $phone;
    public $message;
    public $token;

    public function __construct($phone, $message, $token)
    {
        $this->phone = $phone;
        $this->message = $message;
        $this->token = $token;
    }

    public function handle()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->token,
            ])
                ->asForm()
                ->timeout(15)
                ->connectTimeout(10)
                ->post('https://api.fonnte.com/send', [
                    'target' => $this->phone,
                    'message' => $this->message,
                    'countryCode' => '62',
                ]);

            if (!$response->successful()) {
                Log::error("Gagal kirim WA ke {$this->phone}: " . $response->body());
            }
        } catch (\Exception $e) {
            Log::error("Exception kirim WA ke {$this->phone}: " . $e->getMessage());
        }
    }
}
