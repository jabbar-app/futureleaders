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
            @if ($incomplete)
              <div class="alert alert-warning mb-0 alert-dismissible" role="alert">
                <h5 class="alert-heading mb-2">Pendaftaran Hampir Berhasil!</h5>
                <p class="mb-0">
                  Silakan lengkapi data pendaftaran kamu yang masih kurang melalui <a
                    href="{{ route('candidate.edit', $candidate) }}" class="fw-bold text-primary">tautan ini</a> ya.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @else
              <div class="alert alert-success mb-0 alert-dismissible" role="alert">
                <h5 class="alert-heading mb-2">Pendaftaran Berhasil!</h5>
                <p class="mb-0">
                  Silakan menunggu Pengumuman & Informasi selanjutnya.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4 g-6">
      {{-- Motivasi --}}
      @php
        $hasMotivation = $candidate->motivation !== null;
      @endphp
      <div class="col-md-3 col-sm-6">
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
      <div class="col-md-3 col-sm-6">
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
      <div class="col-md-3 col-sm-6">
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
      <div class="col-md-3 col-sm-6">
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
