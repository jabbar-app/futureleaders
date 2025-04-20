@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="card">
      <h5 class="card-header">Pendaftaran Peserta YFLI 2025</h5>
      <hr class="m-0">
      <div class="card-body">
        @yield('form')
      </div>
    </div>
  </div>
@endsection
