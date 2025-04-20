@extends('template.blank')

@section('content')
  <div class="container">

    <div class="row">
      <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <div class="row mt-5 mb-4">
          <div class="col-md-6">
            <img src="{{ asset('assets/fli/fli-logo.svg') }}" alt="YFLI" height="64" class="mb-2">
          </div>
          <div class="col-md-6">
            <div class="card h-auto">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                  <h3 class="mb-1 me-2">{{ number_format($users->count()) }}</h3>
                  <p class="mb-0">Total Pendaftar</p>
                </div>
                <div class="card-icon">
                  <span class="badge bg-label-danger rounded p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-user-square-rounded">
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

        <div class="d-flex justify-content-between align-items-center my-3">
          <h4 class="text-danger">
            Statistik Pendaftar
          </h4>
          <a href="{{ route('users.export') }}" class="btn btn-md btn-outline-danger mb-2 float-end">Export ke Excel</a>
        </div>
        <div class="card">
          @include('components.session-message')
          <div class="card-datatable table-responsive">
            <table id="usersTable" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Calon Peserta</th>
                  <th>Kontak</th>
                  <th>Status</th>
                  <th>Interviewer</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      <a href="{{ route('users.show', $user) }}" class="text-danger">
                        {{ $user->name }}
                      </a>
                    </td>
                    <td>
                      <ul>
                        <li>No. HP: {{ $user->phone }}</li>
                        <li>Email: {{ $user->email }}</li>
                      </ul>
                    </td>
                    <td>
                      <form action="{{ route('users.update-status', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select" onchange="this.form.submit()">
                          <option value="Seleksi Berkas" @if ($user->status == 'Seleksi Berkas') selected @endif>Seleksi Berkas
                          </option>
                          <option value="Seleksi Wawancara" @if ($user->status == 'Seleksi Wawancara') selected @endif>Seleksi
                            Wawancara</option>
                          <option value="Belum Diterima" @if ($user->status == 'Belum Diterima') selected @endif>Belum Diterima
                          </option>
                          <option value="Lulus" @if ($user->status == 'Lulus') selected @endif>Lulus</option>
                        </select>
                      </form>
                    </td>
                    <td>
                      @if ($user->status == 'Seleksi Wawancara')
                        @if ($user->selection && $user->selection->pj_name)
                          <a href="{{ route('selections.edit', $user) }}"
                            class="btn btn-outline-info">{{ $user->selection->pj_name }}</a>
                        @else
                          <a href="{{ route('selections.create', $user) }}" class="btn btn-danger">Tambah</a>
                        @endif
                      @else
                        <small>Peserta tidak sedang di tahap wawancara.</small>
                      @endif
                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a href="{{ route('users.show', $user) }}" class="dropdown-item waves-effect">
                            <i class="ti ti-file-dots ti-sm me-1"></i> View
                          </a>
                          <a href="{{ route('users.edit', $user) }}" class="dropdown-item waves-effect">
                            <i class="ti ti-pencil me-1"></i> Edit
                          </a>
                          <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
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
    $(document).ready(function() {
      // Ambil nomor halaman terakhir yang tersimpan
      const lastPage = localStorage.getItem('users_table_last_page') || 0;

      const table = $('#usersTable').DataTable({
        // Konfigurasi lainnya
        displayStart: lastPage * 10 // asumsikan 10 rows per page
      });

      // Setiap kali user pindah halaman, simpan ke localStorage
      table.on('page.dt', function() {
        const info = table.page.info();
        localStorage.setItem('users_table_last_page', info.page);
      });
    });
  </script>
@endpush
