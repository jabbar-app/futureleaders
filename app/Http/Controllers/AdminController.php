<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\SelectionPhase;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with('user')
            ->select(['id', 'user_id', 'region', 'gender', 'birth_date'])
            ->get();

        $phases = SelectionPhase::orderBy('start_date')->get();

        return view('admin.dashboard', compact('candidates', 'phases'));
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
}
