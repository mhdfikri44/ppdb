<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Formulir PPDB</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }

        .section-title {
            background: #f2a7b8;
            padding: 5px;
            margin-top: 15px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 3px 0;
        }

        .label {
            width: 40%;
        }

        .dots {
            border-bottom: 1px dotted #000;
            width: 100%;
            display: inline-block;
        }

        .mt-2 {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="text-center fw-bold">
        <div>PENERIMAAN PESERTA DIDIK BARU (PPDB)</div>
        <div>TAHUN AJARAN 2026/2027</div>
    </div>

    {{-- ================= IDENTITAS PESERTA DIDIK ================= --}}
    <div class="section-title">IDENTITAS PESERTA DIDIK</div>

    <table>
        <tr>
            <td class="label">1. Nama Lengkap</td>
            <td>: <span class="dots">{{ $data->nama_lengkap }}</span></td>
        </tr>
        <tr>
            <td>2. NISN</td>
            <td>: <span class="dots">{{ $data->nisn }}</span></td>
        </tr>
        <tr>
            <td>3. NIK</td>
            <td>: <span class="dots">{{ $data->nik }}</span></td>
        </tr>
        <tr>
            <td>4. Tempat/Tgl Lahir</td>
            <td>: <span class="dots">{{ $data->tempat_tanggal_lahir }}</span></td>
        </tr>
        <tr>
            <td>5. Jenis Kelamin</td>
            <td>: <span class="dots">{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span></td>
        </tr>
        <tr>
            <td>6. Agama</td>
            <td>: <span class="dots">{{ $data->religion->name ?? '-' }}</span></td>
        </tr>
        <tr>
            <td>7. Hobi</td>
            <td>: <span class="dots">{{ $data->hobby->name ?? '-' }}</span></td>
        </tr>
        <tr>
            <td>8. Cita-cita</td>
            <td>: <span class="dots">{{ $data->dream->name ?? '-' }}</span></td>
        </tr>
        <tr>
            <td>9. Asal Sekolah</td>
            <td>: <span class="dots">{{ $data->asal_sekolah }}</span></td>
        </tr>
        <tr>
            <td>10. Alamat Sekolah</td>
            <td>: <span class="dots">{{ $data->alamat_asal_sekolah }}</span></td>
        </tr>
        <tr>
            <td>11. Prestasi</td>
            <td>: <span class="dots">{{ $data->prestasi }}</span></td>
        </tr>
        <tr>
            <td>12. Penyakit</td>
            <td>: <span class="dots">{{ $data->penyakit }}</span></td>
        </tr>
    </table>

    {{-- ================= DATA RUMAH ================= --}}
    <div class="section-title">DATA RUMAH & KELUARGA</div>

    <table>
        <tr>
            <td class="label">1. No KK</td>
            <td>: <span class="dots">{{ $data->no_kk }}</span></td>
        </tr>
        <tr>
            <td>2. Alamat</td>
            <td>: <span class="dots">{{ $data->alamat }}</span></td>
        </tr>
        <tr>
            <td>3. Status Rumah</td>
            <td>: <span class="dots">{{ $data->houseStatus->name ?? '-' }}</span></td>
        </tr>
        <tr>
            <td>4. Anak ke</td>
            <td>: <span class="dots">{{ $data->anak_keberapa }}</span></td>
        </tr>
        <tr>
            <td>5. Jumlah Saudara</td>
            <td>: <span class="dots">{{ $data->jumlah_saudara }}</span></td>
        </tr>
        <tr>
            <td>6. Transportasi</td>
            <td>: <span class="dots">{{ $data->transportasi }}</span></td>
        </tr>
        <tr>
            <td>7. Jarak Tempuh</td>
            <td>: <span class="dots">{{ $data->jarak_tempuh }}</span></td>
        </tr>
        <tr>
            <td>8. Waktu Tempuh</td>
            <td>: <span class="dots">{{ $data->waktu_tempuh }}</span></td>
        </tr>
    </table>

    {{-- ================= ORANG TUA ================= --}}
    <div class="section-title">IDENTITAS ORANG TUA</div>

    <table>
        <tr>
            <td class="label">Ayah</td>
            <td></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <span class="dots">{{ $data->nama_ayah }}</span></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: <span class="dots">{{ $data->nik_ayah }}</span></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: <span class="dots">{{ $data->hp_ayah }}</span></td>
        </tr>

        <tr>
            <td class="label mt-2">Ibu</td>
            <td></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <span class="dots">{{ $data->nama_ibu }}</span></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: <span class="dots">{{ $data->nik_ibu }}</span></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: <span class="dots">{{ $data->hp_ibu }}</span></td>
        </tr>
    </table>

    {{-- ================= TTD ================= --}}
    <div style="margin-top: 40px;">
        <table>
            <tr>
                <td class="text-center">
                    Mengetahui,<br>
                    Kepala Sekolah<br><br><br><br>
                    ______________________
                </td>
                <td class="text-center">
                    Orang Tua / Wali<br><br><br><br><br>
                    ______________________
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
