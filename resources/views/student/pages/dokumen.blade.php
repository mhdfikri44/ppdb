@extends('student.main', ['page' => 'Dokumen'])

@section('content')
    <h4 class="text-primary fw-bold mb-0">Unggah Dokumen</h4>
    <span class="fw-semibold">Silahkan unggah semua dokumen yang diperlukan.</span>

    <div class="kotak mt-3">
        <div class="item item1">
            {{-- Ilustrasi --}}
            <img src="{{ asset('assets/img/mts/Documents.png') }}" alt="ilustrasi dokumen" width="90%">
        </div>

        {{-- Dokumen sudah lengkap? --}}
        @if ($student->registration->status_dokumen)
            {{-- Informasi --}}
            <div class="item item2">
                <div class="alert alert-success border-success d-flex align-items-baseline mb-0" role="alert">
                    <span class="alert-icon alert-icon-lg me-2">
                        <i class="ti ti-lock ti-sm text-success"></i>
                    </span>
                    <div class="d-flex flex-column ps-1 text-dark">
                        @if ($student->registration->is_locked)
                            <h5 class="alert-heading mb-0">Kamu Sudah Konfrimasi !</h5>
                            <p class="mb-0">Tidak bisa mengubah atau mengganti dokumen</strong>.
                            </p>
                        @else
                            <h5 class="alert-heading mb-0">Dokumen sudah terkunci !</h5>
                            <p class="mb-0">Jika ingin mengubah atau mengganti dokumen, klik <strong>Buka kunci</strong>.
                            </p>
                        @endif

                    </div>
                </div>
            </div>

            {{-- Dokumen Utama --}}
            <div class="item item3">
                <div class="card">
                    <h5 class="card-header text-dark d-flex fw-bold pb-0">Dokumen Utama</h5>
                    <div class="card-body">

                        <div class="border-top border-bottom py-2 mt-3">
                            <label class="form-label fw-bold">
                                1. Pasfoto Latar Merah
                            </label>
                            @if (isset($docs['pasfoto']))
                                <a href="{{ route('student.file.show', $docs['pasfoto']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                2. Surat Keterangan Aktif Sekolah Asli
                            </label>
                            @if (isset($docs['suket_sekolah']))
                                <a href="{{ route('student.file.show', $docs['suket_sekolah']) }}" type="button" class="btn btn-info p-1"
                                    target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                3. Kartu Keluarga (KK) Asli
                            </label>
                            @if (isset($docs['kk']))
                                <a href="{{ route('student.file.show', $docs['kk']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                4. KTP Kedua Orang Tua Asli
                            </label>
                            @if (isset($docs['ktp']))
                                <a href="{{ route('student.file.show', $docs['ktp']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                5. Akta Kelahiran Asli
                            </label>
                            @if (isset($docs['akta']))
                                <a href="{{ route('student.file.show', $docs['akta']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                6. Kartu NISN Asli
                            </label>
                            @if (isset($docs['nisn']))
                                <a href="{{ route('student.file.show', $docs['nisn']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                7. Surat Keterangan Mengaji/Ijazah MDA/TPA Asli
                            </label>
                            @if (isset($docs['suket_ngaji']))
                                <a href="{{ route('student.file.show', $docs['suket_ngaji']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <h5 class="card-header text-dark d-flex fw-bold pb-0">Dokumen Pendukung</h5>
                    <div class="card-body">

                        <div class="border-top border-bottom py-2 mt-3">
                            <label class="form-label fw-bold">
                                1. Sertifikat Prestasi Akademik & Non Akademik Asli
                            </label>
                            @if (isset($docs['sertifikat']))
                                <a href="{{ route('student.file.show', $docs['sertifikat']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @else
                                <div class="btn btn-danger p-1">
                                    <i class="ti-xs ti ti-x"></i>
                                    <span class="ms-1">Tidak ada</span>
                                </div>
                            @endif
                        </div>

                        <div class="border-bottom py-2">
                            <label class="form-label fw-bold">
                                2. Kartu KIP/PKH Asli
                            </label>
                            @if (isset($docs['kartu']))
                                <a href="{{ route('student.file.show', $docs['kartu']) }}" type="button" class="btn btn-info p-1" target="_blank">
                                    <i class="ti-xs ti ti-eye"></i>
                                    <span class="ms-1">Lihat</span>
                                </a>
                            @else
                                <div class="btn btn-danger p-1">
                                    <i class="ti-xs ti ti-x"></i>
                                    <span class="ms-1">Tidak ada</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if (!$student->registration->is_locked)
                        <div class="p-4">
                            <form id="form-batal-kunci" action="{{ route('student.document.unlock', $student->id) }}" method="POST">
                                @csrf @method('PUT')
                                <button class="btn btn-danger w-100 waves-effect waves-light btn-batal-kunci" type="button">
                                    <span class="ti-xs ti ti-lock-open me-1"></span>Buka Kunci
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="item item4"></div>
        @else
            {{-- Informasi --}}
            <div class="item item2">
                <div class="alert alert-info border-info d-flex align-items-baseline mb-0" role="alert">
                    <span class="alert-icon alert-icon-lg me-2">
                        <i class="ti ti-info-circle ti-sm text-info"></i>
                    </span>
                    <div class="d-flex flex-column ps-1 text-dark">
                        {{-- <h5 class="alert-heading mb-2">Informasi Unggah Dokumen!</h5> --}}
                        <p class="mb-0">1. Tipe file yang dapat diunggah <strong>.pdf .png .jpg .jpeg</strong>.</p>
                        <p class="mb-0">2. Ukuran maksimal file <strong>2 mb</strong>.</p>
                        <p class="mb-0">3. Jika sudah unggah semua dokumen, <strong>kunci dokumen</strong>.</p>
                    </div>
                </div>
            </div>

            {{-- Dokumen Utama --}}
            <div class="item item3">
                <div class="card">
                    <h5 class="card-header text-dark d-flex pb-0">Dokumen Utama</h5>
                    <div class="card-body">

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'pasfoto']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    1. Pasfoto Latar Merah <span class="form-text text-danger fst-italic">*Wajib</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="pasfoto" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="pasfoto" name="pasfoto">

                                    @if (isset($docs['pasfoto']))
                                        <a href="{{ route('student.file.show', $docs['pasfoto']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('pasfoto')
                                    <div id="pasfoto" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'suket_sekolah']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    2. Surat Keterangan Aktif Sekolah Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="suket_sekolah" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="suket_sekolah" name="suket_sekolah">

                                    @if (isset($docs['suket_sekolah']))
                                        <a href="{{ route('student.file.show', $docs['suket_sekolah']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('suket_sekolah')
                                    <div id="suket_sekolah" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'kk']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    3. Kartu Keluarga (KK) Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="kk" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="kk" name="kk">

                                    @if (isset($docs['kk']))
                                        <a href="{{ route('student.file.show', $docs['kk']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('kk')
                                    <div id="kk" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'ktp']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    4. KTP Kedua Orang Tua Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="ktp" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="ktp" name="ktp">

                                    @if (isset($docs['ktp']))
                                        <a href="{{ route('student.file.show', $docs['ktp']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('ktp')
                                    <div id="ktp" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'akta']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    5. Akta Kelahiran Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="akta" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="akta" name="akta">

                                    @if (isset($docs['akta']))
                                        <a href="{{ route('student.file.show', $docs['akta']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('akta')
                                    <div id="akta" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'nisn']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    6. Kartu NISN Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                    <a href="https://nisn.data.kemendikdasmen.go.id/" target="_blank" class="form-text text-primary d-block mt-0">
                                        Download Kartu Disini
                                    </a>
                                </label>

                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="nisn" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="nisn" name="nisn">

                                    @if (isset($docs['nisn']))
                                        <a href="{{ route('student.file.show', $docs['nisn']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('nisn')
                                    <div id="nisn" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'suket_ngaji']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    7. Surat Keterangan Mengaji/Ijazah MDA/TPA Asli
                                    <span class="form-text text-danger fst-italic">*Wajib</span>
                                    <a href="{{ route('student.cetak.surat.mengaji') }}" target="_blank" class="form-text text-primary d-block mt-0">
                                        Download Format
                                    </a>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="suket_ngaji" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="suket_ngaji" name="suket_ngaji">

                                    @if (isset($docs['suket_ngaji']))
                                        <a href="{{ route('student.file.show', $docs['suket_ngaji']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('suket_ngaji')
                                    <div id="suket_ngaji" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Dokumen Pendukung --}}
            <div class="item item4">
                <div class="card">
                    <h5 class="card-header text-dark pb-0">Dokumen Pendukung</h5>
                    <div class="card-body">

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'sertifikat']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    1. Sertifikat Prestasi Akademik & Non Akademik Asli <span class="form-text text-primary fst-italic">*Jika ada</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="sertifikat" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="sertifikat" name="sertifikat">

                                    @if (isset($docs['sertifikat']))
                                        <a href="{{ route('student.file.show', $docs['sertifikat']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('sertifikat')
                                    <div id="sertifikat" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                        <form action="{{ route('student.upload', ['student' => $student->id, 'jenis' => 'kartu']) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label class="form-label fw-bold">
                                    2. Kartu KIP/PKH Asli <span class="form-text text-primary fst-italic">*Jika ada</span>
                                </label>
                                <div class="input-group">
                                    <!-- input file diganti dengan label (custom) -->
                                    <label for="kartu" class="file-name-box">Pilih file</label>
                                    <input type="file" class="d-none" id="kartu" name="kartu">

                                    @if (isset($docs['kartu']))
                                        <a href="{{ route('student.file.show', $docs['kartu']) }}" type="button" class="btn btn-info p-2"
                                            target="_blank">
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </a>
                                        <button type="submit" class="btn btn-warning p-2">
                                            <i class="ti-xs ti ti-replace"></i>
                                            <span class="d-none d-sm-inline ms-1 px-2"> Ganti</span>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-info p-2" disabled>
                                            <i class="ti-xs ti ti-eye"></i>
                                            <span class="d-none d-sm-inline ms-1">Lihat</span>
                                        </button>
                                        <button type="submit" class="btn btn-success p-2">
                                            <i class="ti-xs ti ti-upload"></i>
                                            <span class="d-none d-sm-inline ms-1">Unggah</span>
                                        </button>
                                    @endif
                                </div>
                                @error('kartu')
                                    <div id="kartu" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endif
    </div>

    @if (!$student->registration->status_dokumen)
        <div class="row">
            <div class="col mt-3">
                <div class="card">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 py-2 px-4">
                        @if (!$allDocsUploaded)
                            <span>
                                ⚠️ Dokumen belum lengkap untuk mengunci :
                                <strong>{{ $emptyDocs }}</strong> belum diunggah.
                            </span>
                            <button class="btn btn-primary waves-effect waves-light" type="submit" disabled>
                                <span class="ti-xs ti ti-lock me-1"></span>Kunci Dokumen
                            </button>
                        @else
                            <span>
                                ⚠️ Pastikan semua dokumen sudah benar dan sesuai.
                                Kunci dokumen untuk <strong>menyelesaikan unggah dokumen</strong>.
                            </span>
                            <form id="form-kunci" action="{{ route('student.document.lock', $student->id) }}" method="POST">
                                @csrf @method('PUT')
                                <button class="btn btn-primary waves-effect waves-light btn-kunci" type="button">
                                    <span class="ti-xs ti ti-lock me-1"></span>Kunci Dokumen
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
