@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / Data Pendaftar /</span> Daftar
    </h4>

    <div class="row">
        <div class="col">
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Semua Pendaftar</h5>
                        <button class="btn btn-primary refreshTable">
                            <i class="ti ti-refresh me-1"></i> Refresh
                        </button>
                    </div>
                    <table class="student-datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Data</th>
                                <th>Berkas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Reset Password -->
    <div class="modal fade" id="modalResetPassword" tabindex="-1">
        <div class="modal-dialog">
            <form id="formResetPassword" method="POST">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <h5 id="reset_nama" class="text-center"></h5>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Masukkan password" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('password')
                                <div id="password" class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="konfirmasi_password" class="form-control"
                                    name="konfirmasi_password" placeholder="Masukkan password kembali"
                                    aria-describedby="konfirmasi_password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('konfirmasi_password')
                                <div id="konfirmasi_password" class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Reset</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('datatable-script')
    <script>
        let table = $(".student-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.student.data') }}",
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            pageLength: 10,
            order: [
                [2, "asc"]
            ],
            columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "registration.no_pendaftaran",
                    defaultContent: '-',
                    name: "registration.no_pendaftaran"
                },
                {
                    data: "nama_lengkap",
                    name: "nama_lengkap"
                },
                {
                    data: "nisn",
                    name: "nisn"
                },
                {
                    data: "status_data",
                    name: "registration.status_data"
                },
                {
                    data: "status_dokumen",
                    name: "registration.status_dokumen"
                },
                {
                    data: "status_verifikasi",
                    name: "registration.status_verifikasi"
                },
                {
                    data: "aksi",
                    name: "aksi",
                    orderable: false,
                    searchable: false
                },
            ],

            drawCallback: function() {
                // ====== KONFIRMASI HAPUS CALON SISWA ======
                document.querySelectorAll(".btn-hapus").forEach((btn) => {
                    btn.addEventListener("click", function(e) {

                        const nama = this.dataset.nama;
                        Swal.fire({
                            titleText: `Yakin ingin menghapus ${nama}?`,
                            text: "Setelah dihapus, semua data yang berhubungan dengan calon siswa akan hilang.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Ya, hapus!",
                            cancelButtonText: "Batal",
                            confirmButtonColor: "#38c172",
                            // cancelButtonColor: "warning",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.closest("form").submit();
                            }
                        });
                    });
                });
            }
        });

        table.on('draw.dt', function() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                new bootstrap.Tooltip(el);
            });
        });

        $('.refreshTable').on('click', function() {
            table.ajax.reload(null, false);
        });

        $(document).on('click', '.btn-reset-password', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let url = `/admin/student/${id}/reset-password`;

            $('#formResetPassword').attr('action', url);
            $('#reset_nama').text('Reset Password ' + nama);
            $('#modalResetPassword').modal('show');
        });

        $(document).on('click', '.form-password-toggle span', function() {
            let wrapper = $(this).closest('.form-password-toggle');
            let input = wrapper.find('input');
            let icon = $(this).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('ti-eye-off').addClass('ti-eye');
            } else {
                input.attr('type', 'password');
                icon.removeClass('ti-eye').addClass('ti-eye-off');
            }
        });
    </script>
@endsection
