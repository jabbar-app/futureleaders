@extends('layouts.auth')

@section('content')
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-6">
        <!-- Reset Password -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-2">
              <a href="{{ route('home') }}" class="app-brand-link">
                <img src="{{ asset('assets/fli/fli-logo.svg') }}" height="50">
              </a>
            </div>
            <!-- /Logo -->

            <h4 class="mb-1">Atur Ulang Password 🔒</h4>
            <p class="mb-2">Masukkan password baru kamu dan konfirmasi ulang ya.</p>

            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
              @csrf

              <!-- Reset Token -->
              <input type="hidden" name="token" value="{{ $request->route('token') }}">

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email"
                  class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}"
                  required autofocus />
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input id="password" type="password" name="password"
                  class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" />
              </div>

              <!-- Password Confirmation -->
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                  class="form-control @error('password_confirmation') is-invalid @enderror" required
                  autocomplete="new-password" />
              </div>

              <button type="submit" class="btn btn-primary d-grid w-100">
                Reset Password
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
        <!-- /Reset Password -->
      </div>
    </div>
  </div>
@endsection
