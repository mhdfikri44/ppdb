<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Formulir PPDB</title>
    <style>
        @page {
            margin-top: 9mm;
            margin-bottom: 9mm;
        }

        body {
            font-family: sans-serif;
            font-size: 13px;
            /* Sedikit dikecilkan agar muat dengan foto */
            line-height: 1.2;
            color: #333;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .header {
            margin-bottom: 10px;
        }

        .section-title {
            background: #CAEDFB;
            padding: 5px 10px;
            margin: 15px 0 10px 0;
            font-weight: bold;
            text-transform: uppercase;
            border-left: 4px solid #0F9ED5;
            clear: both;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            vertical-align: top;
            padding: 3px 0;
        }

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
            min-height: 14px;
        }

        /* Styling Foto */
        .photo-box {
            float: right;
            width: 113px;
            /* Ukuran 3x4 (kira-kira) */
            height: 151px;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 151px;
            margin-left: 15px;
            background: #f9f9f9;
            color: #999;
            font-size: 10px;
        }

        .mt-4 {
            margin-top: 30px;
        }

        .section-sub {
            margin: 10px 0 5px 0;
            font-size: 13px;
        }

        .no-pendaftaran {
            font-size: 14px;
            margin-top: 10px;
            border: 1px solid #000;
            display: inline-block;
            padding: 5px 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    {{-- ================= KOP ================= --}}
    <div class="">
        <table style="width: 100%; border-bottom: 2px solid #000; padding-bottom: 10px;">
            <tr>
                <td width="20%" style="text-align: center;">
                    <img src="{{ public_path('assets/img/mts/logo-mts.png') }}" alt="Logo" width="80">
                </td>
                <td width="60%" style="text-align: center;">
                    <div style="font-size: 18px; font-weight: bold;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</div>
                    <div style="font-size: 16px; font-weight: bold;">KANTOR KEMENTERIAN AGAMA KOTA DUMAI</div>
                    <div style="font-size: 14px; font-weight: bold;">MADRASAH TSANAWIYAH NEGERI 1 KOTA DUMAI</div>
                    <div style="font-size: 11px; font-weight: bold;">Jalan Bukit Datuk Kota Dumai 28825</div>
                    <div style="font-size: 11px; font-weight: bold;">Email : mtsn_dumai@yahoo.co.id</div>
                </td>
                <td width="20%"></td>
            </tr>
        </table>
    </div>

    <div class="header text-center fw-bold">
        <div style="font-size: 14px; margin-top: 10px;">FORMULIR PENERIMAAN MURID BARU MADRASAH (PMBM)</div>
        <div style="font-size: 14px;">TAHUN AJARAN 2026/2027</div>

        <div class="no-pendaftaran">
            NO. PENDAFTARAN : {{ $data->no_pendaftaran ?? '........' }}
        </div>
    </div>

    {{-- ================= IDENTITAS PESERTA DIDIK ================= --}}
    <div class="section-title">IDENTITAS PESERTA DIDIK</div>

    <div class="photo-box">
        @if ($data->foto)
            <img src="{{ public_path('storage/' . $data->foto) }}" width="100%" height="100%">
        @else
            PAS FOTO 3X4
        @endif
    </div>

    <table style="width: 75%;">
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
            <td class="col-label">4. Tempat, Tgl Lahir</td>
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
            <td class="col-label">7. Asal sekolah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->asal_sekolah }}</span></td>
        </tr>
    </table>

    <table style="clear: both; margin-top: 5px;">
        <tr>
            <td class="col-label">8. Hobi</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->hobby->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">9. Cita-cita</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->dream->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">10. Tahun lulus</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->tahun_lulus }}</span></td>
        </tr>
    </table>

    {{-- ================= DATA RUMAH ================= --}}
    <div class="section-title">DATA RUMAH & KELUARGA</div>
    <table>
        <tr>
            <td class="col-label">1. No. KK / Alamat</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->no_kk }} / {{ $data->alamat }}</span></td>
        </tr>
        <tr>
            <td class="col-label">2. Status Rumah</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->houseStatus->name }}</span></td>
        </tr>
        <tr>
            <td class="col-label">3. Anak Ke / Sdr</td>
            <td class="col-separator">:</td>
            <td class="col-value"><span class="dots-container">{{ $data->anak_keberapa_label }} dari
                    {{ $data->jumlah_saudara }} bersaudara</span></td>
        </tr>
    </table>

    {{-- ================= ORANG TUA ================= --}}
    <div class="section-title" style="margin-top: 10px;">IDENTITAS ORANG TUA / WALI</div>
    <table style="width: 100%;">
        <tr>
            <td width="50%" style="padding-right: 20px;">
                <h4 class="section-sub">AYAH KANDUNG</h4>
                <table>
                    <tr>
                        <td width="35%">Nama</td>
                        <td>: {{ $data->guardian->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: {{ $data->guardian->fatherJob->name }}</td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td>: {{ $data->guardian->hp_ayah }}</td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <h4 class="section-sub">IBU KANDUNG</h4>
                <table>
                    <tr>
                        <td width="35%">Nama</td>
                        <td>: {{ $data->guardian->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: {{ $data->guardian->motherJob->name }}</td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td>: {{ $data->guardian->hp_ibu }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ================= TTD ================= --}}
    <div class="mt-4">
        <table style="text-align: center;">
            <tr>
                <td colspan="2" style="text-align: right; padding-bottom: 10px;">
                    Dumai, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    Calon Siswa Baru,<br><br><br><br><br>
                    <strong>( {{ $data->nama_lengkap }} )</strong>
                </td>
                <td width="50%">
                    Orang Tua / Wali Murid,<br><br><br><br><br>
                    <strong>( ........................................ )</strong>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
