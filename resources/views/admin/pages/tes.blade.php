@extends('admin.main')

@section('content')
    <style>
        /* Bayangan halus khusus di bawah header */
        .border-bottom-shadow {
            border-bottom: 1px solid #e0e6ed;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* Card Styling */
        .custom-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08) !important;
        }

        /* Label Backgrounds */
        .bg-light-primary {
            background-color: #e7e7ff !important;
        }

        .bg-light-warning {
            background-color: #fff4e2 !important;
        }
    </style>

    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin /</span> Penjadwalan Tes
    </h4>

    <div class="row mb-3">
        <div class="col">
            <div class="add-test d-flex justify-content-between align-items-center border-bottom-shadow pb-2">
                <h4 class="fw-bold mb-0">Daftar Tes</h4>
                {{-- <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalTambahTes">
                    <i class="ti ti-plus me-1"></i> Tambah Tes
                </button> --}}
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card custom-card shadow-sm h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-light-primary me-3">
                            <i class="ti ti-file-text fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0 fw-bold">Tes Tertulis</h5>
                        </div>
                    </div>
                    {{-- <button class="btn text-danger btn-icon btn-sm">
                        <i class="ti ti-trash"></i>
                    </button> --}}
                </div>

                <hr class="my-3 opacity-50">
                <div class="d-flex align-items-center mb-4">
                    <i class="ti ti-calendar-event me-2 text-primary"></i>
                    <span class="text-muted small">Jadwal: <strong class="text-dark">10 Agustus 2023</strong></span>
                </div>
                <div class="d-grid">
                    <a href="#" class="btn btn-primary rounded-pill">
                        <i class="ti ti-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card custom-card shadow-sm h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center">
                        <div class="p-2 rounded bg-light-warning me-3">
                            <i class="ti ti-tools fs-3 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0 fw-bold">Tes Praktik</h5>
                        </div>
                    </div>
                    {{-- <button class="btn text-danger btn-icon btn-sm">
                        <i class="ti ti-trash"></i>
                    </button> --}}
                </div>

                <hr class="my-3 opacity-50">
                <div class="d-flex align-items-center mb-4">
                    <i class="ti ti-calendar-event me-2 text-warning"></i>
                    <span class="text-muted small">Jadwal: <strong class="text-dark">12 Agustus 2023</strong></span>
                </div>
                <div class="d-grid">
                    <a href="#" class="btn btn-warning rounded-pill">
                        <i class="ti ti-eye me-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahTes" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 p-4">
                    <h5 class="modal-title fw-bold">Tambah Tes Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="namaTes">Nama Tes</label>
                            <input type="text" class="form-control" id="namaTes" name="namaTes"
                                placeholder="Contoh: Tes Tertulis">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggalPelaksanaan">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" id="tanggalPelaksanaan" name="tanggalPelaksanaan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
