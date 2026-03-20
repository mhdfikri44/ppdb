@extends('admin.main')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h4 class="fw-bold mb-4">
            <span class="text-muted fw-light">Admin / Penjadwalan Tes /</span> Tes Tertulis
        </h4>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
            <i class="ti ti-arrow-left"></i> Kembali
        </a>
    </div>

    <style>
        .info-label {
            font-size: 0.8rem;
            color: #a1acb8;
            text-transform: uppercase;
            font-weight: 600;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: #566a7f;
        }

        .card-action-btn {
            position: absolute;
            top: 15px;
            right: 15px;
        }
    </style>

    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <div class="row g-3 d-flex justify-between">
                <div class="col border-end">
                    <div class="info-label">Nama Tes</div>
                    <div class="info-value">Tes Tertulis Gelombang 1</div>
                </div>
                <div class="col border-end">
                    <div class="info-label">Tanggal</div>
                    <div class="info-value"><i class="ti ti-calendar me-1"></i> 10 Agustus 2023</div>
                </div>
                <div class="col">
                    <div class="info-label">Waktu</div>
                    <div class="info-value"><i class="ti ti-clock me-1"></i> 08:00 - 10:00 WIB</div>
                </div>

                <div class="col-1">
                    <button class="btn btn-sm btn-label-primary h-100" data-bs-toggle="modal"
                        data-bs-target="#modalEditTes">
                        <i class="ti ti-edit me-1"></i> Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditTes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Detail Tes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Tes</label>
                        <input type="text" class="form-control" value="Tes Tertulis Gelombang 1">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" value="2023-08-10">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" value="08:00">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Durasi (Menit)</label>
                        <input type="number" class="form-control" value="120">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- manajemen ruang --}}
    <div class="row g-4">
        <div class="col-8">
            <div class="card shadow-sm border-0">
                <div
                    class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom py-3">
                    <h5 class="mb-0 fw-bold"><i class="ti ti-building-community me-2 text-primary"></i>Manajemen Ruang</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalTambahRuang">
                            <i class="ti ti-plus me-1"></i> Tambah Ruang
                        </button>
                        <button class="btn btn-primary btn-sm">
                            <i class="ti ti-refresh me-1"></i> Auto-Generate Siswa
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Nama Ruang</th>
                                <th>Kapasitas</th>
                                <th>Terisi</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">Ruang 1</span>
                                </td>
                                <td><span class="badge bg-label-secondary">40 Kursi</span></td>
                                <td><span class="fw-semibold">35 Siswa</span></td>
                                <td><span class="badge bg-label-success">Tersedia</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-icon btn-info" title="Detail Siswa"><i
                                            class="ti ti-users"></i></button>
                                    <button class="btn btn-sm btn-icon btn-danger"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">Ruang 2</span>
                                </td>
                                <td><span class="badge bg-label-secondary">30 Kursi</span></td>
                                <td><span class="fw-semibold">30 Siswa</span></td>
                                <td><span class="badge bg-label-danger">Penuh</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-icon btn-info"><i class="ti ti-users"></i></button>
                                    <button class="btn btn-sm btn-icon btn-danger"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow-sm border-0 bg-primary">
                <div class="card-body text-white">
                    <h5 class="card-title text-white fw-bold">Statistik Peserta</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Calon Siswa:</span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sudah Dapat Ruang:</span>
                        <span class="fw-bold">65</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Belum Terplot:</span>
                        <span class="badge bg-white text-primary fw-bold">85 Siswa</span>
                    </div>
                    <div class="progress bg-white bg-opacity-25" style="height: 8px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 43%" aria-valuenow="43"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mt-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Quick Actions</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-secondary w-100 text-start">
                            <i class="ti ti-download me-2"></i> Download Absensi
                        </button>
                        <button class="btn btn-outline-secondary w-100 text-start">
                            <i class="ti ti-printer me-2"></i> Cetak Kartu Ujian
                        </button>
                        <button class="btn btn-label-danger w-100 text-start">
                            <i class="ti ti-trash me-2"></i> Reset Plotting
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahRuang" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Ruang Ujian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-primary p-3 small">
                        Sistem akan membuat ruang dengan penamaan otomatis
                        (Ruang 1, Ruang 2, dst).
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Ruang yang Dibuat</label>
                        <input type="number" name="jumlah_ruang" class="form-control" placeholder="Contoh: 5" required
                            min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kapasitas per ruang</label>
                        <input type="number" name="kapasitas" class="form-control" placeholder="Contoh: 20" required
                            min="1">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat Ruang</button>
                </div>

            </div>
        </div>
    </div>
@endsection
