@php $method = $method ?? 'POST'; @endphp
<form class="row g-3" method="POST" action="{{ $action }}">
  @csrf
  @if ($method === 'PUT')
    @method('PUT')
  @endif

  {{-- Tampilkan validasi error jika ada --}}
  @env('local')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @endenv

  @php
    $organizations = old('organizations', isset($candidate) ? $candidate->organizations->toArray() : [[]]);
  @endphp

  <div id="organization-wrapper" data-index="{{ is_array($organizations) ? count($organizations) : 0 }}">
    @foreach ($organizations as $index => $organization)
      <div class="border rounded p-3 mb-3 organization-item">
        <div class="row g-2">
          <div class="col-md-6">
            <label class="form-label">Nama Organisasi</label>
            <input type="text" name="organizations[{{ $index }}][organization_name]" class="form-control"
              value="{{ $organization['organization_name'] ?? '' }}" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Posisi</label>
            <input type="text" name="organizations[{{ $index }}][position]" class="form-control"
              value="{{ $organization['position'] ?? '' }}">
          </div>
          <div class="col-md-3">
            <label class="form-label">Tahun</label>
            <input type="text" name="organizations[{{ $index }}][year]" class="form-control"
              value="{{ $organization['year'] ?? '' }}">
          </div>
          <div class="col-md-12">
            <label class="form-label">Deskripsi</label>
            <textarea name="organizations[{{ $index }}][description]" rows="2" class="form-control">{{ $organization['description'] ?? '' }}</textarea>
          </div>
          <div class="col-12 text-end">
            <button type="button" class="btn btn-sm btn-outline-danger remove-organization">Hapus</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn-outline-primary" id="add-organization">+ Tambah Organisasi</button>
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
      const wrapper = document.getElementById('organization-wrapper');
      const addBtn = document.getElementById('add-organization');

      addBtn?.addEventListener('click', function() {
        let index = parseInt(wrapper.dataset.index || 0);

        const html = `
        <div class="border rounded p-3 mb-3 organization-item">
          <div class="row g-2">
            <div class="col-md-6">
              <label class="form-label">Nama Organisasi</label>
              <input type="text" name="organizations[${index}][organization_name]" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label">Posisi</label>
              <input type="text" name="organizations[${index}][position]" class="form-control">
            </div>
            <div class="col-md-3">
              <label class="form-label">Tahun</label>
              <input type="text" name="organizations[${index}][year]" class="form-control">
            </div>
            <div class="col-md-12">
              <label class="form-label">Deskripsi</label>
              <textarea name="organizations[${index}][description]" rows="2" class="form-control"></textarea>
            </div>
            <div class="col-12 text-end">
              <button type="button" class="btn btn-sm btn-outline-danger remove-organization">Hapus</button>
            </div>
          </div>
        </div>`;

        wrapper.insertAdjacentHTML('beforeend', html);
        wrapper.dataset.index = index + 1;
      });

      document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-organization')) {
          e.preventDefault();
          e.target.closest('.organization-item')?.remove();
        }
      });
    });
  </script>
@endpush
