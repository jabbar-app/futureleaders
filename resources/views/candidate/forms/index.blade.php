// resources/views/candidate/forms/index.blade.php

@extends('layouts.main')

@section('content')
  <div class="container mt-4">
    @include('components.session-message')
    <div class="card">
      <div class="card-body">
        <h4 class="mb-4 text-danger">Data Konfirmasi Pendaftaran</h4>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($candidates as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->candidate->user->name }}</td>
                  <td>{{ $data->candidate->user->email }}</td>
                  <td>{{ $data->candidate->phone }}</td>
                  <td>
                    <span class="badge bg-{{ $data->candidate->user->is_confirmed ? 'success' : 'secondary' }}">
                      {{ $data->candidate->user->is_confirmed ? 'Sudah Konfirmasi' : 'Belum' }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('confirmation.show', $data->candidate->id) }}" class="btn btn-sm btn-danger">Lihat Detail</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center">Belum ada data konfirmasi.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
