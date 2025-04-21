@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    @include('components.session-message')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-label-light">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Hi, {{ Auth::user()->name }}!</h5>
              <a href="{{ route('candidate.detail', $candidate) }}" class="btn btn-outline-primary text-nowrap">Detail
                Pendaftaran</a>
            </div>
          </div>
          <div class="card-body">
            <hr class="mt-0">
            <x-countdown-alert :end-date="$endDate" />

            @php
              $hasMotivation = $candidate->motivation !== null;
              $hasEducation = $candidate->educations->isNotEmpty();
              $hasAchievement = $candidate->achievements->isNotEmpty();
              $hasOrganization = $candidate->organizations->isNotEmpty();
              $allFilled = $hasMotivation && $hasEducation && $hasAchievement && $hasOrganization;
            @endphp

            <div id="registration-alert">
              <div id="registration-closed-info" class="d-none">
                <div class="fl-alert mb-0 alert-dismissible" role="alert">
                  <h5 class="alert-heading mb-2">Pendaftaran Telah Ditutup</h5>
                  <p class="mb-0">
                    Terima kasih atas partisipasimu! Pendaftaran telah resmi ditutup. <br>
                    Silakan menunggu pengumuman dan informasi selanjutnya yang akan disampaikan melalui WhatsApp dan email
                    resmi kami.
                  </p>
                </div>
              </div>

              @if (!$allFilled)
                <div class="fl-alert mb-0 alert-dismissible" role="alert">
                  <h5 class="alert-heading mb-2">Lengkapi Data Pendaftaranmu</h5>
                  <p class="mb-0">
                    Terima kasih telah memulai proses pendaftaran. Yuk, pastikan seluruh data kamu sudah lengkap,
                    termasuk: <strong>Motivasi, Pendidikan, Prestasi, dan Organisasi</strong>. Data lengkap akan menjadi
                    bahan penilaian penting bagi tim seleksi.
                  </p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @else
                <div class="alert alert-success mb-0 alert-dismissible" role="alert">
                  <h5 class="alert-heading mb-2">Pendaftaran Selesai dan Valid!</h5>
                  <p class="mb-0">
                    Selamat! Kamu telah berhasil melengkapi seluruh data yang dibutuhkan. Silakan menunggu pengumuman dan
                    informasi selanjutnya melalui WhatsApp dan email.
                  </p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4 g-6">
      {{-- Motivasi --}}
      @php
        $hasMotivation = $candidate->motivation !== null;
      @endphp
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card {{ $hasMotivation ? 'card-border-shadow-info' : 'card-border-shadow-warning' }} h-100">
          <div class="card-body">
            <h5>Motivasi & Rencana</h5>
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-2">
                <span class="avatar-initial rounded {{ $hasMotivation ? 'bg-label-info' : 'bg-label-warning' }}">
                  <i class="icon-base ti {{ $hasMotivation ? 'ti-circle-check' : 'ti-alert-triangle' }}"></i>
                </span>
              </div>
              <h6 class="m-0 text-{{ $hasMotivation ? 'info' : 'warning' }}">
                {{ $hasMotivation ? 'Sudah mengisi.' : 'Belum mengisi.' }}
              </h6>
            </div>
            <a href="{{ $hasMotivation ? route('candidate.motivation.edit', $candidate) : route('candidate.motivation.create', $candidate) }}"
              class="btn btn-outline-{{ $hasMotivation ? 'info' : 'warning' }} mt-2">
              {{ $hasMotivation ? 'Lihat Data' : 'Tambah Data' }}
            </a>
          </div>
        </div>
      </div>

      {{-- Pendidikan --}}
      @php
        $hasEducation = $candidate->educations->isNotEmpty();
      @endphp
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card {{ $hasEducation ? 'card-border-shadow-info' : 'card-border-shadow-warning' }} h-100">
          <div class="card-body">
            <h5>Data Pendidikan</h5>
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-2">
                <span class="avatar-initial rounded {{ $hasEducation ? 'bg-label-info' : 'bg-label-warning' }}">
                  <i class="icon-base ti {{ $hasEducation ? 'ti-circle-check' : 'ti-alert-triangle' }}"></i>
                </span>
              </div>
              <h6 class="m-0 text-{{ $hasEducation ? 'info' : 'warning' }}">
                {{ $hasEducation ? 'Sudah mengisi.' : 'Belum mengisi.' }}
              </h6>
            </div>
            <a href="{{ $hasEducation ? route('candidate.education.edit', $candidate) : route('candidate.education.create', $candidate) }}"
              class="btn btn-outline-{{ $hasEducation ? 'info' : 'warning' }} mt-2">
              {{ $hasEducation ? 'Lihat Data' : 'Tambah Data' }}
            </a>
          </div>
        </div>
      </div>

      {{-- Prestasi --}}
      @php
        $hasAchievement = $candidate->achievements->isNotEmpty();
      @endphp
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card {{ $hasAchievement ? 'card-border-shadow-info' : 'card-border-shadow-warning' }} h-100">
          <div class="card-body">
            <h5>Data Prestasi</h5>
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-2">
                <span class="avatar-initial rounded {{ $hasAchievement ? 'bg-label-info' : 'bg-label-warning' }}">
                  <i class="icon-base ti {{ $hasAchievement ? 'ti-circle-check' : 'ti-alert-triangle' }}"></i>
                </span>
              </div>
              <h6 class="m-0 text-{{ $hasAchievement ? 'info' : 'warning' }}">
                {{ $hasAchievement ? 'Sudah mengisi.' : 'Belum mengisi.' }}
              </h6>
            </div>
            <a href="{{ $hasAchievement ? route('candidate.achievement.edit', $candidate) : route('candidate.achievement.create', $candidate) }}"
              class="btn btn-outline-{{ $hasAchievement ? 'info' : 'warning' }} mt-2">
              {{ $hasAchievement ? 'Lihat Data' : 'Tambah Data' }}
            </a>
          </div>
        </div>
      </div>

      {{-- Organisasi --}}
      @php
        $hasOrganization = $candidate->organizations->isNotEmpty();
      @endphp
      <div class="col-md-3 col-sm-6 mb-2">
        <div class="card {{ $hasOrganization ? 'card-border-shadow-info' : 'card-border-shadow-warning' }} h-100">
          <div class="card-body">
            <h5>Pengalaman Organisasi</h5>
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-2">
                <span class="avatar-initial rounded {{ $hasOrganization ? 'bg-label-info' : 'bg-label-warning' }}">
                  <i class="icon-base ti {{ $hasOrganization ? 'ti-circle-check' : 'ti-alert-triangle' }}"></i>
                </span>
              </div>
              <h6 class="m-0 text-{{ $hasOrganization ? 'info' : 'warning' }}">
                {{ $hasOrganization ? 'Sudah mengisi.' : 'Belum mengisi.' }}
              </h6>
            </div>
            <a href="{{ $hasOrganization ? route('candidate.organization.edit', $candidate) : route('candidate.organization.create', $candidate) }}"
              class="btn btn-outline-{{ $hasOrganization ? 'info' : 'warning' }} mt-2">
              {{ $hasOrganization ? 'Lihat Data' : 'Tambah Data' }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const isClosed = window.isRegistrationClosed || false;

      if (isClosed) {
        const closedInfo = document.getElementById('registration-closed-info');
        const allAlerts = document.querySelectorAll('#registration-alert .alert, #registration-alert .fl-alert');

        allAlerts.forEach(alert => {
          if (!closedInfo.contains(alert)) {
            alert.classList.add('d-none');
          }
        });

        closedInfo?.classList.remove('d-none');

        document.querySelectorAll('.btn-outline-warning, .btn-outline-info')
          .forEach(btn => {
            btn.classList.add('disabled');
            btn.innerText = 'Pengisian Ditutup';
            btn.removeAttribute('href');
          });
      }
    });
  </script>
@endpush
