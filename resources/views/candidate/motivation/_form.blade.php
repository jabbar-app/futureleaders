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

  <div class="mb-4">
    <h4 class="mb-0">Motivasi Mendaftar</h4>
    <label class="form-label">Apa motivasi kamu mengikuti program ini?</label>
    <input id="motivation" type="hidden" name="motivation"
      value="{{ old('motivation', $candidate->motivation->motivation ?? '') }}">
    <trix-editor input="motivation" placeholder="Tulis motivasimu di sini..."></trix-editor>
  </div>

  <div class="mb-4">
    <h4 class="mb-0">Rencana Program</h4>
    <label class="form-label">Ide atau rencana proyek sosial apa yang ingin kamu jalankan?</label>
    <input id="project_plan" type="hidden" name="project_plan"
      value="{{ old('project_plan', $candidate->motivation->project_plan ?? '') }}">
    <trix-editor input="project_plan" placeholder="Tulis ide atau rencana proyek sosialmu di sini..."></trix-editor>
  </div>

  <div class="mb-4">
    <hr>
    <button type="submit" class="btn btn-primary">
      {{ $submitLabel }}
    </button>
  </div>
</form>

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none !important;
    }

    trix-editor {
      min-height: 250px;
      background-color: #fff;
      padding: 1rem;
      font-size: 1rem;
    }

    trix-editor:empty:before {
      content: attr(placeholder);
      color: #888;
      font-style: italic;
    }
  </style>
@endpush


@push('scripts')
  <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
@endpush
