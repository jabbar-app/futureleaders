<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper mb-0">
        <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
          <i class="ti ti-search ti-md me-2"></i>
          <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
        </a>
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Language -->
      {{-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <i class="ti ti-language rounded-circle ti-md"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item d-flex gap-2" href="javascript:void(0);" data-language="en" data-text-direction="ltr">
              <span class="align-middle">English</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="javascript:void(0);" data-language="fr" data-text-direction="ltr">
              <span class="align-middle">French</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="javascript:void(0);" data-language="ar" data-text-direction="rtl">
              <span class="align-middle">Arabic</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="javascript:void(0);" data-language="de" data-text-direction="ltr">
              <span class="align-middle">German</span>
            </a>
          </li>
        </ul>
      </li> --}}
      <!--/ Language -->

      <!-- Quick links  -->
      {{-- <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
          data-bs-auto-close="outside" aria-expanded="false">
          <i class="ti ti-layout-grid-add ti-md"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end py-0">
          <div class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
              <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
              <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Add shortcuts"><i class="ti ti-sm ti-apps"></i></a>
            </div>
          </div>
          <div class="dropdown-shortcuts-list scrollable-container">
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-calendar fs-4"></i>
                </span>
                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                <small class="text-muted mb-0">Appointments</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-file-invoice fs-4"></i>
                </span>
                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                <small class="text-muted mb-0">Manage Accounts</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-users fs-4"></i>
                </span>
                <a href="app-user-list.html" class="stretched-link">User App</a>
                <small class="text-muted mb-0">Manage Users</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-lock fs-4"></i>
                </span>
                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                <small class="text-muted mb-0">Permission</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-chart-bar fs-4"></i>
                </span>
                <a href="index.html" class="stretched-link">Dashboard</a>
                <small class="text-muted mb-0">User Profile</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-settings fs-4"></i>
                </span>
                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                <small class="text-muted mb-0">Account Settings</small>
              </div>
            </div>
            <div class="row row-bordered overflow-visible g-0">
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-help fs-4"></i>
                </span>
                <a href="pages-faq.html" class="stretched-link">FAQs</a>
                <small class="text-muted mb-0">FAQs & Articles</small>
              </div>
              <div class="dropdown-shortcuts-item col">
                <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                  <i class="ti ti-square fs-4"></i>
                </span>
                <a href="modal-examples.html" class="stretched-link">Modals</a>
                <small class="text-muted mb-0">Useful Popups</small>
              </div>
            </div>
          </div>
        </div>
      </li> --}}
      <!-- Quick links -->

      <!-- Notification -->
      <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
          data-bs-auto-close="outside" aria-expanded="false">
          <i class="ti ti-bell ti-md"></i>
          @if ($unreadCount > 0)
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadCount }}</span>
          @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0">
          <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
              <h5 class="text-body mb-0 me-auto">Notification</h5>
              <a href="{{ route('notifications.readAll') }}" class="dropdown-notifications-all text-body"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                  class="ti ti-mail-opened fs-4"></i></a>
            </div>
          </li>
          <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">
              @forelse($notifications as $notif)
                <li
                  class="list-group-item list-group-item-action dropdown-notifications-item {{ $notif->is_read ? 'marked-as-read' : '' }}">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <h6 class="mb-1">{{ $notif->title }}</h6>
                      <p class="mb-0">{{ $notif->body }}</p>
                      <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                      <a href="{{ route('notifications.read', $notif->id) }}" class="dropdown-notifications-read">
                        <span class="badge badge-dot"></span>
                      </a>
                      <a href="{{ route('notifications.delete', $notif->id) }}" class="dropdown-notifications-archive">
                        <span class="ti ti-x"></span>
                      </a>
                    </div>
                  </div>
                </li>
              @empty
                <li class="list-group-item text-center">No notifications yet.</li>
              @endforelse
            </ul>
          </li>
          <li class="dropdown-menu-footer border-top">
            <a href="{{ route('notifications.all') }}"
              class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
              View all notifications
            </a>
          </li>
        </ul>
      </li>
      <!--/ Notification -->

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{ $user->candidate ? asset($user->candidate->avatar) : asset('assets/images/blank.webp') }}"
              alt="{{ $user->name }}" class="h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item d-flex gap-2" href="{{ $user->candidate ? route('candidate.edit', $user->candidate) : route('candidate.dashboard') }}">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ $user->candidate ? asset($user->candidate->avatar) : asset('assets/images/blank.webp') }}"
                      alt="{{ $user->name }}" class="h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-medium d-block">{{ $user->name }}</span>
                  <small class="text-muted">{{ $user->email }}</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="pages-profile-user.html">
              <i class="ti ti-user-circle ti-sm"></i>
              <span class="align-middle">Edit Profil</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="{{ asset('files/YFLI Handbook - Langkat Binjai 2025.pdf') }}">
              <i class="ti ti-download ti-sm"></i>
              <span class="align-middle">Unduh Buku Panduan</span>
            </a>
          </li>
          {{-- <li>
            <a class="dropdown-item d-flex gap-2" href="pages-account-settings-billing.html">
              <span class="d-flex align-items-center align-middle">
                <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                <span class="flex-grow-1 align-middle">Unduh Buku Panduan</span>
                <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
              </span>
            </a>
          </li> --}}
          <li>
            <div class="dropdown-divider"></div>
          </li>
          {{-- <li>
            <a class="dropdown-item d-flex gap-2" href="pages-faq.html">
              <i class="ti ti-help me-2 ti-sm"></i>
              <span class="align-middle">FAQ</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex gap-2" href="pages-pricing.html">
              <i class="ti ti-currency-dollar me-2 ti-sm"></i>
              <span class="align-middle">Pricing</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li> --}}
          <li>
            <a class="dropdown-item d-flex gap-2" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ti ti-logout ti-sm"></i>
              <div data-i18n="Logout">Logout</div>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>

  <!-- Search Small Screens -->
  <div class="navbar-search-wrapper search-input-wrapper d-none">
    <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
      aria-label="Search..." />
    <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
  </div>
</nav>

<!-- / Navbar -->
