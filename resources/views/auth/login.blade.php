@extends('layouts.auth')

@section('content')
  <div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <img src="{{ asset('assets/fli/fli-logo.svg') }}" alt="auth-login-cover" class="img-fluid my-5 auth-illustration"
            width="50%" />

          <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-login-cover"
            class="platform-bg" />
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Login -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
          <!-- Logo -->
          <img src="{{ asset('assets/fli/fli-logo.svg') }}" alt="Gencar" height="36" class="mb-4">
          <!-- /Logo -->
          <h3 class="mb-1">Welcome, Future Leaders! 👋</h3>
          <p class="mb-4">Gunakan akun Google kamu untuk login ke dashboard.</p>

          {{-- @if ($errors->any())
            <div class="alert alert-danger">
              {{ $errors->first() }}
            </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email kamu"
                autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('password.request') }}">
                  <small>Lupa Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary d-grid w-100">Login</button>
          </form>

          <p class="text-center">
            <span>Belum punya akun?</span>
            <a href="{{ route('register') }}">
              <span>Buat di sini</span>
            </a>
          </p> --}}

          {{-- <div class="divider my-4">
            <div class="divider-text">atau gunakan</div>
          </div> --}}

          {{-- <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
              <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
            </a>
          </div> --}}

          <a href="{{ route('auth.google.redirect') }}" class="btn btn-label-google-plus w-100">
            <i class="tf-icons fa-brands fa-google fs-5 me-2"></i>
            Google
          </a>

          {{-- <a href="javascript:;" class="btn btn-icon btn-label-twitter w-100 mt-3">
            <i class="tf-icons fa-brands fa-twitter fs-5 me-2"></i>
            Inisiator
          </a> --}}
        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>
@endsection
