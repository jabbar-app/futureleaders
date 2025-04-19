@php $method = $method ?? 'POST'; @endphp
<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if ($method === 'PUT')
    @method('PUT')
  @endif

  {{-- Tampilkan validasi error jika ada --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">
    <div class="col-12 mb-2">
      <h6>1. Data Akun</h6>
      <hr class="mt-0">
    </div>

    <div class="col-md-4 mb-2">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" name="full_name"
        value="{{ old('full_name', $candidate->full_name ?? Auth::user()->name) }}" required>
    </div>
    <div class="col-md-4 mb-2">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email"
        value="{{ old('email', $candidate->email ?? Auth::user()->email) }}" required>
    </div>
    <div class="col-md-4 mb-2">
      <label class="form-label">Nomor Telepon</label>
      <input type="text" class="form-control" name="phone" value="{{ old('phone', $candidate->phone ?? '62') }}"
        required pattern="^62\d+$">
    </div>
    <div class="col-md-4 mb-2">
      <label class="form-label">Nomor Identitas</label>
      <input type="text" class="form-control" name="identity_number"
        value="{{ old('identity_number', $candidate->identity_number ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-2">
      <label class="form-label">Akun Instagram</label>
      <div class="input-group input-group-merge">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="nama.kamu" name="instagram"
          value="{{ old('instagram', $candidate->instagram ?? '') }}" required>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <label class="form-label">Wilayah/Regional</label>
      <select class="form-select" name="region" required>
        <option value="" disabled selected>- Pilih Data -</option>
        @foreach (['Langkat', 'Binjai'] as $region)
          <option value="{{ $region }}" @selected(old('region', $candidate->region ?? '') === $region)>{{ $region }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 mb-2">
      <h6 class="mt-2">2. Data Pribadi</h6>
      <hr class="mt-0">
    </div>

    <div class="col-md-6">
      <label class="form-label">Foto Peserta (Close-up)</label>
      <div class="mb-2">
        <input type="file" class="form-control" id="inputFile" accept="image/*">
        <input type="hidden" name="avatar" id="avatarBase64" value="{{ old('avatar', $candidate->avatar ?? '') }}">
        <div class="form-text">Format: JPG, PNG. Ukuran: Max 2MB</div>
      </div>
      <div class="position-relative mb-4">
        @if (old('avatar', $candidate->avatar ?? ''))
          <img id="avatarPreview" class="img-fluid rounded" src="{{ old('avatar', asset($candidate->avatar) ?? '') }}"
            style="max-height:200px;">
        @else
          <img id="avatarPreview" class="img-fluid rounded d-none mt-2" style="max-height:200px;">
        @endif
        <button type="button" id="changePhotoBtn"
          class="btn btn-sm btn-secondary position-absolute top-0 end-0 m-2 d-none">
          <i class="bi bi-pencil"></i> Ubah
        </button>
      </div>
    </div>

    <div class="col-md-6 mb-2">
      <label class="form-label">Jenis Kelamin</label>
      <select class="form-select" name="gender" required>
        <option value="" disabled selected>- Pilih Data -</option>
        <option value="Laki-laki" @selected(old('gender', $candidate->gender ?? '') === 'Laki-laki')>Laki-laki</option>
        <option value="Perempuan" @selected(old('gender', $candidate->gender ?? '') === 'Perempuan')>Perempuan</option>
      </select>
    </div>

    <div class="col-md-4 mb-2">
      <label class="form-label">Tempat Lahir</label>
      <input type="text" class="form-control" name="birth_place" placeholder="Kota Kelahiran"
        value="{{ old('birth_place', $candidate->birth_place ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-2">
      <label class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" name="birth_date"
        value="{{ old('birth_date', $candidate->birth_date ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-2">
      <label class="form-label">Agama</label>
      <select class="form-select" name="religion" required>
        <option value="" disabled selected>- Pilih Data -</option>
        @foreach (['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghuchu'] as $religion)
          <option value="{{ $religion }}" @selected(old('religion', $candidate->religion ?? '') === $religion)>{{ $religion }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-12 mb-2">
      <label class="form-label">Alamat Tempat Tinggal Saat Ini</label>
      <textarea class="form-control" name="address" rows="2"
        placeholder="Nama Jalan, Nama Gang/No. Rumah, Kelurahan, Kecamatan, Kabupaten/Kota, Provinsi, Kode Pos." required>{{ old('address', $candidate->address ?? '') }}</textarea>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 mb-2">
      <h6 class="mt-2">3. Data Keluarga</h6>
      <hr class="mt-0">
    </div>

    @php
      $incomeOptions = [
          'not_defined' => 'Tidak berpenghasilan',
          'below_3m' => 'Di bawah 3jt',
          '3m_5m' => '3jt - 5jt',
          '5m_10m' => '5jt - 10jt',
          'above_10m' => 'Di atas 10jt',
      ];
    @endphp

    @foreach ([
        'father' => 'Ayah',
        'mother' => 'Ibu',
    ] as $prefix => $label)
      <div class="col-md-3 mb-2">
        <label class="form-label">Nama {{ $label }}</label>
        <input type="text" class="form-control" name="{{ $prefix }}_name"
          value="{{ old($prefix . '_name', $candidate->{$prefix . '_name'} ?? '') }}">
      </div>
      <div class="col-md-3 mb-2">
        <label class="form-label">Status {{ $label }}</label>
        <select class="form-select" name="{{ $prefix }}_status">
          <option value="" selected disabled>- Pilih Data -</option>
          <option value="Masih Hidup" @selected(old($prefix . '_status', $candidate->{$prefix . '_status'} ?? '') === 'Masih Hidup')>Masih Hidup</option>
          <option value="Sudah Meninggal" @selected(old($prefix . '_status', $candidate->{$prefix . '_status'} ?? '') === 'Sudah Meninggal')>Sudah Meninggal</option>
        </select>
      </div>
      <div class="col-md-3 mb-2">
        <label class="form-label">Pekerjaan {{ $label }}</label>
        <input type="text" class="form-control" name="{{ $prefix }}_occupation"
          value="{{ old($prefix . '_occupation', $candidate->{$prefix . '_occupation'} ?? '') }}">
      </div>
      <div class="col-md-3 mb-2">
        <label class="form-label">Penghasilan {{ $label }}</label>
        <select class="form-select" name="{{ $prefix }}_income">
          <option value="" selected disabled>- Pilih Rentang -</option>
          @foreach ($incomeOptions as $key => $text)
            <option value="{{ $key }}" @selected((string) old($prefix . '_income', $candidate->{$prefix . '_income'} ?? '') === (string) $key)>
              {{ $text }}
            </option>
          @endforeach
        </select>
      </div>
    @endforeach

    <div class="col-md-3 mb-2">
      <label class="form-label">Jumlah Saudara Kandung</label>
      <input type="number" class="form-control" name="siblings_count"
        value="{{ old('siblings_count', $candidate->siblings_count ?? '') }}">
    </div>
    <div class="col-md-3 mb-2">
      <label class="form-label">Nama Kontak Darurat</label>
      <input type="text" class="form-control" name="guardian_name"
        value="{{ old('guardian_name', $candidate->guardian_name ?? '') }}">
    </div>
    <div class="col-md-3 mb-2">
      <label class="form-label">No. Telp Kontak Darurat</label>
      <input type="text" class="form-control" name="guardian_phone"
        value="{{ old('guardian_phone', $candidate->guardian_phone ?? '') }}">
    </div>
    <div class="col-md-3 mb-2">
      <label class="form-label">Hubungan dengan Peserta</label>
      <input type="text" class="form-control" name="guardian_relationship"
        value="{{ old('guardian_relationship', $candidate->guardian_relationship ?? '') }}">
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 mb-2">
      <h6 class="mt-2">4. Data Kelengkapan Berkas</h6>
      <hr class="mt-0">
    </div>

    <div class="col-12">
      <label class="form-label">Bukti Screenshot Share Info ke 3 Grup WhatsApp</label>
      @php
        $proofs = isset($candidate) && $candidate->proof ? json_decode($candidate->proof, true) : [];
      @endphp
      <input type="file" class="form-control" id="inputProof" name="proof[]" accept="image/*" multiple
        @if (count($proofs) == 0) required @endif>

      <div class="row mt-2" id="preview-container">
        @foreach ($proofs as $proof)
          <div class="col-md-4 mb-2">
            <div class="position-relative">
              <img src="{{ asset($proof) }}" class="img-fluid rounded border"
                style="height: 150px; object-fit: cover;">
              <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                onclick="this.closest('.col-md-4').remove()">
                <i class="bi bi-x"></i>
              </button>
            </div>
          </div>
        @endforeach
      </div>

      <button type="button" class="btn btn-outline-primary mt-2" id="add-image-btn">
        + Tambah Gambar
      </button>

      <p><small class="text-muted">Max 3 gambar. Format: JPG, PNG. Max 2MB per gambar</small></p>
    </div>

    <div class="col-12 mt-3">
      <label class="form-label">Foto KTP</label>
      <input type="file" class="form-control" name="file_ktp" @if (!isset($candidate) || !$candidate->file_ktp) required @endif>

      @if (isset($candidate) && $candidate->file_ktp)
        <div class="mt-2">
          <img src="{{ asset($candidate->file_ktp) }}" class="img-fluid rounded border"
            style="height: 200px; object-fit: cover;">
        </div>
      @endif
    </div>
  </div>

  <div class="col-12 mt-4">
    <hr>
    <button type="submit" class="btn btn-primary">
      {{ $submitLabel }}
    </button>
  </div>
</form>


<!-- Modal Crop -->
<div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atur Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <i class="bi bi-info-circle"></i> Posisikan dan atur ukuran foto agar wajah terlihat jelas
        </div>
        <div class="crop-container">
          <img id="cropImage" class="img-fluid">
        </div>
        <div class="mt-3">
          <div class="d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" id="zoomInBtn">
              <i class="bi bi-zoom-in"></i> Perbesar
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="zoomOutBtn">
              <i class="bi bi-zoom-out"></i> Perkecil
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="rotateBtn">
              <i class="bi bi-arrow-clockwise"></i> Putar
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="resetBtn">
              <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="cropSaveBtn">Simpan Foto</button>
      </div>
    </div>
  </div>
</div>

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
  <style>
    .crop-container {
      max-height: 500px;
      background-color: #f8f9fa;
    }

    .cropper-view-box,
    .cropper-face {
      border-radius: 50%;
    }
  </style>
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const inputFile = document.getElementById('inputFile');
      const avatarBase64 = document.getElementById('avatarBase64');
      const avatarPreview = document.getElementById('avatarPreview');
      const cropImage = document.getElementById('cropImage');
      const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
      const changePhotoBtn = document.getElementById('changePhotoBtn');
      let cropper;

      // === Tombol "Ubah" selalu bisa digunakan ===
      changePhotoBtn.addEventListener('click', function() {
        inputFile.click();
      });

      // === Hover effect hanya jika preview terlihat ===
      if (!avatarPreview.classList.contains('d-none')) {
        changePhotoBtn.classList.remove('d-none');

        avatarPreview.addEventListener('mouseenter', function() {
          changePhotoBtn.style.opacity = '1';
        });

        avatarPreview.addEventListener('mouseleave', function() {
          changePhotoBtn.style.opacity = '0.7';
        });
      }

      // === Handle ketika file baru diunggah ===
      inputFile.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
          alert('Hanya file gambar yang diperbolehkan.');
          this.value = '';
          return;
        }

        if (file.size > 2 * 1024 * 1024) {
          alert('Ukuran file terlalu besar. Maksimal 2MB.');
          this.value = '';
          return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
          cropImage.src = e.target.result;
          cropModal.show();

          document.getElementById('cropModal').addEventListener('shown.bs.modal', function() {
            if (cropper) cropper.destroy();

            cropper = new Cropper(cropImage, {
              aspectRatio: 1,
              viewMode: 1,
              dragMode: 'move',
              autoCropArea: 0.8,
              guides: true,
              highlight: false,
              cropBoxMovable: true,
              cropBoxResizable: true,
              toggleDragModeOnDblclick: false
            });
          }, {
            once: true
          });
        };
        reader.readAsDataURL(file);
      });

      // === Tombol kontrol cropper ===
      document.getElementById('zoomInBtn').addEventListener('click', () => cropper.zoom(0.1));
      document.getElementById('zoomOutBtn').addEventListener('click', () => cropper.zoom(-0.1));
      document.getElementById('rotateBtn').addEventListener('click', () => cropper.rotate(90));
      document.getElementById('resetBtn').addEventListener('click', () => cropper.reset());

      // === Simpan hasil crop dan tampilkan preview ===
      document.getElementById('cropSaveBtn').addEventListener('click', () => {
        const canvas = cropper.getCroppedCanvas({
          width: 600,
          height: 600,
          fillColor: '#fff',
          imageSmoothingEnabled: true,
          imageSmoothingQuality: 'high'
        });

        if (!canvas) {
          alert('Gagal memproses gambar. Silakan coba lagi.');
          return;
        }

        const base64 = canvas.toDataURL('image/jpeg', 0.85);

        avatarBase64.value = base64;
        avatarPreview.src = base64;
        avatarPreview.classList.remove('d-none');
        changePhotoBtn.classList.remove('d-none');

        cropModal.hide();
        inputFile.value = '';
      });

      // === Bukti upload WA preview dan validasi ===
      const proofInput = document.getElementById('inputProof');
      const previewContainer = document.getElementById('preview-container');
      const addImageBtn = document.getElementById('add-image-btn');

      addImageBtn.addEventListener('click', function() {
        proofInput.click();
      });

      proofInput.addEventListener('change', function() {
        const files = Array.from(this.files);
        const existingImages = previewContainer.querySelectorAll('.col-md-4').length;
        const totalImages = existingImages + files.length;

        if (totalImages > 3) {
          alert('Maksimal upload 3 gambar');
          this.value = '';
          return;
        }

        let validFiles = true;
        files.forEach(file => {
          if (!file.type.startsWith('image/')) {
            alert('Hanya file gambar yang diperbolehkan.');
            validFiles = false;
            return;
          }

          if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB per gambar.');
            validFiles = false;
            return;
          }
        });

        if (!validFiles) {
          this.value = '';
          return;
        }

        files.forEach(file => {
          const reader = new FileReader();
          reader.onload = e => {
            const col = document.createElement('div');
            col.className = 'col-md-4 mb-2';

            const imgContainer = document.createElement('div');
            imgContainer.className = 'position-relative';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-fluid rounded border';
            img.style.height = '150px';
            img.style.width = '100%';
            img.style.objectFit = 'cover';

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 m-1';
            removeBtn.innerHTML = '<i class="bi bi-x"></i>';
            removeBtn.addEventListener('click', function() {
              col.remove();

              let dt = new DataTransfer();
              const remainingFiles = Array.from(proofInput.files)
                .filter(f => f !== file);
              remainingFiles.forEach(f => dt.items.add(f));
              proofInput.files = dt.files;

              if (previewContainer.querySelectorAll('.col-md-4').length < 3) {
                addImageBtn.disabled = false;
              }
            });

            imgContainer.appendChild(img);
            imgContainer.appendChild(removeBtn);
            col.appendChild(imgContainer);
            previewContainer.appendChild(col);

            if (previewContainer.querySelectorAll('.col-md-4').length >= 3) {
              addImageBtn.disabled = true;
            }
          };
          reader.readAsDataURL(file);
        });
      });

      // === Inisialisasi tombol add image jika sudah penuh ===
      if (previewContainer.querySelectorAll('.col-md-4').length >= 3) {
        addImageBtn.disabled = true;
      }
    });
  </script>
@endpush
