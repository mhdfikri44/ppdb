<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Formulir PPDB</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }

        .header {
            margin-bottom: 20px;
        }

        .section-title {
            background: #CAEDFB;
            padding: 5px 10px;
            margin: 15px 0 10px 0;
            font-weight: bold;
            text-transform: uppercase;
            border-left: 4px solid #0F9ED5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Menjaga lebar kolom tetap konsisten */
        }

        td {
            vertical-align: top;
            padding: 4px 0;
        }

        /* Pengaturan kolom agar rapi */
        .col-label {
            width: 30%;
        }

        .col-separator {
            width: 3%;
        }

        .col-value {
            width: 67%;
        }

        .dots-container {
            border-bottom: 1px dotted #000;
            display: block;
            min-height: 15px;
        }

        .mt-4 {
            margin-top: 40px;
        }

        .sub-label {
            font-weight: bold;
            /* color: #555; */
        }

        .section-sub {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    {{-- ================= KOP ================= --}}
    <div class="">
        <table style="width: 100%; border-bottom: 2px solid #000; padding-bottom: 10px;">
            <tr>
                <td width="20%" style="text-align: center;">
                    <img src="{{ public_path('assets/img/mts/logo-mts.png') }}" alt="Logo" width="100">
                </td>
                <td width="60%" style="text-align: center;">
                    <div style="font-size: 18px; font-weight: bold;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</div>
                    <div style="font-size: 16px; font-weight: bold;">KANTOR KEMENTERIAN AGAMA KOTA DUMAI</div>
                    <div style="font-size: 14px; font-weight: bold;">MADRASAH TSANAWIYAH NEGERI 1 KOTA DUMAI</div>
                    <div style="font-size: 12px; font-weight: bold;">Jalan Bukit Datuk Kota Dumai 28825</div>
                    <div style="font-size: 12px; font-weight: bold;">Email : mtsn_dumai@yahoo.co.id</div>
                </td>
                <td width="20%"></td>
            </tr>
        </table>
    </div>

    <div class="header text-center fw-bold">
        <div style="font-size: 14px;">FORMULIR</div>
        <div style="font-size: 14px;">PENERIMAAN MURID BARU MADRASAH (PMBM)</div>
        <div style="font-size: 14px;">TAHUN AJARAN 2026/2027</div>
    </div>

    {{-- ================= IDENTITAS PESERTA DIDIK ================= --}}
    <div class="section-title">IDENTITAS PESERTA DIDIK</div>
    <table>
        <tr>
            <td class="col-label">1. Nama lengkap</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->nama_lengkap }}</span></td>
        </tr>
        <tr>
            <td class="col-label">2. NISN</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->nisn }}</span></td>
        </tr>
        <tr>
            <td class="col-label">3. NIK</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->nik }}</span></td>
        </tr>
        <tr>
            <td class="col-label">4. Tempat, tanggal lahir</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->tempat_tanggal_lahir }}</span></td>
        </tr>
        <tr>
            <td class="col-label">5. Jenis kelamin</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span
                    class="dots-container">{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span></td>
        </tr>
        <tr>
            <td class="col-label">6. Agama</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->religion->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">7. Hobi</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->hobby->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">8. Cita-cita</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->dream->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">9. Tahun lulus</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->tahun_lulus }}</span></td>
        </tr>
        <tr>
            <td class="col-label">10. Asal sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->asal_sekolah }}</span></td>
        </tr>
        <tr>
            <td class="col-label">11. Alamat asal sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->alamat_asal_sekolah }}</span></td>
        </tr>
        <tr>
            <td class="col-label">12. Yang membiayai sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->funder->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">13. Prestasi</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->prestasi ?? '-' }}</span></td>
        </tr>
        <tr>
            <td class="col-label">14. Penyakit</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->penyakit ?? '-' }}</span></td>
        </tr>
    </table>

    {{-- ================= DATA RUMAH ================= --}}
    <div class="section-title">DATA RUMAH & KELUARGA</div>
    <table>
        <tr>
            <td class="col-label">1. No. KK</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->no_kk }}</span></td>
        </tr>
        <tr>
            <td class="col-label">2. Alamat</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->alamat }}</span></td>
        </tr>
        <tr>
            <td class="col-label">3. Status kepemilikan rumah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->houseStatus->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">4. Anak ke-</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->anak_keberapa_label }}</span></td>
        </tr>
        <tr>
            <td class="col-label">5. Jumlah saudara</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->jumlah_saudara . ' Bersaudara' }}</span></td>
        </tr>
        <tr>
            <td class="col-label">6. Transportasi ke sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->transportasi }}</span></td>
        </tr>
        <tr>
            <td class="col-label">7. Jarak tempuh ke sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->jarak_tempuh . ' Km' }}</span></td>
        </tr>
        <tr>
            <td class="col-label">8. Waktu tempuh ke sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->waktu_tempuh . ' Menit' }}</span></td>
        </tr>
    </table>

    {{-- ================= ORANG TUA ================= --}}
    <div class="section-title">IDENTITAS ORANG TUA</div>
    <h4 class="section-sub">AYAH KANDUNG</h4>
    <table>
        <tr>
            <td class="col-label">Nama</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->nama_ayah }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">NIK</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->nik_ayah }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">Tempat, tanggal lahir</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->tempat_tanggal_lahir_ayah }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">Pendidikan</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->fatherEducation->name }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">Pekerjaan</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->fatherOccupation->name }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">Penghasilan</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->penghasilan_ayah_label }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">No. HP</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->no_hp_ayah }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="col-label">Status</td>
            <td class="col-separator">:</td>
            <td class="col-value">
                <span class="dots-container">
                    {{ $data->guardian->fatherOccupation->name }}
                </span>
            </td>
        </tr>
    </table>

    <h4 class="section-sub">IBU KANDUNG</h4>
    <table>
        <tr>
            <td class="col-label">Nama Ibu</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->guardian->nama_ibu }}</span></td>
        </tr>
        <tr>
            <td class="col-label">No. HP Ibu</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->guardian->hp_ibu }}</span></td>
        </tr>
    </table>

    {{-- ================= TTD ================= --}}
    <div class="mt-4">
        <table style="text-align: center;">
            <tr>
                <td width="50%">
                    Mengetahui,<br>
                    Kepala Sekolah<br><br><br><br>
                    <strong>( ______________________ )</strong>
                </td>
                <td width="50%">
                    Pendaftar/Orang Tua,<br><br><br><br><br>
                    <strong>( {{ $data->nama_lengkap }} )</strong>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
