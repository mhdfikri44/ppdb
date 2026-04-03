<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('student.index') }}" class="app-brand-link gap-2">
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
        {{-- <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Apps &amp; Pages</span>
                    </li> --}}
        <li class="menu-item {{ Route::is('student.index') ? 'active' : '' }}">
            <a href="{{ route('student.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('student.edit*') ? 'active' : '' }}">
            <a href="{{ route('student.edit1', $student->nisn) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-id-badge-2"></i>
                <div data-i18n="Data Identitas">Data Identitas</div>
            </a>
        </li>
        <li class="menu-item {{ Route::is('student.document') ? 'active' : '' }}">
            <a href="{{ route('student.document', $student->nisn) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Dokumen">Dokumen</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="{{ route('student.schedule', $student->nisn) }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Jadwal Tes">Jadwal Tes</div>
            </a>
        </li> --}}
    </ul>
</aside>
