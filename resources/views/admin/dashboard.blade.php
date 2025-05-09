@extends('layouts.main')

@section('content')
  <div class="container mt-4">
    @include('components.session-message')
    <div class="row">
      <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <div class="row mb-4">
          <div class="col-md-6 mb-2">
            <div class="card h-auto">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                  <h3 class="mb-1 me-2">{{ number_format($candidates->count()) }}</h3>
                  <p class="mb-0">Total Pendaftar</p>
                </div>
                <div class="card-icon">
                  <span class="badge bg-label-danger rounded p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-candidate-square-rounded">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                      <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                      <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 mb-2">
            <div class="card h-auto">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                  <h3 class="mb-1 me-2">{{ number_format($candidates->where('region', 'Langkat')->count()) }}</h3>
                  <p class="mb-0">Langkat</p>
                </div>
                <div class="card-icon">
                  <span class="badge bg-label-danger rounded p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-candidate-square-rounded">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                      <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                      <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 mb-2">
            <div class="card h-auto">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                  <h3 class="mb-1 me-2">{{ number_format($candidates->where('region', 'Binjai')->count()) }}</h3>
                  <p class="mb-0">Binjai</p>
                </div>
                <div class="card-icon">
                  <span class="badge bg-label-danger rounded p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-candidate-square-rounded">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                      <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                      <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 text-danger">Reminder Pendaftaran</h5>
              <small class="text-muted">Total user yang akan dikirimi email: <strong>{{ $reminderCount }}</strong></small>
            </div>

            <div id="sendingStatus" class="text-muted mt-3" style="display: none;">
              ⏳ Sedang mengirim email ke <span id="currentCount">0</span> / {{ $reminderCount }}...
            </div>

            <form action="{{ route('admin.sendReminderEmail') }}" method="POST" id="reminderForm">
              @csrf
              <button type="submit" class="btn btn-outline-danger mt-3" id="sendReminderBtn">
                <i class="ti ti-mail"></i> Kirim Email Reminder
              </button>
            </form>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0 text-success">Reminder WhatsApp</h5>
              <small class="text-muted">Filter berdasarkan Batch dan Tahapan Seleksi</small>
            </div>

            <div id="waSendingStatus" class="text-muted mt-3" style="display: none;">
              ⏳ Sedang mengirim WhatsApp ke <span id="waCurrentCount">0</span> kandidat...
            </div>

            <form action="{{ route('admin.sendReminderWhatsapp') }}" method="POST" id="waReminderForm">
              @csrf
              <div class="row mt-3">
                <div class="col-md-3">
                  <label for="batch" class="form-label">Batch</label>
                  <select name="batch" id="batch" class="form-select">
                    <option value="">Semua Batch</option>
                    @foreach ($candidates->pluck('batch')->unique() as $batch)
                      <option value="{{ $batch }}">{{ $batch }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="status" class="form-label">Tahapan (Stage)</label>
                  <select name="status" id="status" class="form-select">
                    <option value="">Semua Stage</option>
                    <option value="Stage 1">Stage 1 - Seleksi Berkas</option>
                    <option value="Stage 2">Stage 2 - Seleksi Online</option>
                    <option value="Stage 3">Stage 3 - Social Project</option>
                    <option value="Stage 4">Stage 4 - Final Interview</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="is_confirmed" class="form-label">Status Konfirmasi</label>
                  <select name="is_confirmed" id="is_confirmed" class="form-select">
                    <option value="">Semua</option>
                    <option value="with_link">Sudah Konfirmasi</option>
                    <option value="without_link">Belum Konfirmasi</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Jumlah Kandidat</label>
                  <div class="bg-label-info py-2 px-3 rounded">
                    <span id="filteredCount">...</span>
                  </div>
                </div>
              </div>

              <div class="mt-3">
                <label for="waMessage" class="form-label">Pesan WhatsApp</label>
                <textarea name="message" id="waMessage" rows="3" class="form-control"
                  placeholder="Halo {name}, ayo lengkapi pendaftaran kamu sekarang..."></textarea>
                <small class="text-muted">Gunakan <code>{name}</code> untuk otomatis isi nama user.</small>
              </div>

              <button type="submit" class="btn btn-outline-success mt-3" id="sendWaReminderBtn">
                <i class="ti ti-brand-whatsapp"></i> Kirim WhatsApp Reminder
              </button>
            </form>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <h5 class="mb-3 text-danger">Atur Deadline Seleksi</h5>

            <form action="{{ route('admin.selection-phases.update-deadline') }}" method="POST">
              @csrf
              @method('PUT')

              <div class="table-responsive">
                <table class="table table-bordered align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>Nama Fase</th>
                      <th>Deskripsi</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Aktif?</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($phases as $phase)
                      <tr>
                        <td>{{ $phase->name }}</td>
                        <td>{{ $phase->description }}</td>
                        <td>
                          <input type="datetime-local" name="phases[{{ $phase->id }}][start_date]"
                            value="{{ \Carbon\Carbon::parse($phase->start_date)->format('Y-m-d\TH:i') }}"
                            class="form-control">
                        </td>
                        <td>
                          <input type="datetime-local" name="phases[{{ $phase->id }}][end_date]"
                            value="{{ \Carbon\Carbon::parse($phase->end_date)->format('Y-m-d\TH:i') }}"
                            class="form-control">
                        </td>
                        <td>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                              name="phases[{{ $phase->id }}][is_active]" {{ $phase->is_active ? 'checked' : '' }}>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="mt-3 text-end">
                <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center my-3">
          <h4 class="text-danger">
            Statistik Pendaftar
          </h4>
          <a href="#" class="btn btn-md btn-outline-danger mb-2 float-end">Export ke
            Excel</a>
        </div>
        <div class="card">
          <div class="card-datatable table-responsive">
            <table id="candidatesTable" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Peserta</th>
                  <th>Regional</th>
                  <th>Jenis Kelamin</th>
                  <th>Usia</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($candidates as $candidate)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      <a href="{{ route('candidate.detail', $candidate) }}" class="text-danger">
                        {{ $candidate->user->name }}
                      </a>
                    </td>
                    <td>
                      {{ $candidate->region }}
                    </td>
                    <td>
                      {{ $candidate->gender }}
                    </td>
                    <td>
                      {{ $candidate->age }} tahun
                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a href="{{ route('candidate.detail', $candidate) }}" class="dropdown-item waves-effect">
                            <i class="ti ti-file-dots ti-sm me-1"></i> View
                          </a>
                          <a href="{{ route('candidate.edit', $candidate) }}" class="dropdown-item waves-effect">
                            <i class="ti ti-pencil me-1"></i> Edit
                          </a>
                          <form action="{{ route('candidate.destroy', $candidate) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item waves-effect text-danger"
                              onclick="return confirm('Are you sure?');">
                              <i class="ti ti-trash me-1"></i> Delete
                            </button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // === Inisialisasi DataTable dengan penyimpanan halaman terakhir ===
      const lastPage = localStorage.getItem('candidates_table_last_page') || 0;
      const table = $('#candidatesTable').DataTable({
        displayStart: lastPage * 10 // asumsikan 10 rows per halaman
      });

      table.on('page.dt', function() {
        const info = table.page.info();
        localStorage.setItem('candidates_table_last_page', info.page);
      });

      // === Reminder Email Simulation ===
      const reminderForm = document.getElementById('reminderForm');
      const sendBtn = document.getElementById('sendReminderBtn');
      const statusText = document.getElementById('sendingStatus');
      const currentCount = document.getElementById('currentCount');
      const total = {{ $reminderCount }};

      if (reminderForm && sendBtn && statusText) {
        reminderForm.addEventListener('submit', function() {
          sendBtn.disabled = true;
          sendBtn.innerText = 'Mengirim...';
          statusText.style.display = 'block';

          if (currentCount && total > 0) {
            let sent = 0;
            const interval = setInterval(() => {
              sent++;
              currentCount.innerText = sent;

              if (sent >= total) {
                clearInterval(interval);
                sendBtn.innerText = 'Terkirim';
              }
            }, 300);
          }
        });
      }

      document.getElementById('waReminderForm').addEventListener('submit', function(e) {
        const btn = document.getElementById('sendWaReminderBtn');
        const status = document.getElementById('waSendingStatus');
        const count = document.getElementById('waCurrentCount');

        btn.disabled = true;
        status.style.display = 'block';

        let current = 0;
        const total = {{ $reminderCount }};
        const interval = setInterval(() => {
          current++;
          if (current >= total) clearInterval(interval);
          count.innerText = current;
        }, 800); // simulasi animasi progres tiap 0.8 detik
      });

      const batch = document.getElementById('batch');
      const status = document.getElementById('status');
      const isConfirmed = document.getElementById('is_confirmed');
      const filteredCount = document.getElementById('filteredCount');

      function updateFilteredCount() {
        fetch(`{{ route('admin.previewReminderCount') }}`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              batch: batch.value,
              status: status.value,
              is_confirmed: isConfirmed.value
            })
          })
          .then(response => response.json())
          .then(data => {
            filteredCount.textContent = data.count;
          })
          .catch(error => {
            filteredCount.textContent = 'Gagal';
            console.error('Gagal mengambil jumlah kandidat:', error);
          });
      }

      batch.addEventListener('change', updateFilteredCount);
      status.addEventListener('change', updateFilteredCount);
      isConfirmed.addEventListener('change', updateFilteredCount);

      // Panggil saat halaman dimuat pertama kali
      updateFilteredCount();
    });
  </script>
@endpush
