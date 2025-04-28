@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-label-light">
            <h5 class="card-title mb-0">Hi, {{ Auth::user()->name }}!</h5>
          </div>
          <div class="card-body">
            <hr class="mt-0">

            <div class="alert alert-success" role="alert">
              <h5 class="alert-heading mb-2">Selamat, Kamu Lulus Seleksi Administrasi!</h5>
              <p>
                Future Leaders ID dengan bangga mengumumkan bahwa kamu telah <strong>lulus Seleksi Administrasi</strong>.
                Kami mengundangmu untuk melakukan <strong>Konfirmasi Kelulusan</strong> untuk melanjutkan ke tahap
                <strong>Seleksi Online</strong>.
              </p>
              <p class="mb-2">
                Silakan lakukan konfirmasi sebelum <strong>Selasa, 29 April 2025 pukul 09.00 WIB</strong>.
              </p>

              @php
                // Set waktu buka link konfirmasi ke hari ini jam 20.00 WIB
                $confirmationLinkOpenTime = now()->setTimezone('Asia/Jakarta')->setTime(20, 0);
                $currentTime = now()->setTimezone('Asia/Jakarta');
              @endphp

              @if ($currentTime->greaterThanOrEqualTo($confirmationLinkOpenTime))
                <a href="#" class="btn btn-success mt-3">
                  Konfirmasi Kelulusan
                </a>
              @else
                <button class="btn btn-secondary mt-3" disabled>
                  Link Konfirmasi Akan Dibuka Pukul 20.00 WIB
                </button>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
