<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\SelectionPhase;
use App\Services\GroundsApiService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class CandidateController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $existsInGround = GroundsApiService::emailExists($user->email);

        $candidate = $user->candidate;
        $nextData = $candidate?->next;

        if ($existsInGround && !$nextData) {
            return redirect()->route('confirmation.create', $candidate);
        }

        $candidate = Candidate::with(['educations', 'achievements', 'organizations', 'motivation', 'scores.selectionPhase'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$candidate) {
            return redirect()
                ->route('candidate.create')
                ->with('info', 'Silakan lengkapi Profil Pendaftaran kamu terlebih dahulu.');
        }

        // if (!empty($candidate->next) && $candidate->status == 'Stage 2') {
        //     return view('candidate.stage-2', compact('candidate'));
        // }

        $incompleteFields = $this->getIncompleteFields($candidate);

        // Ambil fase seleksi aktif (opsional: bisa ditambah filter where is_active = true)
        $activePhase = SelectionPhase::where('is_active', true)
            ->whereNotNull('end_date')
            ->orderByDesc('end_date')
            ->first();

        return view('candidate.dashboard', [
            'candidate' => $candidate,
            'incomplete' => count($incompleteFields) > 0,
            'selectionPhases' => SelectionPhase::orderBy('start_date')->get(),
            'candidateScores' => $candidate->scores ?? collect(),
            'endDate' => $activePhase?->end_date,
        ]);
    }

    public function detail(Candidate $candidate)
    {
        $candidate->load([
            'user',
            'motivation',
            'educations',
            'achievements',
            'organizations',
        ]);

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
            'tshirt_size',
            'jacket_size',
            'address',
            'illness',
            'allergies',
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
        $existingCandidate = Candidate::where('user_id', Auth::id())->first();
        if ($existingCandidate) {
            return redirect()->route('candidate.dashboard');
        }

        $validated = $request->validate([
            'identity_number' => 'required|string',
            'phone' => 'required|string',
            'instagram' => 'required|string',
            'region' => 'required|string',
            'religion' => 'required|string',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string',
            'tshirt_size' => 'required|string',
            'jacket_size' => 'required|string',
            'address' => 'required|string',
            'skills' => 'required|string',
            'illness' => 'required|string',
            'allergies' => 'required|string',
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

        foreach (['instagram', 'religion', 'father_status', 'mother_status'] as $field) {
            if (empty($validated[$field])) {
                $validated[$field] = null;
            }
        }

        try {
            $manager = new ImageManager(new GdDriver());

            // Simpan avatar base64
            if ($request->filled('avatar')) {
                $imageData = $request->avatar;
                $imageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

                if ($imageBinary === false) {
                    return back()->withErrors(['avatar' => 'Gagal memproses gambar avatar.'])->withInput();
                }

                $avatarPath = public_path('avatars');
                if (!is_dir($avatarPath)) mkdir($avatarPath, 0755, true);

                $avatarName = time() . '-' . uniqid() . '.jpg';
                $manager->read($imageBinary)->toJpeg(75)->save($avatarPath . '/' . $avatarName);

                $validated['avatar'] = 'avatars/' . $avatarName;
            }

            // Simpan bukti proof
            $proofPaths = [];
            if ($request->hasFile('proof')) {
                $proofPath = public_path('proofs');
                if (!is_dir($proofPath)) mkdir($proofPath, 0755, true);

                foreach ($request->file('proof') as $file) {
                    $fileContent = file_get_contents($file->getRealPath());
                    if (!$fileContent) continue;

                    $fileName = time() . '-' . uniqid() . '.jpg';
                    $manager->read($fileContent)->toJpeg(10)->save($proofPath . '/' . $fileName);
                    $proofPaths[] = 'proofs/' . $fileName;
                }

                $validated['proof'] = json_encode($proofPaths);
            }

            // Simpan KTP
            if ($request->hasFile('file_ktp')) {
                $ktpPath = public_path('ktp');
                if (!is_dir($ktpPath)) mkdir($ktpPath, 0755, true);

                $ktpContent = file_get_contents($request->file('file_ktp')->getRealPath());
                if ($ktpContent) {
                    $ktpFileName = time() . '-' . uniqid() . '.jpg';
                    $manager->read($ktpContent)->toJpeg(75)->save($ktpPath . '/' . $ktpFileName);
                    $validated['file_ktp'] = 'ktp/' . $ktpFileName;
                }
            } else {
                unset($validated['file_ktp']);
            }

            $validated['user_id'] = Auth::id();

            $candidate = Candidate::create($validated);

            try {
                $numbers = ['628990980799', '6281273952234'];
                $candidateUrl = url('/candidate/detail/' . $candidate->id);
                $message = "Halo Admin, ada Pendaftar baru dengan nama '{$candidate->user->name}'.\n\nLihat detailnya di: {$candidateUrl}";

                foreach ($numbers as $number) {
                    app(WhatsappController::class)->sendNotification($message, $number);
                }
            } catch (\Exception $e) {
                Log::error('WhatsApp notification failed: ' . $e->getMessage());
            }

            return redirect()->route('candidate.dashboard')->with('success', 'Profil kandidat berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data kandidat: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
            ]);
            return back()->withErrors(['submit' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'])->withInput();
        }
    }



    public function show(Candidate $candidate)
    {
        $candidate->load([
            'user',
            'motivations',
            'educations',
            'achievements',
            'organizations',
        ]);

        return view('candidate.show', ['candidate' => $candidate]);
    }

    public function edit(Candidate $candidate)
    {
        $activePhase = SelectionPhase::where('is_active', true)->first();

        if ($activePhase && now()->greaterThan($activePhase->end_date)) {
            return redirect()->route('candidate.dashboard')->with('warning', 'Maaf, waktu pengisian sudah ditutup.');
        }

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
            'tshirt_size' => 'required|string',
            'jacket_size' => 'required|string',
            'address' => 'required|string',
            'skills' => 'required|string',
            'illness' => 'required|string',
            'allergies' => 'required|string',
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

        $manager = new ImageManager(new GdDriver());

        // Update avatar jika ada
        if ($request->filled('avatar') && strpos($request->avatar, 'data:image') === 0) {
            if ($candidate->avatar && file_exists(public_path($candidate->avatar))) {
                unlink(public_path($candidate->avatar));
            }

            $imageData = $request->avatar;
            $imageName = time() . '-' . uniqid() . '.jpg';
            $folderPath = public_path('avatars');

            if (!is_dir($folderPath)) mkdir($folderPath, 0755, true);

            $imageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

            $manager->read($imageBinary)
                ->toJpeg(75)
                ->save($folderPath . '/' . $imageName);

            $validated['avatar'] = 'avatars/' . $imageName;
        } else {
            unset($validated['avatar']);
        }

        // Update proof images jika ada
        if ($request->hasFile('proof')) {
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
                $fileName = time() . '-' . uniqid() . '.jpg';
                $targetPath = $proofFolder . '/' . $fileName;

                $manager->read(file_get_contents($file->getRealPath()))
                    ->toJpeg(10) // Kompres maksimal
                    ->save($targetPath);

                $proofPaths[] = 'proofs/' . $fileName;
            }

            $validated['proof'] = json_encode($proofPaths);
        }

        // Update file KTP jika ada
        if ($request->hasFile('file_ktp')) {
            if ($candidate->file_ktp && file_exists(public_path($candidate->file_ktp))) {
                unlink(public_path($candidate->file_ktp));
            }

            $ktpFolder = public_path('ktp');
            if (!is_dir($ktpFolder)) mkdir($ktpFolder, 0755, true);

            $ktpFile = $request->file('file_ktp');
            $ktpFileName = time() . '-' . uniqid() . '.jpg';
            $targetPath = $ktpFolder . '/' . $ktpFileName;

            $manager->read(file_get_contents($ktpFile->getRealPath()))
                ->toJpeg(75)
                ->save($targetPath);

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
        return redirect()->route('dashboard')->with('success', 'Candidate deleted.');
    }

    public function education_create(Candidate $candidate)
    {
        return view('candidate.education.create', compact('candidate'));
    }

    public function education_store(Request $request, Candidate $candidate)
    {
        $request->validate([
            'educations' => 'array',
            'educations.*.institution_name' => 'required|string',
            'educations.*.level' => 'nullable|string',
            'educations.*.major' => 'nullable|string',
            'educations.*.start_year' => 'nullable|integer',
            'educations.*.end_year' => 'nullable|integer',
            'educations.*.gpa' => 'nullable|string',
            'educations.*.activities' => 'nullable|string',
        ]);

        $candidate->educations()->delete();

        if (!empty($request->educations)) {
            foreach ($request->educations as $edu) {
                $candidate->educations()->create($edu);
            }
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data pendidikan berhasil disimpan.');
    }

    public function education_edit(Candidate $candidate)
    {
        return view('candidate.education.edit', compact('candidate'));
    }

    public function education_update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'educations' => 'array',
            'educations.*.institution_name' => 'required|string',
            'educations.*.level' => 'nullable|string',
            'educations.*.major' => 'nullable|string',
            'educations.*.start_year' => 'nullable|integer',
            'educations.*.end_year' => 'nullable|integer',
            'educations.*.gpa' => 'nullable|string',
            'educations.*.activities' => 'nullable|string',
        ]);

        $candidate->educations()->delete();

        if (!empty($request->educations)) {
            foreach ($request->educations as $edu) {
                $candidate->educations()->create($edu);
            }
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    public function organization_create(Candidate $candidate)
    {
        return view('candidate.organization.create', compact('candidate'));
    }

    public function organization_store(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'organizations' => 'required|array|min:1',
            'organizations.*.organization_name' => 'required|string',
            'organizations.*.position' => 'nullable|string',
            'organizations.*.year' => 'nullable|string',
            'organizations.*.description' => 'nullable|string',
        ]);

        // Clear old data
        $candidate->organizations()->delete();

        // Insert new
        foreach ($validated['organizations'] as $org) {
            $candidate->organizations()->create($org);
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data organisasi berhasil disimpan.');
    }

    public function organization_edit(Candidate $candidate)
    {
        return view('candidate.organization.edit', compact('candidate'));
    }

    public function organization_update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'organizations' => 'nullable|array',
            'organizations.*.organization_name' => 'required|string',
            'organizations.*.position' => 'nullable|string',
            'organizations.*.year' => 'nullable|string',
            'organizations.*.description' => 'nullable|string',
        ]);

        // Hapus semua data lama
        $candidate->organizations()->delete();

        // Simpan ulang hanya jika data baru tersedia
        foreach ($validated['organizations'] ?? [] as $org) {
            $candidate->organizations()->create($org);
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data organisasi berhasil diperbarui.');
    }

    public function achievement_create(Candidate $candidate)
    {
        return view('candidate.achievement.create', compact('candidate'));
    }

    public function achievement_store(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'achievements' => 'required|array|min:1',
            'achievements.*.title' => 'required|string',
            'achievements.*.year' => 'nullable|integer',
            'achievements.*.issuer' => 'nullable|string',
            'achievements.*.description' => 'nullable|string',
        ]);

        $candidate->achievements()->delete();

        foreach ($validated['achievements'] as $item) {
            $candidate->achievements()->create($item);
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data prestasi berhasil disimpan.');
    }

    public function achievement_edit(Candidate $candidate)
    {
        return view('candidate.achievement.edit', compact('candidate'));
    }

    public function achievement_update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'achievements' => 'array',
            'achievements.*.title' => 'required|string',
            'achievements.*.year' => 'nullable|integer',
            'achievements.*.issuer' => 'nullable|string',
            'achievements.*.description' => 'nullable|string',
        ]);

        $candidate->achievements()->delete();

        if (!empty($validated['achievements'])) {
            foreach ($validated['achievements'] as $item) {
                $candidate->achievements()->create($item);
            }
        }

        return redirect()->route('candidate.dashboard')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function updateConfirmationLink(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'link' => 'required|url',
        ]);

        $candidate = Candidate::where('phone', $request->phone)->first();

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found.'], 404);
        }

        $candidate->confirmation_link = $request->link;
        $candidate->save();

        return response()->json(['message' => 'Confirmation link updated successfully.']);
    }
}
