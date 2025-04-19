@extends('layouts.auth')

@section('content')
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-6">
        <!-- Confirm Password -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-2">
              <a href="{{ route('home') }}" class="app-brand-link">
                <img src="{{ asset('assets/fli/fli-logo.svg') }}" height="50">
              </a>
            </div>
            <!-- /Logo -->

            <h4 class="mb-1">Konfirmasi Password 🔐</h4>
            <p class="mb-2">Ini adalah area yang aman. Masukkan password kamu untuk melanjutkan.</p>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}">
              @csrf

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password"
                  class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" />
              </div>

              <button type="submit" class="btn btn-primary d-grid w-100">
                Konfirmasi
              </button>
            </form>

            <div class="text-center mt-3">
              <a href="{{ route('login') }}" class="d-flex justify-content-center">
                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                Kembali ke Login
              </a>
            </div>
          </div>
        </div>
        <!-- /Confirm Password -->
      </div>
    </div>
  </div>
@endsection
