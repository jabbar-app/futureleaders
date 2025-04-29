<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\SelectionPhase;
use Illuminate\Support\Facades\Log;
use App\Mail\ReminderToRegisterMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with('user')->select(['id', 'user_id', 'region', 'gender', 'birth_date', 'batch', 'status'])->get();

        $userIdsWithCandidate = Candidate::pluck('user_id')->toArray();

        $usersWithoutCandidate = User::whereNotIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->get();

        $usersWithIncompleteCandidate = User::whereIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
            ->with([
                'candidate.motivation',
                'candidate.educations',
                'candidate.achievements',
                'candidate.organizations'
            ])
            ->get()
            ->filter(function ($user) {
                $candidate = $user->candidate;

                return !$candidate ||
                    !$candidate->motivation ||
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
            ->get();

        foreach ($usersWithoutCandidate as $user) {
            Mail::to($user->email)->send(new ReminderToRegisterMail($user));
            $notifiedUsers->push($user->email);
        }

        // User dengan data kandidat belum lengkap
        $usersWithIncompleteCandidate = User::whereIn('id', $userIdsWithCandidate)
            ->where('is_admin', false)
            ->where('status', 'active')
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

    public function sendReminderWhatsapp(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:5',
        ]);

        $messageTemplate = $request->input('message');
        $batchFilter = $request->input('batch');
        $stageFilter = $request->input('status');
        $confirmationFilter = $request->input('is_confirmed');
        $token = env('WHATSAPP_TOKEN');
        $notifiedNumbers = collect();

        $query = Candidate::with('user')
            ->whereHas('user', function ($q) {
                $q->where('is_admin', false)->where('status', 'active');
            });

        if ($batchFilter) {
            $query->where('batch', $batchFilter);
        }

        if ($stageFilter) {
            $query->where('status', $stageFilter);
        }

        if ($confirmationFilter === 'with_link') {
            $query->whereNotNull('confirmation_link');
        } elseif ($confirmationFilter === 'without_link') {
            $query->whereNull('confirmation_link');
        }

        $candidates = $query->get();

        foreach ($candidates as $candidate) {
            $user = $candidate->user;
            $phone = $candidate->phone;

            if (!$phone || !$user) continue;

            $message = str_replace('{name}', $user->name, $messageTemplate);

            $this->sendWhatsApp($phone, $message, $token);
            $notifiedNumbers->push($phone);
        }

        return redirect()->back()->with('success', 'WhatsApp berhasil dikirim ke ' . $notifiedNumbers->count() . ' kandidat.');
    }

    public function previewReminderCount(Request $request)
    {
        $batchFilter = $request->input('batch');
        $stageFilter = $request->input('status');
        $confirmationFilter = $request->input('is_confirmed'); // sekarang gunakan confirmation_link

        $query = Candidate::with('user')
            ->whereHas('user', function ($q) {
                $q->where('is_admin', false)->where('status', 'active');
            });

        if ($batchFilter) {
            $query->where('batch', $batchFilter);
        }

        if ($stageFilter) {
            $query->where('status', $stageFilter);
        }

        if ($confirmationFilter === 'with_link') {
            $query->whereNotNull('confirmation_link');
        } elseif ($confirmationFilter === 'without_link') {
            $query->whereNull('confirmation_link');
        }

        $count = $query->count();

        return response()->json(['count' => $count]);
    }

    private function sendWhatsApp($number, $message, $token)
    {
        $payload = [
            'target'      => $number,
            'message'     => $message,
            'delay'       => '1-3',
            'countryCode' => '62',
        ];

        try {
            Http::withHeaders([
                'Authorization' => $token
            ])->post('https://api.fonnte.com/send', $payload);
        } catch (\Exception $e) {
            Log::error("Gagal mengirim WA ke {$number}: " . $e->getMessage());
        }
    }
}
