@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / </span> Penilaian dan Kelulusan
    </h4>

    <div class="row">
        <div class="col">
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-end align-items-center">

                        <div class="fungsi-tabel ms-4 d-flex align-items-center gap-1">
                            <button class="btn btn-success" id="btn-lulus">
                                <i class="ti ti-check me-1"></i> Lulus
                            </button>

                            <button class="btn btn-danger" id="btn-tidak-lulus">
                                <i class="ti ti-x me-1"></i> Tidak Lulus
                            </button>

                            <button class="btn btn-info" id="downloadTemplate">
                                <i class="ti ti-file-download me-1"></i> Unduh Template
                            </button>

                            <button class="btn btn-warning" id="btn-upload">
                                <i class="ti ti-file-upload me-1"></i> Upload Nilai
                            </button>

                            <button class="btn btn-primary refreshTable">
                                <i class="ti ti-refresh me-1"></i> Refresh
                            </button>
                        </div>
                    </div>
                    <table class="datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select_all"></th>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Nilai Praktik</th>
                                <th>Nilai Tertulis</th>
                                <th>Nilai Akhir</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUploadNilai" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formUploadNilai" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Nilai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">File Excel</label>
                            <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required>
                            <small class="text-muted">Format sesuai template</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-upload me-1"></i> Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('datatable-script')
    <script>
        let table = $(".datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.scoring.data') }}",
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            pageLength: 10,
            // order: [
            //     [7, "desc"]
            // ],
            columns: [{
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        let praktik = row.test_practice?.score;
                        let tertulis = row.test_written?.score;

                        if (praktik == null && tertulis == null) {
                            return `<input type="checkbox" disabled>`;
                        }
                        return `<input type="checkbox" class="row-checkbox" value="${data}">`;
                    }
                },
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "registration.no_pendaftaran",
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
                    data: "test_practice.score",
                    defaultContent: "-",
                    name: "test_practice.score"
                },
                {
                    data: "test_written.score",
                    defaultContent: "-",
                    name: "test_written.score"
                },
                {
                    data: "final_score",
                    name: "final_score"
                },
                {
                    data: "keterangan",
                    name: "keterangan"
                }
            ],

            drawCallback: function() {}
        });

        table.on('draw.dt', function() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                new bootstrap.Tooltip(el);
            });
        });

        $('.refreshTable').on('click', function() {
            table.ajax.reload(null, false);
        });

        $('#downloadTemplate').on('click', function() {
            window.location.href = "{{ route('admin.scoring.template') }}";
        });

        $('#btn-upload').on('click', function() {
            $('#modalUploadNilai').modal('show');
        });

        // select all
        $('#select_all').on('click', function() {
            $('.row-checkbox').prop('checked', this.checked);
        });

        // sync uncheck
        $(document).on('change', '.row-checkbox', function() {
            if (!this.checked) {
                $('#select_all').prop('checked', false);
            }
        });

        function getSelectedIds() {
            let ids = [];
            $('.row-checkbox:checked').each(function() {
                ids.push($(this).val());
            });
            return ids;
        }

        // submit upload
        $('#formUploadNilai').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            Swal.fire({
                title: 'Upload?',
                text: 'Pastikan file sesuai template',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Upload'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('admin.scoring.import.nilai') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            $('#modalUploadNilai').modal('hide');
                            $('#formUploadNilai')[0].reset();
                            table.ajax.reload(null, false);

                            let s = res.summary;
                            let percent = s.total > 0 ? Math.round((s.success / s.total) *
                                100) : 0;

                            let html = `
                                <div class="text-start">
                                    <div class="mb-2">
                                        <strong>Hasil Import Nilai</strong>
                                    </div>

                                    <div class="mb-2">
                                        <span class="badge bg-success">Berhasil: ${s.success}</span>
                                        <span class="badge bg-danger">Gagal: ${s.failed}</span>
                                        <span class="badge bg-secondary">Total: ${s.total}</span>
                                    </div>

                                    <div class="progress mb-3" style="height: 8px;">
                                        <div class="progress-bar bg-success" style="width: ${percent}%"></div>
                                    </div>
                            `;

                            if (res.errors && res.errors.length > 0) {
                                html += `
                                    <div style="max-height:150px;overflow:auto;">
                                        <ul class="small text-danger mb-0">
                                `;
                                res.errors.forEach(e => {
                                    html += `<li>${e}</li>`;
                                });
                                html += `</ul></div>`;
                            }

                            html += `</div>`;

                            Swal.fire({
                                icon: s.failed > 0 ? 'warning' : 'success',
                                title: 'Import Selesai',
                                html: html,
                                width: 500
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

        $('#btn-lulus').on('click', function() {

            let ids = getSelectedIds();

            if (ids.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Pilih calon siswa terlebih dahulu'
                });
                return;
            }

            Swal.fire({
                title: 'Yakin?',
                text: 'Calon siswa yang dipilih akan diluluskan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('admin.scoring.passed') }}",
                        type: "POST",
                        data: {
                            ids: ids,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            table.ajax.reload(null, false);

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan'
                            });
                        }
                    });
                }
            });
        });

        $('.btn-danger').on('click', function() {

            let ids = getSelectedIds();

            if (ids.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Pilih calon siswa terlebih dahulu'
                });
                return;
            }

            Swal.fire({
                title: 'Yakin?',
                text: 'Calon siswa yang dipilih akan tidak diluluskan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('admin.scoring.failed') }}",
                        type: "POST",
                        data: {
                            ids: ids,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            table.ajax.reload(null, false);

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: res.message,
                                timer: 2000,
                                showConfirmButton: false
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan'
                            });
                        }
                    });
                }


            });
        });
    </script>
@endsection
