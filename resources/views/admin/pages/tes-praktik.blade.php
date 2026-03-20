@extends('admin.main')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h4 class="fw-bold mb-4">
            <span class="text-muted fw-light">Admin / Penjadwalan Tes /</span> Tes Praktik
        </h4>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
            <i class="ti ti-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="add-test d-flex justify-content-between align-items-center border-bottom-shadow pb-2">
                <h4 class="fw-bold mb-0">Daftar Ruang</h4>
                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalTambahTes">
                    <i class="ti ti-plus me-1"></i> Generate Ruang
                </button>
            </div>
        </div>
    </div>
@endsection
