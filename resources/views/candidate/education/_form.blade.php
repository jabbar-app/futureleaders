@php $method = $method ?? 'POST'; @endphp
<form class="row g-3" method="POST" action="{{ $action }}">
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

  <div id="education-wrapper">
    @php $educations = old('educations', $candidate->educations->toArray() ?? [[]]); @endphp

    @foreach ($educations as $index => $education)
      <div class="border rounded p-3 mb-3 education-item">
        <div class="row g-2">
          <div class="col-md-6">
            <label class="form-label">Nama Institusi</label>
            <input type="text" name="educations[{{ $index }}][institution_name]" class="form-control"
              value="{{ $education['institution_name'] ?? '' }}" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Jenjang</label>
            <input type="text" name="educations[{{ $index }}][level]" class="form-control"
              value="{{ $education['level'] ?? '' }}">
          </div>
          <div class="col-md-3">
            <label class="form-label">Jurusan</label>
            <input type="text" name="educations[{{ $index }}][major]" class="form-control"
              value="{{ $education['major'] ?? '' }}">
          </div>
          <div class="col-md-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" name="educations[{{ $index }}][start_year]" class="form-control"
              value="{{ $education['start_year'] ?? '' }}">
          </div>
          <div class="col-md-3">
            <label class="form-label">Tahun Lulus</label>
            <input type="number" name="educations[{{ $index }}][end_year]" class="form-control"
              value="{{ $education['end_year'] ?? '' }}">
          </div>
          <div class="col-md-3">
            <label class="form-label">IPK (Nilai Akhir)</label>
            <input type="text" name="educations[{{ $index }}][gpa]" class="form-control"
              value="{{ $education['gpa'] ?? '' }}">
          </div>
          <div class="col-md-12">
            <label class="form-label">Aktivitas/Kegiatan</label>
            <textarea name="educations[{{ $index }}][activities]" rows="2" class="form-control">{{ $education['activities'] ?? '' }}</textarea>
          </div>
          <div class="col-12 text-end">
            <button type="button" class="btn btn-sm btn-outline-danger remove-education">Hapus</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn-outline-primary" id="add-education">+ Tambah Pendidikan</button>
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
      let index = {{ count($educations) }};
      document.getElementById('add-education').addEventListener('click', function() {
        const wrapper = document.getElementById('education-wrapper');
        const html = `
          <div class="border rounded p-3 mb-3 education-item">
            <div class="row g-2">
              <div class="col-md-6">
                <label class="form-label">Nama Institusi</label>
                <input type="text" name="educations[\${index}][institution_name]" class="form-control" required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Jenjang</label>
                <input type="text" name="educations[\${index}][level]" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="educations[\${index}][major]" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Tahun Masuk</label>
                <input type="number" name="educations[\${index}][start_year]" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Tahun Lulus</label>
                <input type="number" name="educations[\${index}][end_year]" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">IPK (Nilai Akhir)</label>
                <input type="text" name="educations[\${index}][gpa]" class="form-control">
              </div>
              <div class="col-md-12">
                <label class="form-label">Aktivitas/Kegiatan</label>
                <textarea name="educations[\${index}][activities]" rows="2" class="form-control"></textarea>
              </div>
              <div class="col-12 text-end">
                <button type="button" class="btn btn-sm btn-outline-danger remove-education">Hapus</button>
              </div>
            </div>
          </div>`;
        wrapper.insertAdjacentHTML('beforeend', html);
        index++;
      });

      document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-education')) {
          e.target.closest('.education-item').remove();
        }
      });
    });
  </script>
@endpush
