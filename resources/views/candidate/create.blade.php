@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <x-countdown-alert />
    <div class="card" id="form-card">
      <h5 class="card-header">Pendaftaran Peserta YFLI 2025</h5>
      <hr class="m-0">
      <div class="card-body">
        @include('candidate._form', [
            'action' => route('candidate.store'),
            'method' => 'POST',
            'submitLabel' => 'Submit Pendaftaran',
            'candidate' => $candidate ?? null,
        ])
      </div>
    </div>
  </div>
@endsection
