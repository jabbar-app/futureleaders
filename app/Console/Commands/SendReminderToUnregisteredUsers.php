<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Candidate;
use App\Mail\ReminderToRegisterMail;
use Illuminate\Support\Facades\Mail;

class SendReminderToUnregisteredUsers extends Command
{
    protected $signature = 'email:send-reminder-to-unregistered';
    protected $description = 'Kirim email ke user yang belum daftar atau belum melengkapi data kandidat';

    public function handle()
    {
        $notifiedUsers = collect();

        // 1. User yang BELUM punya data kandidat sama sekali
        $userIdsWithCandidate = Candidate::pluck('user_id')->toArray();

        $usersWithoutCandidate = User::whereNotIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get();

        foreach ($usersWithoutCandidate as $user) {
            Mail::to($user->email)->send(new ReminderToRegisterMail($user));
            $this->info("Email dikirim ke (belum daftar): {$user->email}");
            $notifiedUsers->push($user->email);
        }

        // 2. User yang SUDAH punya kandidat tapi BELUM lengkap
        $usersWithIncompleteCandidate = User::whereIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get();

        foreach ($usersWithIncompleteCandidate as $user) {
            $candidate = $user->candidate()
                ->with(['motivation', 'educations', 'achievements', 'organizations'])
                ->first();

            $isIncomplete = !$candidate->motivation ||
                $candidate->educations->isEmpty() ||
                $candidate->achievements->isEmpty() ||
                $candidate->organizations->isEmpty();

            if ($isIncomplete) {
                Mail::to($user->email)->send(new ReminderToRegisterMail($user));
                $this->info("Email dikirim ke (belum lengkap): {$user->email}");
                $notifiedUsers->push($user->email);
            }
        }

        if ($notifiedUsers->isEmpty()) {
            $this->info('Semua user sudah mendaftar dan melengkapi data.');
        } else {
            $this->info('Total email dikirim: ' . $notifiedUsers->count());
        }
    }
}
