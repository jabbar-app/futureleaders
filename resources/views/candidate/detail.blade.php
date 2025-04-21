@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-label-light d-flex justify-content-between align-items-center">
            <h4 class="mb-0 text-primary">Detail Pendaftaran</h4>
            <a href="{{ route('candidate.edit', $candidate) }}" class="btn btn-outline-primary">Edit Data</a>
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

                  <dt class="col-sm-5">No. HP:</dt>
                  <dd class="col-sm-7">{{ $candidate->phone }}</dd>

                  <dt class="col-sm-5">No. Induk Kependudukan (NIK):</dt>
                  <dd class="col-sm-7">{{ $candidate->identity_number }}</dd>

                  <dt class="col-sm-5">Wilayah Asal:</dt>
                  <dd class="col-sm-7">{{ $candidate->region }}</dd>

                  <dt class="col-sm-5">Tempat, Tanggal Lahir:</dt>
                  <dd class="col-sm-7">{{ $candidate->birth_place }},
                    {{ \Carbon\Carbon::parse($candidate->birth_date)->translatedFormat('d F Y') }}</dd>

                  <dt class="col-sm-5">Jenis Kelamin:</dt>
                  <dd class="col-sm-7">{{ $candidate->gender }}</dd>

                  <dt class="col-sm-5">Agama:</dt>
                  <dd class="col-sm-7">{{ $candidate->religion }}</dd>

                  <dt class="col-sm-5">Alamat Lengkap:</dt>
                  <dd class="col-sm-7">{{ $candidate->address }}</dd>

                  <dt class="col-sm-5">Instagram:</dt>
                  <dd class="col-sm-7">{{ $candidate->instagram }}</dd>
                </dl>
              </div>
            </div>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Kesehatan & Ukuran</h5>
            <dl class="row">
              <dt class="col-sm-4">Riwayat Penyakit:</dt>
              <dd class="col-sm-8">{{ $candidate->illness }}</dd>

              <dt class="col-sm-4">Alergi Makanan/Obat:</dt>
              <dd class="col-sm-8">{{ $candidate->allergies }}</dd>

              <dt class="col-sm-4">Ukuran Kaos:</dt>
              <dd class="col-sm-8">{{ $candidate->tshirt_size }}</dd>

              <dt class="col-sm-4">Ukuran Jaket:</dt>
              <dd class="col-sm-8">{{ $candidate->jacket_size }}</dd>
            </dl>

            <h5 class="mb-3 text-primary">Keahlian</h5>
            <dl class="row">
              <dt class="col-sm-4">Keahlian/Keterampilan:</dt>
              <dd class="col-sm-8">{{ $candidate->skills }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Data Orang Tua</h5>
            <dl class="row">
              <dt class="col-sm-4">Nama Ayah:</dt>
              <dd class="col-sm-8">{{ $candidate->father_name }}</dd>

              <dt class="col-sm-4">Status Ayah:</dt>
              <dd class="col-sm-8">{{ $candidate->father_status }}</dd>

              <dt class="col-sm-4">Pekerjaan Ayah:</dt>
              <dd class="col-sm-8">{{ $candidate->father_occupation }}</dd>

              <dt class="col-sm-4">Penghasilan Ayah:</dt>
              <dd class="col-sm-8">{{ $candidate->father_income }}</dd>

              <dt class="col-sm-4">Nama Ibu:</dt>
              <dd class="col-sm-8">{{ $candidate->mother_name }}</dd>

              <dt class="col-sm-4">Status Ibu:</dt>
              <dd class="col-sm-8">{{ $candidate->mother_status }}</dd>

              <dt class="col-sm-4">Pekerjaan Ibu:</dt>
              <dd class="col-sm-8">{{ $candidate->mother_occupation }}</dd>

              <dt class="col-sm-4">Penghasilan Ibu:</dt>
              <dd class="col-sm-8">{{ $candidate->mother_income }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Wali (Jika Ada)</h5>
            <dl class="row">
              <dt class="col-sm-4">Nama Wali:</dt>
              <dd class="col-sm-8">{{ $candidate->guardian_name }}</dd>

              <dt class="col-sm-4">No. HP Wali:</dt>
              <dd class="col-sm-8">{{ $candidate->guardian_phone }}</dd>

              <dt class="col-sm-4">Hubungan dengan Wali:</dt>
              <dd class="col-sm-8">{{ $candidate->guardian_relationship }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Keluarga</h5>
            <dl class="row">
              <dt class="col-sm-4">Jumlah Saudara Kandung:</dt>
              <dd class="col-sm-8">{{ $candidate->siblings_count }}</dd>
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Berkas Pendukung</h5>
            <dl class="row">
              @if ($candidate->file_ktp)
                <dt class="col-sm-4">File KTP:</dt>
                <dd class="col-sm-8">
                  <a href="{{ asset($candidate->file_ktp) }}" target="_blank">Lihat KTP</a>
                </dd>
              @endif

              @if ($candidate->proof)
                <dt class="col-sm-4">Bukti Tambahan:</dt>
                <dd class="col-sm-8">
                  @foreach (json_decode($candidate->proof) as $file)
                    <div>
                      <a href="{{ asset($file) }}" target="_blank">Lihat File</a>
                    </div>
                  @endforeach
                </dd>
              @endif
            </dl>

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Motivasi & Rencana Proyek</h5>
            @if ($candidate->motivation)
              <dl class="row">
                <dt class="col-sm-4">Motivasi:</dt>
                <dd class="col-sm-8">{!! $candidate->motivation->motivation !!}</dd>

                <dt class="col-sm-4">Rencana Proyek:</dt>
                <dd class="col-sm-8">{!! $candidate->motivation->project_plan !!}</dd>
              </dl>
            @else
              <p class="text-muted">Belum ada data motivasi.</p>
            @endif

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Riwayat Pendidikan</h5>
            @forelse ($candidate->educations as $edu)
              <dl class="row">
                <dt class="col-sm-4">Institusi:</dt>
                <dd class="col-sm-8">{{ $edu->institution_name }}</dd>

                <dt class="col-sm-4">Jenjang & Jurusan:</dt>
                <dd class="col-sm-8">{{ $edu->level }} - {{ $edu->major }}</dd>

                <dt class="col-sm-4">Tahun Masuk - Lulus:</dt>
                <dd class="col-sm-8">{{ $edu->start_year }} - {{ $edu->end_year }}</dd>

                <dt class="col-sm-4">IPK/Nilai:</dt>
                <dd class="col-sm-8">{{ $edu->gpa }}</dd>

                <dt class="col-sm-4">Aktivitas/Kegiatan:</dt>
                <dd class="col-sm-8">{{ $edu->activities }}</dd>
              </dl>
              @if (!$loop->last)
                <hr>
              @endif
            @empty
              <p class="text-muted">Belum ada riwayat pendidikan.</p>
            @endforelse

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Pengalaman Organisasi</h5>
            @forelse ($candidate->organizations as $org)
              <dl class="row">
                <dt class="col-sm-4">Nama Organisasi:</dt>
                <dd class="col-sm-8">{{ $org->organization_name }}</dd>

                <dt class="col-sm-4">Posisi:</dt>
                <dd class="col-sm-8">{{ $org->position }}</dd>

                <dt class="col-sm-4">Tahun:</dt>
                <dd class="col-sm-8">{{ $org->year }}</dd>

                <dt class="col-sm-4">Deskripsi:</dt>
                <dd class="col-sm-8">{{ $org->description }}</dd>
              </dl>
              @if (!$loop->last)
                <hr>
              @endif
            @empty
              <p class="text-muted">Belum ada pengalaman organisasi.</p>
            @endforelse

            <hr class="my-4">

            <h5 class="mb-3 text-primary">Prestasi & Penghargaan</h5>
            @forelse ($candidate->achievements as $ach)
              <dl class="row">
                <dt class="col-sm-4">Judul Prestasi:</dt>
                <dd class="col-sm-8">{{ $ach->title }}</dd>

                <dt class="col-sm-4">Tahun:</dt>
                <dd class="col-sm-8">{{ $ach->year }}</dd>

                <dt class="col-sm-4">Diberikan Oleh:</dt>
                <dd class="col-sm-8">{{ $ach->issuer }}</dd>

                <dt class="col-sm-4">Deskripsi:</dt>
                <dd class="col-sm-8">{{ $ach->description }}</dd>
              </dl>
              @if (!$loop->last)
                <hr>
              @endif
            @empty
              <p class="text-muted">Belum ada data prestasi.</p>
            @endforelse

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
