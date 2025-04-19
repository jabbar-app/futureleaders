@php $method = $method ?? 'POST'; @endphp
<form class="row g-3" method="POST" action="{{ $action }}" enctype="multipart/form-data">
  @csrf
  @if ($method === 'PUT')
    @method('PUT')
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- === Form Bagian 1: Data Akun === -->
  <div class="col-md-4">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="full_name"
      value="{{ old('full_name', $candidate->full_name ?? Auth::user()->name) }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email"
      value="{{ old('email', $candidate->email ?? Auth::user()->email) }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $candidate->phone ?? '62') }}"
      required pattern="^62\d+$">
  </div>
  <div class="col-md-4">
    <label class="form-label">Nomor Identitas</label>
    <input type="text" class="form-control" name="identity_number"
      value="{{ old('identity_number', $candidate->identity_number ?? '') }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Akun Instagram</label>
    <input type="text" class="form-control" name="instagram"
      value="{{ old('instagram', $candidate->instagram ?? '') }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Agama</label>
    <select class="form-select" name="religion" required>
      <option value="" selected disabled>- Pilih Data -</option>
      <option value="Islam" @selected(old('religion', $candidate->religion ?? '') === 'Islam')>Islam</option>
      <option value="Kristen" @selected(old('religion', $candidate->religion ?? '') === 'Kristen')>Kristen</option>
      <option value="Katolik" @selected(old('religion', $candidate->religion ?? '') === 'Katolik')>Katolik</option>
      <option value="Buddha" @selected(old('religion', $candidate->religion ?? '') === 'Buddha')>Buddha</option>
      <option value="Hindu" @selected(old('religion', $candidate->religion ?? '') === 'Hindu')>Hindu</option>
      <option value="Konghuchu" @selected(old('religion', $candidate->religion ?? '') === 'Konghuchu')>Konghuchu</option>
    </select>
  </div>

  <!-- === Form Bagian 2: Foto & Pribadi === -->
  <div class="col-md-6">
    <label class="form-label">Foto Peserta (Close-up)</label>
    <div class="mb-2">
      <input type="file" class="form-control" id="inputFile" accept="image/*">
      <input type="hidden" name="avatar" id="avatarBase64" value="{{ old('avatar', $candidate->avatar ?? '') }}">
      <div class="form-text">Format: JPG, PNG. Ukuran: Max 2MB</div>
    </div>
    <div class="position-relative">
      @if (old('avatar', $candidate->avatar ?? ''))
        <img id="avatarPreview" class="img-fluid rounded mt-2" src="{{ old('avatar', $candidate->avatar ?? '') }}"
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
  <div class="col-md-6">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" name="birth_date"
      value="{{ old('birth_date', $candidate->birth_date ?? '') }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" name="birth_place"
      value="{{ old('birth_place', $candidate->birth_place ?? '') }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Jenis Kelamin</label>
    <select class="form-select" name="gender" required>
      <option value="">- Pilih -</option>
      <option value="Laki-laki" @selected(old('gender', $candidate->gender ?? '') === 'Laki-laki')>Laki-laki</option>
      <option value="Perempuan" @selected(old('gender', $candidate->gender ?? '') === 'Perempuan')>Perempuan</option>
    </select>
  </div>
  <div class="col-12">
    <label class="form-label">Alamat Tempat Tinggal Saat Ini</label>
    <textarea class="form-control" name="address" rows="2" required>{{ old('address', $candidate->address ?? '') }}</textarea>
  </div>

  <!-- === Form Bagian 4: Upload File === -->
  <div class="col-12">
    <label class="form-label">Bukti Screenshot Share ke 3 Grup WhatsApp</label>
    <input type="file" class="form-control" id="inputProof" name="proof[]" accept="image/*" multiple required>
    <div class="row mt-2" id="preview-container">
      @if (isset($candidate) && $candidate->proofs)
        @foreach ($candidate->proofs as $proof)
          <div class="col-md-4 mb-2">
            <img src="{{ $proof }}" class="img-fluid rounded border" style="height: 150px; object-fit: cover;">
          </div>
        @endforeach
      @endif
    </div>
    <small class="text-muted">Max 3 gambar. Format: JPG, PNG. Ukuran: Max 2MB per gambar</small>
  </div>

  <div class="col-12">
    <label class="form-label">Foto KTP</label>
    <input type="file" class="form-control" name="file_ktp" required>
    @if (isset($candidate) && $candidate->file_ktp)
      <div class="mt-2">
        <img src="{{ $candidate->file_ktp }}" class="img-fluid rounded border" style="max-height: 150px;">
      </div>
    @endif
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary mt-4">{{ $submitLabel }}</button>
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
      // Avatar cropping functionality
      const inputFile = document.getElementById('inputFile');
      const avatarBase64 = document.getElementById('avatarBase64');
      const avatarPreview = document.getElementById('avatarPreview');
      const cropImage = document.getElementById('cropImage');
      const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
      const changePhotoBtn = document.getElementById('changePhotoBtn');
      let cropper;

      // Show change button when hovering over existing image
      if (!avatarPreview.classList.contains('d-none')) {
        changePhotoBtn.classList.remove('d-none');

        avatarPreview.addEventListener('mouseenter', function() {
          changePhotoBtn.style.opacity = '1';
        });

        avatarPreview.addEventListener('mouseleave', function() {
          changePhotoBtn.style.opacity = '0.7';
        });

        changePhotoBtn.addEventListener('click', function() {
          inputFile.click();
        });
      }

      // Handle file input change
      inputFile.addEventListener('change', function(e) {
        const file = e.target.files[0];

        // Validate file
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

        // Read and prepare image
        const reader = new FileReader();
        reader.onload = function(e) {
          cropImage.src = e.target.result;

          // Initialize cropper after modal is shown
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

      // Cropper control buttons
      document.getElementById('zoomInBtn').addEventListener('click', () => {
        cropper.zoom(0.1);
      });

      document.getElementById('zoomOutBtn').addEventListener('click', () => {
        cropper.zoom(-0.1);
      });

      document.getElementById('rotateBtn').addEventListener('click', () => {
        cropper.rotate(90);
      });

      document.getElementById('resetBtn').addEventListener('click', () => {
        cropper.reset();
      });

      // Save cropped image
      document.getElementById('cropSaveBtn').addEventListener('click', () => {
        // Get cropped canvas with reasonable size
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

        // Convert to optimized JPEG
        const base64 = canvas.toDataURL('image/jpeg', 0.85);

        // Update hidden input and preview
        avatarBase64.value = base64;
        avatarPreview.src = base64;
        avatarPreview.classList.remove('d-none');
        changePhotoBtn.classList.remove('d-none');

        // Close modal and reset file input
        cropModal.hide();
        inputFile.value = '';
      });

      // Preview bukti upload WA with validation
      const proofInput = document.getElementById('inputProof');
      const previewContainer = document.getElementById('preview-container');

      proofInput.addEventListener('change', function() {
        const files = Array.from(this.files);

        // Validate file count
        if (files.length > 3) {
          alert('Maksimal upload 3 gambar');
          this.value = '';
          return;
        }

        // Validate each file
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

        // Clear previous previews
        previewContainer.innerHTML = '';

        // Create previews
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

              // Create new FileList
              let dt = new DataTransfer();
              const remainingFiles = Array.from(proofInput.files)
                .filter(f => f !== file);
              remainingFiles.forEach(f => dt.items.add(f));
              proofInput.files = dt.files;
            });

            imgContainer.appendChild(img);
            imgContainer.appendChild(removeBtn);
            col.appendChild(imgContainer);
            previewContainer.appendChild(col);
          };
          reader.readAsDataURL(file);
        });
      });
    });
  </script>
@endpush
