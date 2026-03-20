<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo">
                <img src="{{ asset('assets/img/mts/logo-mts.png') }}" alt="logo app" width="50">
            </span>
            <img src="{{ asset('assets/img/mts/logo.png') }}" alt="logo app" width="100">
        </a>

        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Route::is('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('admin.student.*') ? 'active open' : '' }}">
            <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Data Pendaftar">Data Pendaftar</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('admin.student.list', 'admin.student.detail') ? 'active' : '' }}">
                    <a href="{{ route('admin.student.list') }}" class="menu-link">
                        <div data-i18n="Daftar">Daftar</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('admin.student.confirm.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.student.confirm.list') }}" class="menu-link">
                        <div data-i18n="Verifikasi">Verifikasi & Revisi</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('admin.student.approved.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.student.approved.list') }}" class="menu-link">
                        <div data-i18n="Disetujui">Disetujui</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="menu-item {{ Route::is('admin.test.*') ? 'active' : '' }}">
            <a href="{{ route('admin.test.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Penjadwalan Tes">Penjadwalan Tes</div>
            </a>
        </li> --}}
    </ul>
</aside>
