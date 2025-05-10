@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="card" id="form-card">
      <h5 class="card-header">Pendaftaran Peserta YFLI 2025</h5>
      <hr class="m-0">
      <div class="card-body">
        @include('candidate.forms._form', [
            'action' => route('form.confirmation.submit', $candidate),
            'method' => 'POST',
            'submitLabel' => 'Konfirmasi Pendaftaran',
            'candidate' => $candidate,
        ])
      </div>
    </div>
  </div>
@endsection
