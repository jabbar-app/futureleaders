@extends('layouts.main')

@section('content')
  <div class="container mt-4">
    @include('components.session-message')

    <div class="card">
      <div class="card-body">
        <h4 class="mb-4 text-danger">Detail Konfirmasi Pendaftaran</h4>

        <dl class="row">
          <dt class="col-sm-4">Nama</dt>
          <dd class="col-sm-8">{{ $candidate->user->name }}</dd>

          <dt class="col-sm-4">Email</dt>
          <dd class="col-sm-8">{{ $candidate->user->email }}</dd>

          <dt class="col-sm-4">No. HP</dt>
          <dd class="col-sm-8">{{ $candidate->phone }}</dd>

          <dt class="col-sm-4">Siap Komitmen Biaya?</dt>
          <dd class="col-sm-8">{{ $candidate->next->is_ready_commitment_fee ? 'Ya' : 'Tidak' }}</dd>

          <dt class="col-sm-4">Persetujuan Orang Tua</dt>
          <dd class="col-sm-8">{{ $candidate->next->parent_approval ? 'Ya' : 'Tidak' }}</dd>

          <dt class="col-sm-4">Punya Passport?</dt>
          <dd class="col-sm-8">{{ $candidate->next->have_passport ? 'Ya' : 'Tidak' }}</dd>

          @if ($candidate->next->willing_create_passport !== null)
            <dt class="col-sm-4">Bersedia Membuat Passport?</dt>
            <dd class="col-sm-8">{{ $candidate->next->willing_create_passport ? 'Ya' : 'Tidak' }}</dd>
          @endif

          <dt class="col-sm-4">Kebutuhan Khusus</dt>
          <dd class="col-sm-8">
            {{ $candidate->next->has_special_needs ? 'Ya' : 'Tidak' }}
            @if ($candidate->next->has_special_needs && $candidate->next->special_needs_description)
              <br><em>({{ $candidate->next->special_needs_description }})</em>
            @endif
          </dd>

          <dt class="col-sm-4">Pernah ke Luar Negeri?</dt>
          <dd class="col-sm-8">
            {{ $candidate->next->has_traveled_abroad ? 'Ya' : 'Tidak' }}
            @if ($candidate->next->has_traveled_abroad && $candidate->next->abroad_destinations)
              <br><em>({{ $candidate->next->abroad_destinations }})</em>
            @endif
          </dd>

          <dt class="col-sm-4">Harapan dari Program</dt>
          <dd class="col-sm-8">{{ $candidate->next->expectation_from_program ?? '-' }}</dd>

          <dt class="col-sm-4">Posisi Tim yang Diminati</dt>
          <dd class="col-sm-8">{{ $candidate->next->preferred_team_position ?? '-' }}</dd>

          <dt class="col-sm-4">Alasan Memilih Posisi</dt>
          <dd class="col-sm-8">{{ $candidate->next->preferred_team_position_reason ?? '-' }}</dd>

          <dt class="col-sm-4">Catatan Lainnya</dt>
          <dd class="col-sm-8">{{ $candidate->next->other_notes ?? '-' }}</dd>
        </dl>

        <a href="{{ route('confirmation.index') }}" class="btn btn-outline-danger">← Kembali</a>
      </div>
    </div>
  </div>
@endsection
