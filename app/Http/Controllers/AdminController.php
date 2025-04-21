<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\SelectionPhase;
use App\Mail\ReminderToRegisterMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with('user')->select(['id', 'user_id', 'region', 'gender', 'birth_date'])->get();

        $userIdsWithCandidate = Candidate::pluck('user_id')->toArray();

        $usersWithoutCandidate = User::whereNotIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get();

        $usersWithIncompleteCandidate = User::whereIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get()
            ->filter(function ($user) {
                $candidate = $user->candidate()
                    ->with(['motivation', 'educations', 'achievements', 'organizations'])
                    ->first();

                return !$candidate->motivation ||
                    $candidate->educations->isEmpty() ||
                    $candidate->achievements->isEmpty() ||
                    $candidate->organizations->isEmpty();
            });

        $reminderCount = $usersWithoutCandidate->count() + $usersWithIncompleteCandidate->count();
        $phases = SelectionPhase::orderBy('start_date')->get();

        return view('admin.dashboard', compact('candidates', 'reminderCount', 'phases'));
    }

    public function updatePhaseDeadline(Request $request)
    {
        $data = $request->input('phases', []);

        foreach ($data as $id => $phaseData) {
            $phase = SelectionPhase::find($id);
            if (!$phase) continue;

            $phase->start_date = $phaseData['start_date'];
            $phase->end_date = $phaseData['end_date'];
            $phase->is_active = isset($phaseData['is_active']);
            $phase->save();
        }

        return redirect()->back()->with('success', 'Tanggal dan status fase berhasil diperbarui.');
    }

    public function sendReminderEmails()
    {
        $userIdsWithCandidate = Candidate::pluck('user_id')->toArray();
        $notifiedUsers = collect();

        $usersWithoutCandidate = User::whereNotIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get();

        foreach ($usersWithoutCandidate as $user) {
            Mail::to($user->email)->send(new ReminderToRegisterMail($user));
            $notifiedUsers->push($user->email);
        }

        // User dengan data kandidat belum lengkap
        $usersWithIncompleteCandidate = User::whereIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->whereNotNull('email_verified_at')
            ->get();

        foreach ($usersWithIncompleteCandidate as $user) {
            $candidate = $user->candidate()->with(['motivation', 'educations', 'achievements', 'organizations'])->first();

            if (
                !$candidate->motivation ||
                $candidate->educations->isEmpty() ||
                $candidate->achievements->isEmpty() ||
                $candidate->organizations->isEmpty()
            ) {
                Mail::to($user->email)->send(new ReminderToRegisterMail($user));
                $notifiedUsers->push($user->email);
            }
        }

        return redirect()->back()->with('success', 'Email berhasil dikirim ke ' . $notifiedUsers->count() . ' user.');
    }
}
