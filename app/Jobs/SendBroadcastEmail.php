<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;

class SendBroadcastEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $subject;
    protected $body;

    public function __construct(User $user, $subject, $body)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function handle(): void
    {
        $personalizedBody = str_replace('{name}', $this->user->name, $this->body);

        Mail::send('emails.broadcast', [
            'subject' => $this->subject,
            'body' => $personalizedBody,
        ], function ($message) {
            $message->to($this->user->email)
                ->subject($this->subject);
        });
    }
}
