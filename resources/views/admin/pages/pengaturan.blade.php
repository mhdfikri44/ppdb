@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / </span> Pengaturan
    </h4>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Konfigurasi PPDB</h5>
                </div>
                <div class="card-body pt-4">
                    <form id="formSetting">
                        @csrf @method('PUT')
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="mb-0">Status Pendaftaran (PPDB)</h6>
                                <small class="text-muted">Aktifkan untuk mengizinkan calon siswa mendaftar.</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="ppdb_open" name="ppdb_open"
                                    {{ $settings->ppdb_open ? 'checked' : '' }}>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h6 class="mb-0">Pengumuman Hasil Akhir</h6>
                                <small class="text-muted">Tampilkan status kelulusan pada halaman siswa.</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="final_result_published"
                                    name="final_result_published" {{ $settings->final_result_published ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card bg-light-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar me-3">
                            <span class="avatar-initial rounded bg-primary"><i class="ti ti-info-circle"></i></span>
                        </div>
                        <h5 class="mb-0">Informasi Panel</h5>
                    </div>
                    <p class="text-body">
                        Pengaturan ini berdampak langsung pada <strong>Landing Page</strong> dan <strong>Dashboard
                            Siswa</strong>.
                        Pastikan data seleksi sudah diverifikasi sebelum mengaktifkan "Pengumuman Hasil Akhir".
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="ti ti-check me-2 text-success"></i> <strong>PPDB Tutup:</strong> Form
                            registrasi akan disembunyikan.</li>
                        <li class="mb-2"><i class="ti ti-check me-2 text-success"></i> <strong>Hasil Akhir:</strong> Siswa
                            dapat melihat kartu kelulusan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable-script')
    <script>
        $('#formSetting').on('submit', function(e) {
            e.preventDefault();

            let formData = {
                _token: "{{ csrf_token() }}",
                ppdb_open: $('#ppdb_open').is(':checked') ? 1 : 0,
                final_result_published: $('#final_result_published').is(':checked') ? 1 : 0
            };

            Swal.fire({
                title: 'Simpan perubahan?',
                text: 'Pengaturan akan diperbarui',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('admin.setting.update') }}",
                        type: "PUT",
                        data: formData,

                        success: function(res) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                        },

                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.responseJSON?.message || 'Terjadi kesalahan'
                            });
                        }
                    });

                }
            });
        });
    </script>
@endsection
