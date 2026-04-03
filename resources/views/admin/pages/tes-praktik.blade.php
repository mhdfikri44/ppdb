@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / </span> Penjadwalan Tes Praktik
    </h4>

    <div class="row">
        <div class="col">
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 me-2">
                            <form id="formImport" action="{{ route('admin.test.import.jadwal') }}" method="post"
                                enctype="multipart/form-data" class="m-0">
                                @csrf
                                <label for="jadwal_tes"
                                    class="file-name-box w-100 p-2 border rounded bg-light text-muted d-block">
                                    Pilih jadwal tes
                                </label>
                                <input type="file" class="d-none" id="jadwal_tes" name="jadwal_tes">
                                <input type="hidden" name="type" value="praktik">
                            </form>
                            @error('jadwal_tes')
                                <div class="form-text text-danger mt-1 small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="fungsi-tabel ms-4 d-flex align-items-center gap-1">
                            <button type="submit" class="btn btn-success" form="formImport">
                                <i class="ti ti-upload me-1"></i> Upload Jadwal
                            </button>

                            <button class="btn btn-info" id="downloadTemplate">
                                <i class="ti ti-download me-1"></i> Unduh Template
                            </button>

                            <button class="btn btn-primary refreshTable">
                                <i class="ti ti-refresh me-1"></i> Refresh
                            </button>

                            @if (!$hasTest)
                                <button type="button" class="btn btn-danger text-nowrap" disabled>
                                    <i class="ti ti-trash me-1"></i> Kosongkan Jadwal
                                </button>
                            @else
                                <form id="formClearJadwal" action="{{ route('admin.test.clear.jadwal') }}" method="post"
                                    class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="type" value="praktik">
                                    <button type="button" class="btn btn-danger text-nowrap" id="clearJadwal">
                                        <i class="ti ti-trash me-1"></i> Kosongkan Jadwal
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <table class="test-practice-datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
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
        let table = $(".test-practice-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.test.praktik.data') }}",
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            pageLength: 10,
            // order: [
            //     [2, "asc"]
            // ],
            columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false,
                },
                {
                    data: "student.registration.no_pendaftaran",
                    name: "student.registration.no_pendaftaran"
                },
                {
                    data: "student.nama_lengkap",
                    name: "student.nama_lengkap"
                },
                {
                    data: "student.nisn",
                    name: "student.nisn"
                },
                {
                    data: "tanggal",
                    name: "tanggal"
                },
                {
                    data: "jam",
                    name: "jam"
                },
                {
                    data: "lokasi",
                    name: "lokasi"
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
            window.location.href = "{{ route('admin.test.download.template') }}";
        });

        $('#clearJadwal').on('click', function() {
            Swal.fire({
                titleText: "Yakin ingin mengosongkan jadwal tes praktik?",
                text: "Tindakan ini tidak dapat dibatalkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, kosongkan jadwal!",
                cancelButtonText: "Batal",
                confirmButtonColor: "#38c172",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#formClearJadwal').submit();
                }
            });
        });
    </script>
@endsection
