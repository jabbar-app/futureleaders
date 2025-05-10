<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateNext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormConfirmationController extends Controller
{
    // Menampilkan semua data konfirmasi milik user yang sedang login
    public function index()
    {
        $user = Auth::user();
        $candidates = CandidateNext::all();

        return view('candidate.forms.index', compact('candidates'));
    }

    // Menampilkan form konfirmasi
    public function create(Candidate $candidate)
    {
        return view('candidate.forms.confirmation', compact('candidate'));
    }

    // Menampilkan detail konfirmasi berdasarkan ID
    public function show($id)
    {
        $candidate = Candidate::with('next', 'user')->findOrFail($id);

        // Pastikan user hanya bisa melihat miliknya sendiri
        if (Auth::user()->is_admin) {
            return view('candidate.forms.show', compact('candidate'));
        }

        if ($candidate->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('candidate.forms.show', compact('candidate'));
    }

    // Simpan data konfirmasi
    public function store(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:20'],

            'is_ready_commitment_fee' => ['required', 'boolean'],
            'parent_approval' => ['required', 'boolean'],
            'have_passport' => ['required', 'boolean'],
            'willing_create_passport' => ['nullable', 'boolean'],
            'has_special_needs' => ['required', 'boolean'],
            'special_needs_description' => ['nullable', 'string'],
            'has_traveled_abroad' => ['required', 'boolean'],
            'abroad_destinations' => ['nullable', 'string'],
            'expectation_from_program' => ['nullable', 'string'],
            'preferred_team_position' => ['nullable', 'string'],
            'preferred_team_position_reason' => ['nullable', 'string'],
            'other_notes' => ['nullable', 'string'],
        ]);

        // Update basic candidate data
        $candidate->update([
            'phone' => $validated['phone'],
        ]);

        $candidate->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_confirmed' => true,
        ]);

        // Simpan data lanjutan ke candidate_nexts
        $candidate->next()->updateOrCreate([], [
            'is_ready_commitment_fee' => $validated['is_ready_commitment_fee'],
            'parent_approval' => $validated['parent_approval'],
            'have_passport' => $validated['have_passport'],
            'willing_create_passport' => $validated['willing_create_passport'] ?? null,
            'has_special_needs' => $validated['has_special_needs'],
            'special_needs_description' => $validated['special_needs_description'] ?? null,
            'has_traveled_abroad' => $validated['has_traveled_abroad'],
            'abroad_destinations' => $validated['abroad_destinations'] ?? null,
            'expectation_from_program' => $validated['expectation_from_program'] ?? null,
            'preferred_team_position' => $validated['preferred_team_position'] ?? null,
            'preferred_team_position_reason' => $validated['preferred_team_position_reason'] ?? null,
            'other_notes' => $validated['other_notes'] ?? null,
        ]);

        return redirect()->route('dashboard')->with('success', 'Konfirmasi pendaftaran berhasil disimpan.');
    }
}
