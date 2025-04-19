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

    {{-- <div class="row mt-4 g-6">
      <!-- Card Border Shadow -->
      <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-primary h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-primary"><i
                    class="icon-base ti tabler-truck icon-28px"></i></span>
              </div>
              <h4 class="mb-0">42</h4>
            </div>
            <p class="mb-1">On route vehicles</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">+18.2%</span>
              <small class="text-body-secondary">than last week</small>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-warning h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-warning"><i
                    class="icon-base ti tabler-alert-triangle icon-28px"></i></span>
              </div>
              <h4 class="mb-0">8</h4>
            </div>
            <p class="mb-1">Vehicles with errors</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">-8.7%</span>
              <small class="text-body-secondary">than last week</small>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-danger h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-danger"><i
                    class="icon-base ti tabler-git-fork icon-28px"></i></span>
              </div>
              <h4 class="mb-0">27</h4>
            </div>
            <p class="mb-1">Deviated from route</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">+4.3%</span>
              <small class="text-body-secondary">than last week</small>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card card-border-shadow-info h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-info"><i
                    class="icon-base ti tabler-clock icon-28px"></i></span>
              </div>
              <h4 class="mb-0">13</h4>
            </div>
            <p class="mb-1">Late vehicles</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">-2.5%</span>
              <small class="text-body-secondary">than last week</small>
            </p>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
@endsection
