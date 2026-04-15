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
                                    <td class="fw-bold">NISN</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->nisn }}</td>
                                </tr>
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
                                <tr>
                                    <td td class="fw-bold">Hobi</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->hobby->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Cita-cita</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->dream->name ?? '-' }}</td>
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
                                    <td class="fw-bold">Tahun lulus</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->tahun_lulus ?? '-' }}</td>
                                </tr>
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
                                <tr>
                                    <td td class="fw-bold">Prestasi</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->prestasi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Yang membiayai sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->funder->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Penyakit</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->penyakit ?? '-' }}</td>
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
        </div>
    </div>

    <!-- Data orang tua -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Data Orang Tua</h5>
        </div>
        <div class="card-body">
            <!-- Data Ayah -->
            <div class="row">
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
                                    <td td class="fw-bold">Status ayah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->fatherStatus->name ?? '-' }}</td>
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
                                    <td td class="fw-bold">Status ibu</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->motherStatus->name ?? '-' }}</td>
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
                                    <td class="fw-bold">NIK wali</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->guardian->nik_wali ?? '-' }}</td>
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

    <!-- Data rumah & keluarga -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary fw-bold mb-0">Data Rumah & Keluarga</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 px-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td td class="fw-bold">No. Kartu Keluarga (KK)</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->no_kk ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Alamat rumah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Status kepemilikan rumah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->houseStatus->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Anak keberapa</td>
                                    <td class="fw-bold">:</td>
                                    <td>{{ $student->anak_keberapa_label ?? '-' }}</td>
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
                                    <td td class="fw-bold">Jumlah saudara</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->jumlah_saudara ?? '-' }} Bersaudara</td>
                                </tr>
                                <tr>
                                    <td td class="fw-bold">Transportasi ke sekolah</td>
                                    <td td class="fw-bold">:</td>
                                    <td>{{ $student->transportasi ?? '-' }}</td>
                                </tr>
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
                        <a href="{{ route('student.file.show', $docs['pasfoto']->path) . '?v=' . $docs['pasfoto']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">2. Surat Keterangan Aktif Sekolah Asli</span>
                    @if (isset($docs['suket_sekolah']))
                        <a href="{{ route('student.file.show', $docs['suket_sekolah']->path) . '?v=' . $docs['suket_sekolah']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">3. Kartu Keluarga (KK) Asli</span>
                    @if (isset($docs['kk']))
                        <a href="{{ route('student.file.show', $docs['kk']->path) . '?v=' . $docs['kk']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">4. KTP Kedua Orang Tua Asli</span>
                    @if (isset($docs['ktp']))
                        <a href="{{ route('student.file.show', $docs['ktp']->path) . '?v=' . $docs['ktp']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">5. Akta Kelahiran Asli</span>
                    @if (isset($docs['akta']))
                        <a href="{{ route('student.file.show', $docs['akta']->path) . '?v=' . $docs['akta']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">6. Kartu NISN Asli</span>
                    @if (isset($docs['nisn']))
                        <a href="{{ route('student.file.show', $docs['nisn']->path) . '?v=' . $docs['nisn']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">7. Surat Keterangan Mengaji/Ijazah MDA/TPA Asli</span>
                    @if (isset($docs['suket_ngaji']))
                        <a href="{{ route('student.file.show', $docs['suket_ngaji']->path) . '?v=' . $docs['suket_ngaji']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">8. Sertifikat Prestasi Akademik & Non Akademik Asli</span>
                    @if (isset($docs['sertifikat']))
                        <a href="{{ route('student.file.show', $docs['sertifikat']->path) . '?v=' . $docs['sertifikat']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
                            <i class="ti ti-file"></i> Lihat
                        </button>
                    @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">9. Kartu KIP/PKH Asli</span>
                    @if (isset($docs['kartu']))
                        <a href="{{ route('student.file.show', $docs['kartu']->path) . '?v=' . $docs['kartu']->updated_at->timestamp }}"
                            target="_blank" class="btn btn-sm btn-info">
                            <i class="ti ti-file"></i> Lihat
                        </a>
                    @else
                        <button class="btn btn-sm btn-secondary" disabled>
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
