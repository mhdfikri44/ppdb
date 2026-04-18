@extends('admin.main')

@section('content')
    <h4 class="fw-bold mb-4">
        <span class="text-muted fw-light">Admin / Data Pendaftar /</span> Verifikasi & Revisi
    </h4>

    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Pendaftar yang Perlu Verifikasi</h5>
                        <button class="btn btn-primary refreshTable" data-target="confirm">
                            <i class="ti ti-refresh me-1"></i> Refresh
                        </button>
                    </div>
                    <table class="student-confirm-datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Waktu Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- datatable ditolak --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Pendaftar yang Perlu Revisi</h5>
                        <button class="btn btn-primary refreshTable" data-target="rejected">
                            <i class="ti ti-refresh me-1"></i> Refresh
                        </button>
                    </div>
                    <table class="student-rejected-datatable table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Hp Ayah</th>
                                <th>Hp Ibu</th>
                                <th>Alasan Penolakan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="mb-2"><i class="ti-xl ti ti-shield-check text-primary me-2"></i>Verifikasi Pendaftar
                        </h3>
                        <p class="text-muted small">Silakan periksa data input pendaftar dengan dokumen yang dilampirkan.
                        </p>
                    </div>

                    <div class="row align-items-start">

                        <div class="col-8 border-end">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" id="tab-siswa-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab-siswa">
                                            <i class="ti ti-user me-1"></i> Data Pendaftar
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" id="tab-dokumen-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab-dokumen">
                                            <i class="ti ti-file-text me-1"></i> Dokumen
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content shadow-none border-0 px-1">

                                    <div class="tab-pane fade show active" id="tab-siswa" role="tabpanel">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="bg-lighter p-2 rounded">
                                                    <small class="text-muted d-block small fw-bold">Nomor
                                                        Pendaftaran</small>
                                                    <span id="v-no-pendaftaran" class="fw-bold text-primary fs-5">-</span>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0 text-primary"><i class="ti ti-user me-2"></i>Data
                                                        Pribadi</h6>
                                                    <div class="flex-grow-1 border-bottom ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">NISN</small>
                                                <span id="v-nisn" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Nama</small>
                                                <span id="v-nama" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">NIK</small>
                                                <span id="v-nik" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Tempat, tanggal
                                                    lahir</small>
                                                <span id="v-ttl" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Jenis kelamin</small>
                                                <span id="v-jenis-kelamin" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Agama</small>
                                                <span id="v-agama" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Hobi</small>
                                                <span id="v-hobi" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Cita-cita</small>
                                                <span id="v-cita2" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Tahun Lulus</small>
                                                <span id="v-tahun-lulus" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Asal Sekolah</small>
                                                <span id="v-asal-sekolah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Alamat Asal Sekolah</small>
                                                <span id="v-alamat-asal-sekolah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Yang Membiayai
                                                    Sekolah</small>
                                                <span id="v-funder" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Prestasi</small>
                                                <span id="v-prestasi" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Penyakit</small>
                                                <span id="v-penyakit" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">No. KIP/PKH/KKS/KPS</small>
                                                <span id="v-no-kip-dll" class="fw-medium text-dark">-</span>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0 text-primary"><i class="ti ti-home me-2"></i>Data
                                                        Rumah & Keluarga</h6>
                                                    <div class="flex-grow-1 border-bottom ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">No. Kartu Keluarga</small>
                                                <span id="v-no-kk" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Alamat Rumah</small>
                                                <span id="v-alamat" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Status Kepemilikan
                                                    Rumah</small>
                                                <span id="v-status-rumah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Anak Keberapa</small>
                                                <span id="v-anak-keberapa" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Jumlah Saudara</small>
                                                <span id="v-jumlah-saudara" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Transportasi
                                                    Ke Sekolah</small>
                                                <span id="v-transportasi" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Jarak Tempuh
                                                    Ke Sekolah</small>
                                                <span id="v-jarak" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Waktu Tempuh
                                                    Ke Sekolah</small>
                                                <span id="v-waktu" class="fw-medium text-dark">-</span>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0 text-primary"><i class="ti ti-user me-2"></i>Data Ayah
                                                    </h6>
                                                    <div class="flex-grow-1 border-bottom ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Nama Ayah</small>
                                                <span id="v-nama-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">NIK Ayah</small>
                                                <span id="v-nik-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Tempat, tanggal lahir
                                                    Ayah</small>
                                                <span id="v-ttl-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pendidikan Ayah</small>
                                                <span id="v-pendidikan-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pekerjaan Ayah</small>
                                                <span id="v-pekerjaan-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Penghasilan Ayah</small>
                                                <span id="v-penghasilan-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">No. HP/WA Ayah</small>
                                                <span id="v-hp-ayah" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Status Ayah</small>
                                                <span id="v-keterangan-ayah" class="fw-medium text-dark">-</span>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0 text-primary"><i class="ti ti-user me-2"></i>Data Ibu
                                                    </h6>
                                                    <div class="flex-grow-1 border-bottom ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Nama Ibu</small>
                                                <span id="v-nama-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">NIK Ibu</small>
                                                <span id="v-nik-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Tempat, tanggal lahir
                                                    Ibu</small>
                                                <span id="v-ttl-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pendidikan Ibu</small>
                                                <span id="v-pendidikan-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pekerjaan Ibu</small>
                                                <span id="v-pekerjaan-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Penghasilan Ibu</small>
                                                <span id="v-penghasilan-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">No. HP/WA Ibu</small>
                                                <span id="v-hp-ibu" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Status Ibu</small>
                                                <span id="v-keterangan-ibu" class="fw-medium text-dark">-</span>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0 text-primary"><i class="ti ti-user me-2"></i>Data Wali
                                                    </h6>
                                                    <div class="flex-grow-1 border-bottom ms-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Nama Wali</small>
                                                <span id="v-nama-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">NIK Wali</small>
                                                <span id="v-nik-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Tempat, tanggal lahir
                                                    Wali</small>
                                                <span id="v-ttl-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pendidikan Wali</small>
                                                <span id="v-pendidikan-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Pekerjaan Wali</small>
                                                <span id="v-pekerjaan-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">Penghasilan Wali</small>
                                                <span id="v-penghasilan-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                            <div class="col-6">
                                                <small class="text-muted d-block small fw-bold">No. HP/WA Wali</small>
                                                <span id="v-hp-wali" class="fw-medium text-dark">-</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab-dokumen" role="tabpanel">
                                        <div class="list-group list-group-flush">
                                            <!-- Pas Foto -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-photo me-2"></i>
                                                    <span>Pas Foto</span>
                                                </div>
                                                <button data-type="pasfoto" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Surat Keterangan Aktif Sekolah -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-file-description me-2"></i>
                                                    <span>Surat Keterangan Aktif Sekolah</span>
                                                </div>
                                                <button data-type="suket_sekolah" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Kartu Keluarga -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-file-text me-2"></i>
                                                    <span>Kartu Keluarga</span>
                                                </div>
                                                <button data-type="kk" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- KTP Kedua Orang Tua -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-id me-2"></i>
                                                    <span>KTP Kedua Orang Tua</span>
                                                </div>
                                                <button data-type="ktp" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Akta Kelahiran -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-certificate me-2"></i>
                                                    <span>Akta Kelahiran</span>
                                                </div>
                                                <button data-type="akta" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Kartu NISN -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-credit-card me-2"></i>
                                                    <span>Kartu NISN</span>
                                                </div>
                                                <button data-type="nisn" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Surat Keterangan Mengaji -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-book me-2"></i>
                                                    <span>Surat Keterangan Mengaji</span>
                                                </div>
                                                <button data-type="suket_ngaji" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Sertifikat Prestasi -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-award me-2"></i>
                                                    <span>Sertifikat Prestasi Akademik & Non Akademik</span>
                                                </div>
                                                <button data-type="sertifikat" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>

                                            <!-- Kartu KIP / PKH -->
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="ti ti-wallet me-2"></i>
                                                    <span>Kartu KIP / PKH</span>
                                                </div>
                                                <button data-type="kartu" data-src="" type="button"
                                                    class="btn btn-sm btn-info btn-preview-doc">
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="bg-lighter p-3 rounded shadow-none border">
                                <h5 class="mb-3"><i class="ti ti-gavel me-1"></i>Keputusan Admin</h5>

                                <form id="form-verifikasi" data-url="{{ route('admin.student.verify', ':id') }}"
                                    action="" method="POST">
                                    @csrf @method('PUT')
                                    <div class="mb-3">
                                        <div class="btn-group w-100 mb-3" role="group">
                                            <input type="radio" class="btn-check" name="status_verifikasi"
                                                id="terima" value="Disetujui" />
                                            <label class="btn btn-outline-success" for="terima">Terima</label>

                                            <input type="radio" class="btn-check" name="status_verifikasi"
                                                id="tolak" value="Ditolak" />
                                            <label class="btn btn-outline-danger" for="tolak">Tolak</label>
                                        </div>

                                        <div class="mb-3" id="kotak-pesan" style="display: none;">
                                            <label class="form-label fw-bold" for="pesan_ditolak">Alasan ditolak</label>
                                            <textarea class="form-control max-255" id="pesan_ditolak" name="pesan_ditolak" rows="3"
                                                placeholder="Tulis alasan ..."></textarea>
                                            <div class="invalid-feedback">
                                                Alasan penolakan wajib diisi.
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="ti ti-device-floppy me-1"></i>Simpan Keputusan
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('datatable-script')
    <script>
        // datatable untuk pendaftar yang perlu diverifikasi
        let tableConfirm = $(".student-confirm-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.student.confirm.data') }}",
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50]
            ],
            pageLength: 10,
            order: [
                [4, "asc"]
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
                    data: "tgl_konfirmasi",
                    name: "registration.locked_at"
                },
                {
                    data: "aksi",
                    name: "aksi",
                    orderable: false,
                    searchable: false
                },
            ],

            drawCallback: function() {
                $(document).off('change', 'input[name="status_verifikasi"]').on('change',
                    'input[name="status_verifikasi"]',
                    function() {
                        if ($(this).val() === 'Ditolak') {
                            $('#kotak-pesan').stop(true, true).slideDown();
                            // $('#pesan_ditolak').prop('required', true);
                        } else {
                            $('#kotak-pesan').stop(true, true).slideUp();
                            $('#pesan_ditolak').removeClass('is-invalid');
                            $('#pesan_ditolak').prop('required', false).val('');
                        }
                    });

                $('#form-verifikasi').on('submit', function(e) {
                    let status = $('input[name="status_verifikasi"]:checked').val();
                    let pesan = $('#pesan_ditolak').val().trim();

                    // Jika belum pilih status
                    if (!status) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Status belum dipilih',
                            text: 'Silakan pilih status verifikasi terlebih dahulu.',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }

                    // Jika pilih Ditolak tapi alasan kosong
                    if (status === 'Ditolak' && pesan === '') {
                        e.preventDefault();
                        $('#pesan_ditolak').addClass('is-invalid');
                    } else {
                        $('#pesan_ditolak').removeClass('is-invalid');
                    }

                });

                $('#modalVerifikasi').on('shown.bs.modal', function() {
                    const firstTab = new bootstrap.Tab(
                        document.querySelector('#tab-siswa-tab')
                    );
                    firstTab.show();
                });

                $(document).on('click', '.btn-verifikasi', function() {
                    let nisn = $(this).data('nisn');

                    // RESET FORM DI AWAL sebelum isi data baru
                    $('#form-verifikasi')[0].reset();
                    $('#kotak-pesan').hide();
                    $('#pesan-ditolak').prop('required', false);

                    $.get('/admin/student/' + nisn + '/detail/json', function(res) {
                        // 1. Data Pribadi
                        $('#v-no-pendaftaran').text(res.registration.no_pendaftaran);

                        $('#v-nisn').text(res.nisn);
                        $('#v-nama').text(res.nama_lengkap);
                        $('#v-nik').text(res.nik);
                        $('#v-ttl').text(res.tempat_tanggal_lahir);
                        $('#v-jenis-kelamin').text(res.jenis_kelamin_label);
                        $('#v-agama').text(res.religion?.name);
                        $('#v-hobi').text(res.hobby?.name);
                        $('#v-cita2').text(res.dream?.name);
                        $('#v-tahun-lulus').text(res.tahun_lulus);
                        $('#v-asal-sekolah').text(res.asal_sekolah);
                        $('#v-alamat-asal-sekolah').text(res.alamat_asal_sekolah);
                        $('#v-funder').text(res.funder?.name);
                        $('#v-prestasi').text(res.prestasi ?? '-');
                        $('#v-penyakit').text(res.penyakit ?? '-');
                        $('#v-no-kip-dll').text(res.no_kip_pkh_kks_kps ?? '-');

                        // 2. Data Rumah & Keluarga
                        $('#v-no-kk').text(res.no_kk);
                        $('#v-alamat').text(res.alamat);
                        $('#v-status-rumah').text(res.house_status?.name);
                        $('#v-anak-keberapa').text(res.anak_keberapa_label);
                        $('#v-jumlah-saudara').text(res.jumlah_saudara + ' Bersaudara');
                        $('#v-transportasi').text(res.transportasi);
                        $('#v-jarak').text(res.jarak_tempuh + ' KM');
                        $('#v-waktu').text(res.waktu_tempuh + ' Menit');

                        // 3. Data Orang Tua
                        $('#v-nama-ayah').text(res.guardian.nama_ayah);
                        $('#v-nik-ayah').text(res.guardian.nik_ayah);
                        $('#v-ttl-ayah').text(res.guardian.tempat_tanggal_lahir_ayah);
                        $('#v-pendidikan-ayah').text(res.guardian.father_education?.name);
                        $('#v-pekerjaan-ayah').text(res.guardian.father_job?.name);
                        $('#v-penghasilan-ayah').text(res.guardian.penghasilan_ayah_label);
                        $('#v-hp-ayah').text(res.guardian.hp_ayah);
                        $('#v-keterangan-ayah').text(res.guardian.father_status?.name);

                        $('#v-nama-ibu').text(res.guardian.nama_ibu);
                        $('#v-nik-ibu').text(res.guardian.nik_ibu);
                        $('#v-ttl-ibu').text(res.guardian.tempat_tanggal_lahir_ibu);
                        $('#v-pendidikan-ibu').text(res.guardian.mother_education?.name);
                        $('#v-pekerjaan-ibu').text(res.guardian.mother_job?.name);
                        $('#v-penghasilan-ibu').text(res.guardian.penghasilan_ibu_label);
                        $('#v-hp-ibu').text(res.guardian.hp_ibu);
                        $('#v-keterangan-ibu').text(res.guardian.mother_status?.name);

                        $('#v-nama-wali').text(res.guardian?.nama_wali ?? '-');
                        $('#v-nik-wali').text(res.guardian?.nik_wali ?? '-');
                        $('#v-ttl-wali').text(res.guardian?.tempat_tanggal_lahir_wali);
                        $('#v-pendidikan-wali').text(res.guardian?.wali_education?.name);
                        $('#v-pekerjaan-wali').text(res.guardian?.wali_job?.name);
                        $('#v-penghasilan-wali').text(res.guardian?.penghasilan_wali_label);
                        $('#v-hp-wali').text(res.guardian?.hp_wali ?? '-');

                        // Proses tombol dokumen
                        const docs = res.documents || [];
                        const baseUrl = "{{ url('student/view') }}";

                        $('.btn-preview-doc').each(function() {
                            let btn = $(this);
                            let type = btn.data('type');
                            let foundDoc = docs.find(d => d.jenis_dokumen === type);

                            if (foundDoc && foundDoc.path) {
                                // Gabungkan Base URL dengan path dari database
                                // Hasilnya: domain.com/storage/view/document/pasfoto/file.png
                                let fullUrl = baseUrl + '/' + foundDoc.path + '?v=' +
                                    new Date(foundDoc.updated_at).getTime();

                                btn.prop('disabled', false)
                                    .data('src', fullUrl)
                                    .removeClass('btn-secondary')
                                    .addClass('btn-info');
                            } else {
                                btn.prop('disabled', true)
                                    .removeClass('btn-info')
                                    .addClass('btn-secondary')
                                    .data('src', '');
                            }
                        });

                        // Set Action URL
                        let tempRoute = $('#form-verifikasi').data('url');
                        let realRoute = tempRoute.replace(':id', res.id);
                        $('#form-verifikasi').attr('action', realRoute);

                    }).fail(function() {
                        alert('Gagal mengambil data. Silakan coba lagi.');
                    });
                });

                $(document).on('click', '.btn-preview-doc', function() {
                    const path = $(this).data('src');
                    if (path) window.open(path, '_blank');
                });
            }
        });

        // datatable untuk pendaftar yang ditolak
        let tableRejected = $(".student-rejected-datatable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.student.rejected.data') }}",
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
                    data: "guardian.hp_ayah",
                    name: "guardian.hp_ayah"
                },
                {
                    data: "guardian.hp_ibu",
                    name: "guardian.hp_ibu"
                },
                {
                    data: "registration.rejected_message",
                    name: "registration.rejected_message"
                },

            ],

            drawCallback: function() {
                //
            }
        });

        tableConfirm.on('draw.dt', function() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                new bootstrap.Tooltip(el);
            });
        });
        tableRejected.on('draw.dt', function() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                new bootstrap.Tooltip(el);
            });
        });

        $('.refreshTable').on('click', function() {
            tableConfirm.ajax.reload(null, false);
            tableRejected.ajax.reload(null, false);
        });
    </script>
@endsection
