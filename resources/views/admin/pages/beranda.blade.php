@extends('admin.main')

@section('content')
    <div class="text-center mb-4">
        <h2 class="text-primary fw-bold mb-0">Selamat Bekerja, {{ $admin->name }}💪</h2>
        <span class="text-muted">PPDB Tahun Pelajaran 2026/2027</span>
    </div>

    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin /</span> Beranda
    </h4>

    <div class="row mb-4">
        <div class="col-4 mb-4">
            <div class="card border-top border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Jumlah Pendaftar</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['total'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-users ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card border-top border-secondary">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Belum Konfirmasi</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['belum'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="ti ti-user-search ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card border-top border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Menunggu Verifikasi</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['pending'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-user-exclamation ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card border-top border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Perlu Revisi</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['revisi'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-x ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card border-top border-info">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Terverifikasi</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['disetujui'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-info">
                                <i class="ti ti-user-plus ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card border-top border-success">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Lulus</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $stat['lulus'] }}</h4>
                            </div>
                            <small class="mb-0">Pendaftar</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-md"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
