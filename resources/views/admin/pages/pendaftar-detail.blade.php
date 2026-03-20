@extends('admin.main')

@section('content')
    <div class="d-flex justify-content-between align-items-start">
        <h4 class="fw-bold mb-4">
            <span class="text-muted fw-light">Admin / Data Pendaftar /</span> Detail
        </h4>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
            <i class="ti ti-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Data sekolah asal -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Data Sekolah Asal</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">NISN</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->nisn }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tahun lulus</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->tahun_lulus ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td td class="fw-bold">Asal sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->asal_sekolah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Alamat asal sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->alamat_asal_sekolah ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data pribadi -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Data Pribadi</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Nama lengkap</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">NIK</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->nik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Tempat, tanggal lahir</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->tempat_tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Jenis kelamin</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->jenis_kelamin_label ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Agama</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->religion->name ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td td class="fw-bold">Hobi</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->hobi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Cita-cita</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->cita_cita ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Prestasi</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->prestasi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Penyakit</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->penyakit ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data keluarga -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Data Keluarga</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Anak keberapa</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->anak_keberapa_label ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Jumlah saudara</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->jumlah_saudara ?? '-' }} Bersaudara</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Tempat tinggal</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->tempat_tinggal ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Transportasi ke sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->transportasi ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Jarak ke sekolah</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->jarak_tempuh ?? '-' }} KM</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Waktu ke sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->waktu_tempuh ?? '-' }} Menit</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">No. Kartu Keluarga (KK)</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->no_kk ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">No. KIP/PKH/KKS/KPS</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->no_kip_pkh_kks_kps ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Ayah -->
            <div class="row mt-4">
                <div class="col px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-primary fw-bold fs-6">Data Ayah</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Nama ayah</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nama_ayah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">NIK ayah</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nik_ayah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Tempat, tgl lahir ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->tempat_tanggal_lahir_ayah }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Pendidikan ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->fatherEducation->name ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Pekerjaan ayah</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->fatherJob->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Penghasilan ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->penghasilan_ayah_label }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">HP/WA ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->hp_ayah ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Keterangan ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->keterangan_ayah ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Ibu -->
            <div class="row mt-4">
                <div class="col px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-primary fw-bold fs-6">Data Ibu</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Nama ibu</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nama_ibu ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">NIK ibu</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nik_ibu ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Tempat, tgl lahir ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->tempat_tanggal_lahir_ibu }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Pendidikan ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->motherEducation->name ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Pekerjaan ibu</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->motherJob->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Penghasilan ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->penghasilan_ibu_label }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">HP/WA ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->hp_ibu ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Keterangan ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->keterangan_ibu ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Data Wali -->
            <div class="row mt-4">
                <div class="col px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-primary fw-bold fs-6">Data Wali</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Nama wali</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nama_wali ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Tempat, tgl lahir wali</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->tempat_tanggal_lahir_wali }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Pendidikan wali</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->waliEducation->name ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td class="fw-bold">Pekerjaan wali</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->waliJob->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Penghasilan wali</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->penghasilan_wali_label }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">HP/WA wali</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->hp_wali ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dokumen -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Dokumen</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">1. Pasfoto Latar Merah</span>
                    @if (isset($docs['pasfoto']))
                        <a href="{{ asset('storage/' . $docs['pasfoto']) }}" target="_blank"
                            class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">2. Surat Keterangan Aktif Sekolah Asli</span>
                    @if (isset($docs['suket_sekolah']))
                        <a href="{{ asset('storage/' . $docs['suket_sekolah']) }}" target="_blank"
                            class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">3. Kartu Keluarga (KK) Asli</span>
                    @if (isset($docs['kk']))
                        <a href="{{ asset('storage/' . $docs['kk']) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">4. KTP Kedua Orang Tua Asli</span>
                    @if (isset($docs['ktp']))
                        <a href="{{ asset('storage/' . $docs['ktp']) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">5. Akta Kelahiran Asli</span>
                    @if (isset($docs['akta']))
                        <a href="{{ asset('storage/' . $docs['akta']) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">6. Kartu NISN Asli</span>
                    @if (isset($docs['nisn']))
                        <a href="{{ asset('storage/' . $docs['nisn']) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">7. Surat Keterangan Mengaji/Ijazah MDA/TPA Asli</span>
                    @if (isset($docs['suket_ngaji']))
                        <a href="{{ asset('storage/' . $docs['suket_ngaji']) }}" target="_blank"
                            class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">8. Sertifikat Prestasi Akademik & Non Akademik Asli</span>
                    @if (isset($docs['sertifikat']))
                        <a href="{{ asset('storage/' . $docs['sertifikat']) }}" target="_blank"
                            class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">9. Kartu KIP/PKH Asli</span>
                    @if (isset($docs['kartu']))
                        <a href="{{ asset('storage/' . $docs['kartu']) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-info" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
            </ul>
        </div>
    </div>

    <div class="d-flex justify-content-end align-items-start">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
            <i class="ti ti-arrow-left"></i> Kembali
        </a>
    </div>
@endsection
