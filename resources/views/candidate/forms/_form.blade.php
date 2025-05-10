<form action="{{ $action }}" method="POST">
  @csrf
  @if (strtoupper($method) !== 'POST')
    @method($method)
  @endif

  <div class="form-section">
    <h3 class="form-section-title">Informasi Pribadi</h3>
    <div class="alert alert-info">
      Pastikan data kontak benar dan aktif! Seluruh informasi akan dikirimkan ke kontak berikut.
    </div>
    <div class="form-group">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $candidate->name ?? auth()->user()->name) }}" required>
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $candidate->user->email ?? '') }}" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone" class="form-label">WhatsApp</label>
      <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $candidate->phone ?? '') }}" required>
      @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-section">
    <h3 class="form-section-title">Persyaratan & Komitmen</h3>
    <div class="form-group">
      <div class="alert alert-info">
        <h3 class="text-info"><em>Disclaimer:</em></h3>
        <p>
          Dikarenakan ada beberapa peserta yang tidak memberikan konfirmasi setelah dilakukan penilaian oleh Tim Juri,
          maka untuk proses seleksi berikutnya, Peserta akan diwajibkan untuk membayar <em>Commitment Fee</em> sebesar Rp150.000.
        </p>
        <p>
          Panitia bertekad agar Proses Seleksi LBFL 2025 tetap gratis! Namun, memberikan penilaian kepada Peserta yang
          tidak serius
          dan bersungguh-sungguh, hanya akan membuang waktu dan tenaga Tim Rekruter dan berpotensi menutup peluang bagi
          Peserta lain yang bersungguh-sungguh.
        </p>
        <h4 class="text-info mb-1">
          <strong><em>Commitment fee</em> akan dikembalikan 100%</strong>
        </h4>
        <p>
          Bagi Peserta yang mengikuti seluruh rangkaian seleksi yang tersisa dengan sungguh-sungguh, <em>Commitment Fee</em> akan
          kami kembalikan 100% sebelum Pengumuman Lolos Seleksi Wawancara. Proses Klaim dapat dilakukan di Dashboard masing-masing Peserta.
        </p>
      </div>
      <label class="form-label d-block">Kesediaan Membayar <em>Commitment Fee</em></label>
      <div class="form-check-group">
        <input class="form-check-input @error('is_ready_commitment_fee') is-invalid @enderror" type="radio"
          name="is_ready_commitment_fee" id="fee_yes" value="1"
          {{ old('is_ready_commitment_fee', $candidate->is_ready_commitment_fee ?? null) === '1' ? 'checked' : '' }}
          required>
        <label class="form-check-label" for="fee_yes">
          Ya, saya bersedia membayar <em>commitment fee</em> sebesar Rp150.000,-
        </label>
      </div>
      <div class="form-check-group">
        <input class="form-check-input @error('is_ready_commitment_fee') is-invalid @enderror" type="radio"
          name="is_ready_commitment_fee" id="fee_no" value="0"
          {{ old('is_ready_commitment_fee', $candidate->is_ready_commitment_fee ?? null) === '0' ? 'checked' : '' }}>
        <label class="form-check-label" for="fee_no">
          Tidak, saya tidak bersedia membayar
        </label>
      </div>
      @error('is_ready_commitment_fee')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label class="radio-group-label">Persetujuan Orang Tua/Wali</label>
      <div class="radio-option">
        <input class="form-check-input @error('parent_approval') is-invalid @enderror" type="radio"
          name="parent_approval" id="parent_approval_yes" value="1" @checked(old('parent_approval', $candidate->parent_approval ?? null) == 1) required>
        <label class="form-check-label" for="parent_approval_yes">Ya, menyetujui</label>
      </div>
      <div class="radio-option">
        <input class="form-check-input @error('parent_approval') is-invalid @enderror" type="radio"
          name="parent_approval" id="parent_approval_no" value="0" @checked(old('parent_approval', $candidate->parent_approval ?? null) == 0 &&
                  old('parent_approval', $candidate->parent_approval ?? null) !== null)>
        <label class="form-check-label" for="parent_approval_no">Tidak, belum menyetujui</label>
      </div>
      @error('parent_approval')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label class="radio-group-label">Apakah Anda memiliki paspor?</label>
      <div class="radio-option">
        <input class="form-check-input @error('have_passport') is-invalid @enderror" type="radio" name="have_passport"
          id="have_passport_yes" value="1" @checked(old('have_passport', $candidate->have_passport ?? false) == 1) onchange="togglePassportFields()">
        <label class="form-check-label" for="have_passport_yes">Ya</label>
      </div>
      <div class="radio-option">
        <input class="form-check-input @error('have_passport') is-invalid @enderror" type="radio" name="have_passport"
          id="have_passport_no" value="0" @checked(old('have_passport', $candidate->have_passport ?? false) == 0) onchange="togglePassportFields()">
        <label class="form-check-label" for="have_passport_no">Belum</label>
      </div>
      @error('have_passport')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group hidden-field" id="willing_create_passport_group">
      <label class="radio-group-label">Jika belum punya, apakah Anda bersedia membuat paspor?</label>
      <div class="radio-option">
        <input class="form-check-input @error('willing_create_passport') is-invalid @enderror" type="radio"
          name="willing_create_passport" id="willing_create_passport_yes" value="1"
          @checked(old('willing_create_passport', $candidate->willing_create_passport ?? null) == 1)>
        <label class="form-check-label" for="willing_create_passport_yes">Ya</label>
      </div>
      <div class="radio-option">
        <input class="form-check-input @error('willing_create_passport') is-invalid @enderror" type="radio"
          name="willing_create_passport" id="willing_create_passport_no" value="0" @checked(old('willing_create_passport', $candidate->willing_create_passport ?? null) == 0 &&
                  old('willing_create_passport', $candidate->willing_create_passport ?? null) !== null)>
        <label class="form-check-label" for="willing_create_passport_no">Tidak</label>
      </div>
      @error('willing_create_passport')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label class="radio-group-label">Apakah Anda memiliki kebutuhan khusus?</label>
      <div class="radio-option">
        <input class="form-check-input @error('has_special_needs') is-invalid @enderror" type="radio"
          name="has_special_needs" id="has_special_needs_yes" value="1" @checked(old('has_special_needs', $candidate->has_special_needs ?? false) == 1)
          onchange="toggleSpecialNeedsFields()">
        <label class="form-check-label" for="has_special_needs_yes">Ya</label>
      </div>
      <div class="radio-option">
        <input class="form-check-input @error('has_special_needs') is-invalid @enderror" type="radio"
          name="has_special_needs" id="has_special_needs_no" value="0" @checked(old('has_special_needs', $candidate->has_special_needs ?? false) == 0)
          onchange="toggleSpecialNeedsFields()">
        <label class="form-check-label" for="has_special_needs_no">Tidak</label>
      </div>
      @error('has_special_needs')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group hidden-field" id="special_needs_description_group">
      <label for="special_needs_description" class="form-label">Deskripsi Kebutuhan Khusus</label>
      <textarea name="special_needs_description" id="special_needs_description"
        class="form-textarea @error('special_needs_description') is-invalid @enderror">{{ old('special_needs_description', $candidate->special_needs_description ?? '') }}</textarea>
      @error('special_needs_description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label class="radio-group-label">Apakah Anda pernah bepergian ke luar negeri?</label>
      <div class="radio-option">
        <input class="form-check-input @error('has_traveled_abroad') is-invalid @enderror" type="radio"
          name="has_traveled_abroad" id="has_traveled_abroad_yes" value="1" @checked(old('has_traveled_abroad', $candidate->has_traveled_abroad ?? false) == 1)
          onchange="toggleTravelAbroadFields()">
        <label class="form-check-label" for="has_traveled_abroad_yes">Ya</label>
      </div>
      <div class="radio-option">
        <input class="form-check-input @error('has_traveled_abroad') is-invalid @enderror" type="radio"
          name="has_traveled_abroad" id="has_traveled_abroad_no" value="0" @checked(old('has_traveled_abroad', $candidate->has_traveled_abroad ?? false) == 0)
          onchange="toggleTravelAbroadFields()">
        <label class="form-check-label" for="has_traveled_abroad_no">Belum</label>
      </div>
      @error('has_traveled_abroad')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group hidden-field" id="abroad_destinations_group">
      <label for="abroad_destinations" class="form-label">Sebutkan negara/kota yang pernah dikunjungi</label>
      <textarea name="abroad_destinations" id="abroad_destinations"
        class="form-textarea @error('abroad_destinations') is-invalid @enderror">{{ old('abroad_destinations', $candidate->abroad_destinations ?? '') }}</textarea>
      @error('abroad_destinations')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-section">
    <h3 class="form-section-title">Ekspektasi & Preferensi Program</h3>
    <div class="form-group">
      <label for="expectation_from_program" class="form-label">Apa ekspektasi Anda dari program ini?</label>
      <textarea name="expectation_from_program" id="expectation_from_program"
        class="form-textarea @error('expectation_from_program') is-invalid @enderror">{{ old('expectation_from_program', $candidate->expectation_from_program ?? '') }}</textarea>
      @error('expectation_from_program')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="preferred_team_position" class="form-label">Posisi tim yang diminati</label>
      <input type="text" name="preferred_team_position" id="preferred_team_position"
        class="form-control @error('preferred_team_position') is-invalid @enderror"
        value="{{ old('preferred_team_position', $candidate->preferred_team_position ?? '') }}">
      @error('preferred_team_position')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="preferred_team_position_reason" class="form-label">Alasan memilih posisi tersebut</label>
      <textarea name="preferred_team_position_reason" id="preferred_team_position_reason"
        class="form-textarea @error('preferred_team_position_reason') is-invalid @enderror">{{ old('preferred_team_position_reason', $candidate->preferred_team_position_reason ?? '') }}</textarea>
      @error('preferred_team_position_reason')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-section">
    <h3 class="form-section-title">Catatan Tambahan</h3>
    <div class="form-group">
      <label for="other_notes" class="form-label">Catatan lain (jika ada)</label>
      <textarea name="other_notes" id="other_notes" class="form-textarea @error('other_notes') is-invalid @enderror">{{ old('other_notes', $candidate->other_notes ?? '') }}</textarea>
      @error('other_notes')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn-submit">{{ $submitLabel ?? 'Kirim Pendaftaran' }}</button>
  </div>
</form>

@push('styles')
  <style>
    .form-section {
      margin-bottom: 35px;
      padding-bottom: 20px;
      border-bottom: 1px solid #e0e0e0;
    }

    .form-section:last-child {
      border-bottom: none;
      margin-bottom: 0;
    }

    .form-section-title {
      font-size: 1.4em;
      color: #3498db;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: #555;
    }

    .form-control,
    .form-select,
    .form-textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      transition: border-color 0.3s, box-shadow 0.3s;
      font-size: 1em;
    }

    .form-control:focus,
    .form-select:focus,
    .form-textarea:focus {
      border-color: #3498db;
      box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
      outline: none;
    }

    .form-textarea {
      min-height: 100px;
      resize: vertical;
    }

    .form-check-group {
      margin-bottom: 15px;
    }

    .form-check-label {
      margin-left: 8px;
      font-weight: normal;
      cursor: pointer;
    }

    .form-check-input {
      cursor: pointer;
      margin-right: 5px;
      accent-color: #3498db;
      transform: scale(1.2);
    }

    .radio-group-label {
      font-weight: bold;
      margin-bottom: 10px;
      display: block;
    }

    .radio-option {
      margin-right: 20px;
      display: inline-block;
    }

    .invalid-feedback {
      color: #e74c3c;
      font-size: 0.9em;
      margin-top: 5px;
      display: block;
    }

    .form-control.is-invalid,
    .form-select.is-invalid,
    .form-textarea.is-invalid {
      border-color: #e74c3c;
    }

    .form-control.is-invalid:focus,
    .form-select.is-invalid:focus,
    .form-textarea.is-invalid:focus {
      box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
    }

    .btn-submit {
      background-color: #3498db;
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      transition: background-color 0.3s;
      display: block;
      width: auto;
      margin-left: auto;
      margin-right: 0;
    }

    .btn-submit:hover {
      background-color: #2980b9;
    }

    .text-muted {
      color: #777;
      font-size: 0.9em;
      margin-bottom: 15px;
    }

    .text-muted strong {
      color: #555;
    }

    .hidden-field {
      display: none;
    }
  </style>
@endpush

@push('scripts')
  <script>
    function togglePassportFields() {
      const havePassportNo = document.getElementById('have_passport_no');
      const willingCreatePassportGroup = document.getElementById('willing_create_passport_group');
      if (havePassportNo && havePassportNo.checked) {
        willingCreatePassportGroup.classList.remove('hidden-field');
      } else {
        willingCreatePassportGroup.classList.add('hidden-field');
      }
    }

    function toggleSpecialNeedsFields() {
      const hasSpecialNeedsYes = document.getElementById('has_special_needs_yes');
      const specialNeedsDescriptionGroup = document.getElementById('special_needs_description_group');
      if (hasSpecialNeedsYes && hasSpecialNeedsYes.checked) {
        specialNeedsDescriptionGroup.classList.remove('hidden-field');
      } else {
        specialNeedsDescriptionGroup.classList.add('hidden-field');
      }
    }

    function toggleTravelAbroadFields() {
      const hasTraveledAbroadYes = document.getElementById('has_traveled_abroad_yes');
      const abroadDestinationsGroup = document.getElementById('abroad_destinations_group');
      if (hasTraveledAbroadYes && hasTraveledAbroadYes.checked) {
        abroadDestinationsGroup.classList.remove('hidden-field');
      } else {
        abroadDestinationsGroup.classList.add('hidden-field');
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      togglePassportFields();
      toggleSpecialNeedsFields();
      toggleTravelAbroadFields();
    });
  </script>
@endpush
