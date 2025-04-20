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

  <div id="achievements-wrapper">
    <label class="form-label fw-bold">Pengalaman Prestasi</label>

    @php
      $achievements = old('achievements', $candidate->achievements ?? []);
    @endphp

    @foreach ($achievements as $index => $achievement)
      <div class="row g-3 mb-2 achievement-item">
        <div class="col-md-4">
          <input type="text" name="achievements[{{ $index }}][title]" class="form-control"
            placeholder="Judul Prestasi" value="{{ $achievement['title'] ?? '' }}" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="achievements[{{ $index }}][year]" class="form-control" placeholder="Tahun"
            value="{{ $achievement['year'] ?? '' }}">
        </div>
        <div class="col-md-3">
          <input type="text" name="achievements[{{ $index }}][issuer]" class="form-control"
            placeholder="Penyelenggara" value="{{ $achievement['issuer'] ?? '' }}">
        </div>
        <div class="col-md-2">
          <input type="text" name="achievements[{{ $index }}][description]" class="form-control"
            placeholder="Deskripsi" value="{{ $achievement['description'] ?? '' }}">
        </div>
        <div class="col-md-1 text-end">
          <button type="button" class="btn btn-danger remove-achievement">&times;</button>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mb-3">
    <button type="button" id="add-achievement" class="btn btn-outline-primary btn-sm">
      + Tambah Prestasi
    </button>
  </div>

  <div class="col-12 mt-4">
    <hr>
    <button type="submit" class="btn btn-primary">
      {{ $submitLabel }}
    </button>
  </div>
</form>

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let wrapper = document.getElementById('achievements-wrapper');
      let addBtn = document.getElementById('add-achievement');

      let index = {{ is_array($achievements) ? count($achievements) : 0 }};

      addBtn.addEventListener('click', function() {
        const html = `
        <div class="row g-3 mb-2 achievement-item">
          <div class="col-md-4">
            <input type="text" name="achievements[${index}][title]" class="form-control" placeholder="Judul Prestasi" required>
          </div>
          <div class="col-md-2">
            <input type="number" name="achievements[${index}][year]" class="form-control" placeholder="Tahun">
          </div>
          <div class="col-md-3">
            <input type="text" name="achievements[${index}][issuer]" class="form-control" placeholder="Penyelenggara">
          </div>
          <div class="col-md-2">
            <input type="text" name="achievements[${index}][description]" class="form-control" placeholder="Deskripsi">
          </div>
          <div class="col-md-1 text-end">
            <button type="button" class="btn btn-danger btn-sm remove-achievement">&times;</button>
          </div>
        </div>`;
        wrapper.insertAdjacentHTML('beforeend', html);
        index++;
      });

      wrapper.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-achievement')) {
          e.target.closest('.achievement-item').remove();
        }
      });
    });
  </script>
@endpush
