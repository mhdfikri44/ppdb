<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="#">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-between w-100" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            @php
                $pasfoto = auth('student')->user()->documents->where('jenis_dokumen', 'pasfoto')->first();
            @endphp
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                    <div class="avatar border rounded-circle" style="width: 50px; height: 50px; overflow: hidden;">
                        <img class="rounded-circle" style="width: 100%; height: 100%; object-fit: cover;"
                            src="{{ isset($pasfoto->path) ? route('student.file.show', $pasfoto->path) : asset('assets/img/mts/profile-default.jpg') }}" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- <li>
                        <a class="dropdown-item" href="#">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">Profil</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li> --}}
                    <li>
                        <form action="{{ route('student.logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Keluar</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
