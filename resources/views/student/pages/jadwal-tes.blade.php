@extends('student.main', ['page' => 'Jadwal Tes'])

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Daftar Tes Seleksi</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jadwal Tes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">
                            <i data-feather="edit-3" class="me-50"></i> Tes Tertulis
                        </h4>
                        <span class="badge badge-light-primary">Total 2 Tes</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Tes</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Waktu & Durasi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="fw-bold">Potensi Akademik</span></td>
                                    <td>Umum</td>
                                    <td>30 Mar 2026 <br> <small class="text-muted">08:00 (90 Menit)</small></td>
                                    <td><span class="badge rounded-pill badge-light-success">Aktif</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary">Mulai Tes</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold">Bahasa Inggris</span></td>
                                    <td>Bahasa</td>
                                    <td>31 Mar 2026 <br> <small class="text-muted">10:00 (60 Menit)</small></td>
                                    <td><span class="badge rounded-pill badge-light-secondary">Belum Mulai</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-secondary" disabled>Mulai Tes</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header border-bottom bg-light-info">
                        <h4 class="card-title">
                            <i data-feather="tool" class="me-50"></i> Tes Praktik
                        </h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Tes</th>
                                    <th>Lokasi / Lab</th>
                                    <th>Jadwal Kelompok</th>
                                    <th>Instruktur</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="fw-bold">Skill Programming</span></td>
                                    <td>Lab Komputer 1</td>
                                    <td>Kelompok A <br> <small class="text-muted">Shift Pagi</small></td>
                                    <td>Budi Santoso</td>
                                    <td class="text-center">
                                        <span class="badge badge-light-warning">Menunggu Giliran</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="fw-bold">Wawancara Teknis</span></td>
                                    <td>Ruang Rapat A</td>
                                    <td>Kelompok B <br> <small class="text-muted">Shift Siang</small></td>
                                    <td>Siti Aminah</td>
                                    <td class="text-center">
                                        <span class="badge badge-light-danger">Tutup</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
