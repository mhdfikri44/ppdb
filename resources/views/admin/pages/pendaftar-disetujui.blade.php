@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / Data Pendaftar /</span> Disetujui
    </h4>

    <div class="row">
        <div class="col">
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Pendaftar yang Disetujui</h5>
                        <button class="btn btn-primary refreshTable">
                            <i class="ti ti-refresh me-1"></i> Refresh
                        </button>
                    </div>
                    <table class="student-approved-datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable-script')
    <script>
        let table = $(".student-approved-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.student.approved.data') }}",
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
                    data: "tempat_tanggal_lahir",
                    name: "tempat_tanggal_lahir"
                },
                {
                    data: "aksi",
                    name: "aksi",
                    orderable: false,
                    searchable: false
                },
            ],

            drawCallback: function() {
                document.querySelectorAll(".btn-batal").forEach((btn) => {
                    btn.addEventListener("click", function(e) {

                        const nama = this.dataset.nama;
                        Swal.fire({
                            titleText: `Yakin ingin membatalkan verifikasi ${nama}?`,
                            text: "Setelah dibatalkan, status calon siswa akan dikembalikan ke Pending.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Ya, batal verifikasi!",
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
    </script>
@endsection
