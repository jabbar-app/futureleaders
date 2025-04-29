@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-label-light">
            <h5 class="card-title mb-0">Hi, {{ $candidate->user->name }}!</h5>
          </div>
          <div class="card-body">
            <hr class="mt-0">

            @if ($candidate && $candidate->status === 'Stage 2')
              <div class="alert @if (!empty($candidate->confirmation_link)) alert-light @else alert-success @endif" role="alert">
                <h5 class="alert-heading mb-2">Selamat, Kamu Lulus Seleksi Administrasi!</h5>

                @if (!empty($candidate->confirmation_link))
                  <p>
                    Kamu telah berhasil melakukan <strong>konfirmasi jadwal onboarding</strong> untuk tahapan
                    <strong>Seleksi Online</strong>.
                  </p>
                  <p>
                    Klik tombol berikut untuk melihat jadwal yang sudah kamu pilih:
                  </p>
                  <p>
                    <a href="{{ $candidate->confirmation_link }}" target="_blank" class="btn btn-outline-success">
                      📅 Lihat Jadwal Konfirmasi
                    </a>
                  </p>
                @else
                  <p>
                    Future Leaders ID dengan bangga mengumumkan bahwa kamu telah <strong>lulus Seleksi
                      Administrasi</strong>.
                  </p>
                  <p>
                    Untuk melanjutkan ke tahap <strong>Seleksi Online</strong>, kamu diwajibkan mengikuti <strong>Sesi
                      Onboarding Seleksi Online</strong> yang akan diadakan pada <strong>Selasa, 29 April 2025</strong>.
                  </p>
                  <p>
                    Pilih salah satu jadwal berikut untuk mengikuti Sesi Onboarding:
                  </p>
                  <ul>
                    <li>15.00 WIB - Selesai</li>
                    <li>17.00 WIB - Selesai</li>
                    <li>19.00 WIB - Selesai</li>
                    <li>21.00 WIB - Selesai</li>
                  </ul>
                  <p class="mb-2">
                    Silakan lakukan <strong>Konfirmasi Jadwal</strong> melalui link berikut:
                  </p>
                  <p>
                    <a href="https://calndr.inisiator.com/book/onboarding-seleksi-online-future-leaders-id"
                      target="_blank" class="btn btn-success">
                      Konfirmasi Jadwal Onboarding
                    </a>
                  </p>
                  <p class="mt-3 mb-0">
                    Batas waktu konfirmasi: <strong>Selasa, 29 April 2025 pukul 09.00 WIB</strong>.
                  </p>
                @endif
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
