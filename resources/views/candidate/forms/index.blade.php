@extends('layouts.main')

@section('content')
  <div class="container mt-4">
    @include('components.session-message')
    <div class="card">
      <div class="card-body">
        <h4 class="mb-4 text-danger">Data Konfirmasi Pendaftaran</h4>

        <form action="{{ route('confirmation.broadcast') }}" method="POST" class="mb-4">
          @csrf
          <div class="mb-3">
            <label for="subject" class="form-label">Subjek Email</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Isi Email</label>
            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Broadcast Email</button>
        </form>


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
                    <span class="badge bg-{{ $data->is_ready_commitment_fee ? 'success' : 'secondary' }}">
                      {{ $data->is_ready_commitment_fee ? 'Bersedia' : 'Tidak' }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('confirmation.show', $data->candidate->id) }}" class="btn btn-sm btn-danger">Lihat
                      Detail</a>
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
