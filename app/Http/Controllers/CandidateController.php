<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\SelectionPhase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CandidateController extends Controller
{
    public function dashboard()
    {
        $candidate = Candidate::with(['educations', 'achievements', 'scores.selectionPhase'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$candidate) {
            return redirect()
                ->route('candidate.create')
                ->with('info', 'Silakan lengkapi Profil Pendaftaran kamu terlebih dahulu.');
        }

        $incompleteFields = $this->getIncompleteFields($candidate);

        return view('candidate.dashboard', [
            'candidate' => $candidate,
            'incomplete' => count($incompleteFields) > 0,
            'selectionPhases' => SelectionPhase::orderBy('start_date')->get(),
            'candidateScores' => $candidate->scores ?? collect(),
        ]);
    }

    public function detail(Candidate $candidate)
    {
        $incompleteFields = $this->getIncompleteFields($candidate);

        return view('candidate.detail', [
            'candidate' => $candidate,
            'incompleteFields' => $incompleteFields,
            'incomplete' => count($incompleteFields) > 0,
        ]);
    }

    private function getIncompleteFields($candidate): array
    {
        $fields = [
            'region',
            'identity_number',
            'phone',
            'gender',
            'birth_date',
            'birth_place',
            'address',
            'instagram',
            'religion',
            'avatar',
            'father_name',
            'father_status',
            'father_occupation',
            'father_income',
            'mother_name',
            'mother_status',
            'mother_occupation',
            'mother_income',
            'guardian_name',
            'guardian_phone',
            'guardian_relationship',
            'siblings_count',
            'proof',
            'file_ktp',
        ];

        return collect($fields)
            ->filter(fn($field) => empty($candidate->{$field}))
            ->values()
            ->toArray();
    }

    public function index()
    {
        $candidates = Candidate::with(['user'])->get();
        return view('candidate.index', ['candidates' => $candidates]);
    }

    public function create()
    {
        return view('candidate.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'identity_number' => 'required|string',
            'phone' => 'required|string',
            'instagram' => 'required|string',
            'region' => 'required|string',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'required|string',

            'father_name' => 'nullable|string',
            'father_status' => 'nullable|in:Masih Hidup,Sudah Meninggal',
            'father_occupation' => 'nullable|string',
            'father_income' => 'nullable|string',

            'mother_name' => 'nullable|string',
            'mother_status' => 'nullable|in:Masih Hidup,Sudah Meninggal',
            'mother_occupation' => 'nullable|string',
            'mother_income' => 'nullable|string',

            'guardian_name' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
            'guardian_relationship' => 'nullable|string',
            'siblings_count' => 'nullable|integer',

            'proof' => 'required|array|max:3',
            'proof.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'file_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ubah empty string jadi null untuk nullable fields
        foreach (['instagram', 'religion', 'father_status', 'mother_status'] as $field) {
            if (empty($validated[$field])) {
                $validated[$field] = null;
            }
        }

        // Simpan avatar
        if ($request->filled('avatar')) {
            $imageData = $request->avatar;
            $imageName = time() . '-' . uniqid() . '.jpg';
            $folderPath = public_path('avatars');

            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $imageDecoded = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            file_put_contents($folderPath . '/' . $imageName, $imageDecoded);
            $validated['avatar'] = 'avatars/' . $imageName;
        }

        // Simpan proof images
        $proofPaths = [];
        if ($request->hasFile('proof')) {
            $proofFolder = public_path('proofs');
            if (!is_dir($proofFolder)) mkdir($proofFolder, 0755, true);

            foreach ($request->file('proof') as $file) {
                $fileName = time() . '-' . uniqid() . '.' . $file->extension();
                $file->move($proofFolder, $fileName);
                $proofPaths[] = 'proofs/' . $fileName;
            }
            $validated['proof'] = json_encode($proofPaths);
        }

        // Simpan KTP
        if ($request->hasFile('file_ktp')) {
            $ktpFolder = public_path('ktp');
            if (!is_dir($ktpFolder)) mkdir($ktpFolder, 0755, true);

            $ktpFile = $request->file('file_ktp');
            $ktpFileName = time() . '-' . uniqid() . '.' . $ktpFile->extension();
            $ktpFile->move($ktpFolder, $ktpFileName);
            $validated['file_ktp'] = 'ktp/' . $ktpFileName;
        } else {
            unset($validated['file_ktp']);
        }

        $validated['user_id'] = Auth::id();

        Candidate::create($validated);

        return redirect()->route('candidate.dashboard')->with('success', 'Profil kandidat berhasil disimpan.');
    }


    public function show(Candidate $candidate)
    {
        return view('candidate.show', ['candidate' => $candidate]);
    }

    public function edit(Candidate $candidate)
    {
        // dd($candidate);
        return view('candidate.edit', ['candidate' => $candidate]);
    }

    public function update(Request $request, Candidate $candidate)
    {
        // dd($request->all());
        // Validasi request
        $validated = $request->validate([
            'region' => 'required|string',
            'identity_number' => 'required|string',
            'phone' => 'required|string',
            'instagram' => 'required|string',
            'religion' => 'required|string',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'nullable|string',

            'father_name' => 'nullable|string',
            'father_status' => 'nullable|string',
            'father_occupation' => 'nullable|string',
            'father_income' => 'nullable|string',

            'mother_name' => 'nullable|string',
            'mother_status' => 'nullable|string',
            'mother_occupation' => 'nullable|string',
            'mother_income' => 'nullable|string',

            'guardian_name' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
            'guardian_relationship' => 'nullable|string',
            'siblings_count' => 'nullable|integer',

            'proof' => 'nullable|array|max:3',
            'proof.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'file_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // dd($validated);

        // Verifikasi kepemilikan
        if ($candidate->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        // Update avatar jika ada
        if ($request->filled('avatar') && strpos($request->avatar, 'data:image') === 0) {
            // Hapus avatar lama jika ada
            if ($candidate->avatar && file_exists(public_path($candidate->avatar))) {
                unlink(public_path($candidate->avatar));
            }

            $imageData = $request->avatar;
            $imageName = time() . '-' . uniqid() . '.jpg';
            $folderPath = public_path('avatars');

            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $imageDecoded = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            file_put_contents($folderPath . '/' . $imageName, $imageDecoded);
            $validated['avatar'] = 'avatars/' . $imageName;
        } else {
            // Jangan ubah avatar jika tidak ada update
            unset($validated['avatar']);
        }

        // Update proof images jika ada
        if ($request->hasFile('proof')) {
            // Hapus bukti lama jika ada
            if ($candidate->proof) {
                $oldProofs = json_decode($candidate->proof, true);
                foreach ($oldProofs as $oldProof) {
                    if (file_exists(public_path($oldProof))) {
                        unlink(public_path($oldProof));
                    }
                }
            }

            $proofPaths = [];
            $proofFolder = public_path('proofs');
            if (!is_dir($proofFolder)) mkdir($proofFolder, 0755, true);

            foreach ($request->file('proof') as $file) {
                $fileName = time() . '-' . uniqid() . '.' . $file->extension();
                $file->move($proofFolder, $fileName);
                $proofPaths[] = 'proofs/' . $fileName;
            }
            $validated['proof'] = json_encode($proofPaths);
        }

        // Update KTP jika ada
        if ($request->hasFile('file_ktp')) {
            // Hapus KTP lama jika ada
            if ($candidate->file_ktp && file_exists(public_path($candidate->file_ktp))) {
                unlink(public_path($candidate->file_ktp));
            }

            $ktpFolder = public_path('ktp');
            if (!is_dir($ktpFolder)) mkdir($ktpFolder, 0755, true);

            $ktpFile = $request->file('file_ktp');
            $ktpFileName = time() . '-' . uniqid() . '.' . $ktpFile->extension();
            $ktpFile->move($ktpFolder, $ktpFileName);
            $validated['file_ktp'] = 'ktp/' . $ktpFileName;
        }

        // Update data kandidat
        $candidate->update($validated);

        // dd($candidate);

        return redirect()->route('candidate.dashboard')->with('success', 'Profil kandidat berhasil diperbarui.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate.index')->with('success', 'Candidate deleted.');
    }
}
