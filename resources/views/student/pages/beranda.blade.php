@extends('student.main', ['page' => 'Beranda'])

@section('content')
    <div class="text-center mb-4">
        <h2 class="text-primary fw-bold mb-0">Selamat Datang, {{ $student->nama_lengkap }}👋</h2>
        <span class="text-muted">Calon Peserta Didik Baru TP. 2026/2027</span>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6">

            <!-- Hasil Akhir -->
            @if ($status['is_result_publish'] && $student->registration->status_verifikasi == 'Disetujui')
                @if (!$student->registration->has_seen_result)
                    <style>
                        .btn-highlight {
                            position: relative;
                            animation: pulse 1.8s infinite;
                            box-shadow: 0 0 0 rgba(13, 110, 253, 0.7);
                            transition: all 0.3s ease;
                        }

                        /* efek pulse */
                        @keyframes pulse {
                            0% {
                                box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7);
                            }

                            70% {
                                box-shadow: 0 0 0 12px rgba(13, 110, 253, 0);
                            }

                            100% {
                                box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
                            }
                        }

                        /* hover biar lebih hidup */
                        .btn-highlight:hover {
                            transform: scale(1.05);
                            box-shadow: 0 0 15px rgba(13, 110, 253, 0.8);
                        }
                    </style>
                    <div class="text-center mb-4">
                        <form id="formResult" action="{{ route('student.lihat.hasil') }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-highlight">
                                Lihat Hasil Kelulusan
                            </button>
                        </form>
                    </div>

                    <script>
                        document.getElementById('formResult').addEventListener('submit', function(e) {
                            e.preventDefault();

                            Swal.fire({
                                title: 'Memproses Hasil...',
                                text: 'Mohon tunggu sebentar',
                                allowOutsideClick: false,
                                didOpen: () => Swal.showLoading()
                            });

                            setTimeout(() => {
                                @if ($student->registration->lulus == 1)
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Selamat! Anda LULUS 🎉',
                                        text: 'Selamat bergabung di keluarga besar MTsN 1 Kota Dumai.',
                                        confirmButtonText: 'Lanjut',
                                        confirmButtonColor: '#198754'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            e.target.submit();
                                        }
                                    });
                                @else
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Mohon Maaf',
                                        text: 'Anda dinyatakan belum lulus. Tetap semangat!',
                                        confirmButtonText: 'Tutup',
                                        confirmButtonColor: '#dc3545'
                                    }).then(() => {
                                        e.target.submit();
                                    });
                                @endif
                            }, 3000);
                        });
                    </script>
                @else
                    @if ($student->registration->lulus == 1)
                        <div class="col-12 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body d-flex align-items-center">
                                    <div class="me-3"> <i class="ti ti-confetti fs-1"></i> </div>
                                    <div>
                                        <h4 class="text-white mb-1">Selamat! Anda Dinyatakan LULUS</h4>
                                        <p class="mb-0">Tunggu informasi daftar ulang digrup WA.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($student->registration->lulus == 0)
                        <div class="col-12 mb-4">
                            <div class="card bg-danger text-white">
                                <div class="card-body d-flex align-items-center">
                                    <div class="me-3"> <i class="ti ti-mood-sad fs-1"></i> </div>
                                    <div>
                                        <h4 class="text-white mb-1">Mohon Maaf...</h4>
                                        <p class="mb-0">Anda dinyatakan belum lulus. Tetap semangat!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endif

            <!-- Status Pendaftaran -->
            <div
                class="card bg-label-{{ $status['pendaftaran']['warna'] }} border-{{ $status['pendaftaran']['warna'] }} border shadow mb-4 animate__animated animate__headShake">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <p class="fs-4 fw-bold mb-0">Status Pendaftaran</p>
                    <i class="ti ti-{{ $status['pendaftaran']['icon'] }} fs-2"></i>
                </div>
                <div class="card-body" id="konfirmasi">
                    <p class="fs-5 fw-bold mb-0">{{ $status['pendaftaran']['status'] }}</p>
                    <p class="card-text">{{ $status['pendaftaran']['ket'] }}</p>

                    @if ($alur['verifikasi'] == 'Disetujui')
                        <hr class="my-3 border-{{ $status['pendaftaran']['warna'] }}">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-4 text-center mb-3 mb-sm-0">
                                <div class="bg-white p-2 d-inline-block rounded shadow-sm border">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://chat.whatsapp.com/KE4drgvDKBL0HU9fuG3uTO"
                                        alt="QR WhatsApp" class="img-fluid" style="width: 100px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-8">
                                <p class="card-text">Scan <strong>barcode atau klik tombol di bawah</strong>
                                    untuk bergabung ke grup calon peserta didik baru.</p>
                                <a href="https://chat.whatsapp.com/KE4drgvDKBL0HU9fuG3uTO" target="_blank"
                                    class="btn btn-sm btn-success w-100 w-sm-auto">
                                    <i class="ti ti-brand-whatsapp me-1"></i> Gabung Sekarang
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <!-- /Status Pendaftaran -->

            <!-- User Profil -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <div class="avatar-frame rounded border mb-3 mt-4"
                                style="width: 108px; height: 158px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <img class="img-fluid" alt="Foto profil"
                                    style="width: 100%; height: 100%; object-fit: cover;" src="{{ $pasfotoUrl }}">
                            </div>
                            <div class="user-info text-center">
                                <h4 class="mb-0">{{ $student->nama_lengkap }}</h4>
                                <p class="mb-0 fw-semibold mt-4">No. Pendaftaran</p>
                                <span class="badge bg-label-primary fs-6">
                                    {{ $student->registration->no_pendaftaran ?? 'Belum konfirmasi' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mt-4 pb-3 border-bottom">
                        <div class="d-flex align-items-start gap-1">
                            <span class="badge bg-label-primary p-1 rounded">
                                <i class="ti ti-id-badge-2 ti-sm"></i>
                            </span>
                            <div>
                                <p class="mb-0 fw-semibold">Data Identitas</p>
                                <span
                                    class="badge bg-label-{{ $status['data'] == 'Lengkap' ? 'success' : 'danger' }} mt-1 px-2">
                                    {{ $status['data'] }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-1">
                            <span class="badge bg-label-primary p-1 rounded">
                                <i class="ti ti-briefcase ti-sm"></i></span>
                            <div>
                                <p class="mb-0 fw-semibold">Dokumen</p>
                                <span
                                    class="badge bg-label-{{ $status['dokumen'] == 'Lengkap' ? 'success' : 'danger' }} mt-1 px-2">
                                    {{ $status['dokumen'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="info-container mt-3">
                        <div class="d-flex flex-column gap-1">

                            @if (!$status['konfirmasi'])
                                @if ($status['data'] == 'Belum lengkap' || $status['dokumen'] == 'Belum lengkap')
                                    <button type="button" class="btn btn-success waves-effect waves-light" disabled>
                                        <span class="ti-xs ti ti-checkbox me-1"></span>Belum lengkap
                                    </button>
                                @else
                                    @if ($status['is_open'])
                                        <form id="form-konfirmasi" action="{{ route('student.confirm', $student->id) }}"
                                            method="POST">
                                            @csrf @method('PUT')
                                            <button type="button" id="btn-konfirmasi"
                                                class="btn btn-success waves-effect waves-light w-100">
                                                <span class="ti-xs ti ti-checkbox me-1"></span>Konfirmasi
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-success w-100" disabled>
                                            Pendaftaran Ditutup
                                        </button>
                                    @endif
                                @endif
                            @else
                                @if ($student->registration->status_verifikasi == 'Disetujui')
                                    <a href="{{ route('student.cetak.kartu.tes') }}"
                                        class="btn btn-warning waves-effect waves-light" target="_blank">
                                        <span class="ti-xs ti ti-printer me-1"></span>Cetak Kartu Tes
                                    </a>

                                    @if ($status['is_result_publish'])
                                        {{-- <a href="{{ route('student.cetak.formulir') }}" --}}
                                        <button class="btn btn-info waves-effect waves-light" target="_blank" disabled>
                                            <span class="ti-xs ti ti-printer me-1"></span>Cetak Formulir
                                        </button>
                                    @endif
                                @else
                                    <button type="button" class="btn btn-warning waves-effect waves-light" disabled>
                                        <span class="ti-xs ti ti-printer me-1"></span>Cetak Kartu Tes
                                    </button>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Profil -->
        </div>

        <!-- Alur Pendaftaran -->
        <div class="col-xl-8 col-lg-7 col-md-6">
            <div class="card mb-4">
                <h5 class="card-header fw-bold">Alur Pendaftaran</h5>
                <div class="card-body pb-0">
                    <ul class="timeline mt-3 mb-0">
                        <!-- 1. Buat Akun -->
                        <li class="timeline-item timeline-item-danger pb-3 border-left-dashed">
                            <span class="timeline-indicator timeline-indicator-danger">
                                <i class="ti ti-device-mobile"></i>
                            </span>
                            <div class="timeline-event border-top border-danger border-2 p-3">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Buat Akun Pendaftaran</h6>
                                    <span class="badge bg-label-success">Selesai</span>
                                </div>
                                <span>Akun berhasil dibuat. Selanjutnya, lengkapi data identitas untuk melanjutkan proses
                                    pendaftaran.</span>
                            </div>
                        </li>

                        <!-- 2. Isi Data Identitas -->
                        <li class="timeline-item timeline-item-info pb-3 border-left-dashed">
                            <span class="timeline-indicator timeline-indicator-info">
                                <i class="ti ti-pencil"></i>
                            </span>
                            <div class="timeline-event border-top border-info border-2 p-3">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Isi Data Identitas</h6>
                                    <span class="badge bg-label-{{ $alur['data'] == 'Selesai' ? 'success' : 'danger' }}">
                                        {{ $alur['data'] }}
                                    </span>
                                </div>
                                <span>Lengkapi data identitas dengan benar sebelum lanjut ke tahap berikutnya.</span>
                                <a href="{{ route('student.edit1') }}">Lengkapi sekarang.</a>
                            </div>
                        </li>

                        <!-- 3. Unggah Dokumen -->
                        <li class="timeline-item timeline-item-success pb-3 border-left-dashed">
                            <span class="timeline-indicator timeline-indicator-success">
                                <i class="ti ti-cloud-upload"></i>
                            </span>
                            <div class="timeline-event border-top border-success border-2 p-3">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Unggah Dokumen</h6>
                                    <span
                                        class="badge bg-label-{{ $alur['dokumen'] == 'Selesai' ? 'success' : 'danger' }}">
                                        {{ $alur['dokumen'] }}
                                    </span>
                                </div>
                                <span>Unggah dokumen pendukung sesuai ketentuan. Pastikan file jelas dan tidak kabur.</span>
                                <a href="{{ route('student.document') }}">Unggah sekarang.</a>
                            </div>
                        </li>

                        <!-- 4. Konfirmasi -->
                        <li class="timeline-item timeline-item-primary pb-3 border-left-dashed">
                            <span class="timeline-indicator timeline-indicator-primary">
                                <i class="ti ti-checks"></i>
                            </span>
                            <div class="timeline-event border-top border-primary border-2 p-3">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Konfirmasi Pendaftaran</h6>
                                    <span
                                        class="badge bg-label-{{ $alur['konfirmasi'] == 'Selesai' ? 'success' : 'danger' }}">
                                        {{ $alur['konfirmasi'] }}
                                    </span>
                                </div>
                                <span>
                                    Periksa kembali data dan dokumen kamu. Jika sudah yakin benar, tekan tombol <a
                                        href="#konfirmasi">Konfirmasi</a>
                                    untuk
                                    mengirim pendaftaran.
                                </span>
                            </div>
                        </li>

                        <!-- 5. Verifikasi -->
                        <li class="timeline-item timeline-item-warning pb-3 border-0">
                            <span class="timeline-indicator timeline-indicator-warning">
                                <i class="ti ti-bell"></i>
                            </span>
                            <div class="timeline-event border-top border-warning border-2 p-3">
                                <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Verifikasi Pendaftaran</h6>
                                    <span
                                        class="badge bg-label-{{ $alur['verifikasi'] == 'Disetujui' ? 'success' : 'danger' }}">
                                        {{ $alur['verifikasi'] }}
                                    </span>
                                </div>
                                <span>
                                    Pendaftaran kamu akan diverifikasi oleh panitia. Silakan tunggu hasil verifikasi yang
                                    akan diumumkan di halaman ini.
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Alur Pendaftaran -->
        </div>
    </div>

    @if (session('sukses-konfirmasi'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pesan = @json(session('sukses-konfirmasi'));
                Swal.fire({
                    title: 'Berhasil!',
                    text: pesan,
                    icon: 'success',
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <script>
        // ====== KONFIRMASI PENDAFTARAN (MODAL) ======
        const btn = document.getElementById('btn-konfirmasi');

        if (btn) {
            btn.addEventListener("click", function() {
                Swal.fire({
                    titleText: "Pernyataan Konfirmasi",
                    html: `
                        <p style="text-align: justify;">
                            Saya <b>{{ $student->nama_lengkap }}</b>, dengan ini menyatakan bahwa seluruh data yang saya kirimkan adalah benar sesuai kondisi aslinya, tanpa dibuat-buat, diubah, ataupun dimanipulasi.
                        </p>

                        <p style="text-align: justify;">
                            Dengan melakukan <b>Konfirmasi</b>, data yang dikirimkan akan dikunci untuk proses verifikasi oleh panitia madrasah dan tidak dapat diubah kembali (kecuali apabila ditolak atau alasan lain yang ditetapkan).
                        </p>

                        <div style="margin-top: 15px; text-align:left;">
                            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                                <input type="checkbox" id="setuju" style="transform: scale(1.3);" />
                                <span>Saya setuju dan mengikuti peraturan yang ada!</span>
                            </label>
                            <small style="color: red;">*Centang kotak di atas!</small>
                        </div>
                    `,
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Konfirmasi",
                    cancelButtonText: "Batal",
                    confirmButtonColor: "#38c172",
                    preConfirm: () => {
                        if (!document.getElementById("setuju").checked) {
                            Swal.showValidationMessage(
                                "Anda harus mencentang persetujuan."
                            );
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("form-konfirmasi").submit();
                    }
                });
            });
        }
    </script>
@endsection
