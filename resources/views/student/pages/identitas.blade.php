@extends('student.main', ['page' => $subpage])

@section('content')
    <h4 class="text-primary fw-bold mb-0">Data Calon Siswa</h4>
    <span class="fw-semibold">Silahkan isi data dengan lengkap dan benar.</span>

    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header py-1">
                    <ul id="datatabs" class="nav nav-tabs card-header-tabs d-flex justify-content-around" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('student.edit1') }}" type="button"
                                class="{{ Route::is('student.edit1') ? 'active' : '' }} nav-link gap-1">
                                <i class="ti ti-user d-none d-sm-inline"></i>
                                <span>Pribadi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.edit2') }}" type="button"
                                class="{{ Route::is('student.edit2') ? 'active' : '' }} nav-link gap-1">
                                <i class="ti ti-home-2 d-none d-sm-inline"></i>
                                <span>Keluarga</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.edit3') }}" type="button"
                                class="{{ Route::is('student.edit3') ? 'active' : '' }} nav-link gap-1">
                                <i class="ti ti-school d-none d-sm-inline"></i>
                                <span>Sekolah Asal</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">

                    @yield('step')

                </div>
            </div>
        </div>
    </div>
@endsection
