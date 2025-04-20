@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="card">
      <h5 class="card-header mb-4">Pendaftaran Peserta YFLI 2025</h5>
      <div class="card-body">
        @include('candidate._form', [
            'action' => route('candidate.store'),
            'method' => 'POST',
            'submitLabel' => 'Submit Pendaftaran',
        ])
      </div>
    </div>
  </div>
@endsection
