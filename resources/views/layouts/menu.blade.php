<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link mt-4">
      <img src="{{ asset('assets/fli/fli-logo.svg') }}" width="50%">
      {{-- <span class="app-brand-text demo menu-text fw-bold">Future Leaders ID</span> --}}
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
    </li>
    <li class="menu-item {{ Route::is('candidate*') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    {{-- <li class="menu-item {{ Route::is('mbti') ? 'active' : '' }}">
      <a href="{{ route('mbti') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-description"></i>
        <div data-i18n="MBTI">MBTI</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-notebook"></i>
        <div data-i18n="Forms">Forms</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('goals.create') }}" class="menu-link">
            <div data-i18n="Buat Form Baru">Buat Form Baru</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('goals.index') }}" class="menu-link">
            <div data-i18n="Semua Forms">Semua Forms</div>
          </a>
        </li>
      </ul>
    </li> --}}

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" data-i18n="Pengaturan">Pengaturan</span>
    </li>
    {{-- <li class="menu-item">
      <a href="{{ route('profile.edit') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user"></i>
        <div data-i18n="Edit Profil">Edit Profil</div>
      </a>
    </li> --}}
    <li class="menu-item">
      <a class="menu-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="menu-icon tf-icons ti ti-power"></i>
        <div data-i18n="Logout">Logout</div>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</aside>
<!-- / Menu -->
