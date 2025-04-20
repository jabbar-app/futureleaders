<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateMotivationController extends Controller
{
    public function create(Candidate $candidate)
    {
        return view('candidate.motivation.create', compact('candidate'));
    }

    public function store(Request $request, Candidate $candidate)
    {
        $request->validate([
            'motivation' => 'required|string',
            'project_plan' => 'required|string',
        ]);

        $candidate->motivation()->create([
            'motivation' => $request->motivation,
            'project_plan' => $request->project_plan,
        ]);

        return redirect()->route('candidate.dashboard')->with('success', 'Motivasi berhasil disimpan.');
    }

    public function edit(Candidate $candidate)
    {
        return view('candidate.motivation.edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'motivation' => 'required|string',
            'project_plan' => 'required|string',
        ]);

        $candidate->motivation()->update([
            'motivation' => $request->motivation,
            'project_plan' => $request->project_plan,
        ]);

        return redirect()->route('candidate.dashboard')->with('success', 'Motivasi berhasil diperbarui.');
    }
}
