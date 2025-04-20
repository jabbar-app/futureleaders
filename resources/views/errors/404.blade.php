@extends('layouts.main')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
  <div class="container-xxl py-5">
    <div class="text-center my-5">
      <img src="{{ asset('assets/img/404.svg') }}" alt="404 Not Found" class="img-fluid mb-4"
        style="max-height: 160px;">
      <p class="fs-5 text-muted">Oops! Halaman yang kamu cari tidak ditemukan.</p>
      <p class="text-muted">Mungkin sudah dipindahkan atau kamu salah mengetik alamatnya.</p>
      <a href="{{ url('/dashboard') }}" class="btn btn-primary mt-3">
        <i class="ti ti-smart-home me-1"></i> Kembali ke Dashboard
      </a>
    </div>
  </div>
@endsection
