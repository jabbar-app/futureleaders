@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-label-light d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-primary">Detail Pendaftaran</h4>
            <a href="{{ route('candidate.edit', $candidate) }}" class="btn btn-outline-primary  ">Edit
              Data</a>
          </div>

          <div class="card-body">
            <hr class="mt-0">
            <div class="row mb-4">
              <div class="col-md-4 text-center">
                @if ($candidate->avatar)
                  <img src="{{ asset($candidate->avatar) }}" class="img-fluid rounded border" style="max-height: 200px;">
                @else
                  <img src="{{ asset('assets/images/blank.webp') }}" class="img-fluid rounded border"
                    style="max-height: 200px;" alt="Foto">
                @endif
              </div>
              <div class="col-md-8">
                <dl class="row">
                  <dt class="col-sm-5">Nama Peserta:</dt>
                  <dd class="col-sm-7">{{ $candidate->user->name }}</dd>

                  <dt class="col-sm-5">Email:</dt>
                  <dd class="col-sm-7">{{ $candidate->user->email }}</dd>

                  <dt class="col-sm-5">Telepon:</dt>
                  <dd class="col-sm-7">{{ $candidate->phone }}</dd>

                  <dt class="col-sm-5">Alamat:</dt>
                  <dd class="col-sm-7">{{ $candidate->address }}</dd>

                  <dt class="col-sm-5">Tempat, Tanggal Lahir:</dt>
                  <dd class="col-sm-7">{{ $candidate->birth_place }},
                    {{ \Carbon\Carbon::parse($candidate->birth_date)->translatedFormat('d F Y') }}</dd>

                  <dt class="col-sm-5">Jenis Kelamin:</dt>
                  <dd class="col-sm-7">{{ ucfirst($candidate->gender) }}</dd>

                  <dt class="col-sm-5">Agama:</dt>
                  <dd class="col-sm-7">{{ $candidate->religion }}</dd>
                </dl>
              </div>
            </div>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Informasi Tambahan</h5>
            <dl class="row">
              <dt class="col-sm-4">Hobi/Minat:</dt>
              <dd class="col-sm-8">{{ $candidate->hobbies }}</dd>

              <dt class="col-sm-4">Kontak Darurat:</dt>
              <dd class="col-sm-8">{{ $candidate->emergency_contact }}</dd>

              <dt class="col-sm-4">Pekerjaan Saat Ini:</dt>
              <dd class="col-sm-8">{{ $candidate->current_activity }}</dd>

              <dt class="col-sm-4">Pendidikan Terakhir:</dt>
              <dd class="col-sm-8">{{ $candidate->last_education }} - {{ $candidate->major }}</dd>

              <dt class="col-sm-4">Sosial Media:</dt>
              <dd class="col-sm-8">{{ $candidate->social_media }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Pengalaman & Motivasi</h5>
            <dl class="row">
              <dt class="col-sm-4">Pengalaman Organisasi #1:</dt>
              <dd class="col-sm-8">{{ $candidate->organization_experience_1 }}</dd>

              <dt class="col-sm-4">Pengalaman Organisasi #2:</dt>
              <dd class="col-sm-8">{{ $candidate->organization_experience_2 }}</dd>

              <dt class="col-sm-4">Prestasi:</dt>
              <dd class="col-sm-8">{{ $candidate->achievement_experience }}</dd>

              <dt class="col-sm-4">Tentang Future Leaders ID:</dt>
              <dd class="col-sm-8">{{ $candidate->about_generasi_cakrawala }}</dd>

              <dt class="col-sm-4">Motivasi Ikut:</dt>
              <dd class="col-sm-8">{{ $candidate->motivation }}</dd>

              <dt class="col-sm-4">Rencana Kontribusi:</dt>
              <dd class="col-sm-8">{{ $candidate->contribution_plan }}</dd>

              <dt class="col-sm-4">Lokasi Kontribusi:</dt>
              <dd class="col-sm-8">{{ $candidate->contribution_location }}</dd>

              <dt class="col-sm-4">Bidang Kontribusi:</dt>
              <dd class="col-sm-8">{{ $candidate->contribution_field }}</dd>

              <dt class="col-sm-4">Keahlian/Keterampilan:</dt>
              <dd class="col-sm-8">{{ $candidate->skill }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Kesehatan</h5>
            <dl class="row">
              <dt class="col-sm-4">Riwayat Penyakit:</dt>
              <dd class="col-sm-8">{{ $candidate->medical_history }}</dd>

              <dt class="col-sm-4">Alergi Makanan:</dt>
              <dd class="col-sm-8">{{ $candidate->food_allergy }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Lain-lain</h5>
            <dl class="row">
              <dt class="col-sm-4">Mengetahui Gencar Dari:</dt>
              <dd class="col-sm-8">{{ $candidate->source }}</dd>

              @if ($candidate->commitment_letter)
                <dt class="col-sm-4">Surat Komitmen:</dt>
                <dd class="col-sm-8">
                  <a href="{{ asset($candidate->commitment_letter) }}" target="_blank">Lihat File</a>
                </dd>
              @endif
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
