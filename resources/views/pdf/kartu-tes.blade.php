<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB | Cetak Kartu Tes</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }

        .card-container {
            border: 2px solid #000;
            padding: 10px 20px;
            width: 660px;
        }

        /* Header Styling */
        .header-table {
            width: 100%;
            border-bottom: 3px double #000;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .header-text {
            text-align: center;
        }

        .header-text h2 {
            margin: 0;
            text-transform: uppercase;
        }

        .header-text p {
            margin: 0;
            font-size: 10px;
        }

        /* Profile Section */
        .profile-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .photo-cell {
            width: 120px;
            vertical-align: top;
        }

        .photo-box {
            width: 100px;
            height: 140px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .data-cell {
            vertical-align: top;
        }

        .data-table td {
            padding: 4px;
        }

        /* Schedule Table */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .schedule-table th,
        .schedule-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .schedule-table th {
            background-color: #f2f2f2;
        }

        .footer-note {
            margin-top: 20px;
            font-style: italic;
            font-size: 10px;
        }

        h3 {
            margin: 0 0 2px 0;
        }
    </style>
</head>

<body>

    <div class="card-container">
        <table class="header-table">
            <tr>
                <td width="20%" style="text-align: center;">
                    <img src="{{ public_path('assets/img/mts/logo-mts.png') }}" width="70">
                </td>
                <td class="header-text" width="60%">
                    <h3>KARTU PESERTA SELEKSI PPDB</h3>
                    <h3>MADRASAH TSANAWIYAH NEGERI 1 KOTA DUMAI</h3>
                    <h3>TAHUN PELAJARAN 2026/2027</h3>
                </td>
                <td width="20%"></td>
            </tr>
        </table>

        <table class="profile-table">
            <tr>
                <td class="photo-cell">
                    <div class="photo-box">
                        @if ($pasfoto)
                            <img src="{{ public_path('storage/' . $pasfoto->path) }}" width="100" height="140"
                                style="object-fit: cover;">
                        @else
                            <div style="padding-top: 60px; color: #ccc;">FOTO 3x4</div>
                        @endif
                    </div>
                </td>
                <td class="data-cell">
                    <table class="data-table">
                        <tr>
                            <td width="100"><strong>No. Pendaftaran</strong></td>
                            <td>: <strong>{{ $student->registration->no_pendaftaran }}</strong></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>: {{ $student->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>: {{ $student->nisn }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>: {{ $student->tempat_tanggal_lahir }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <p><strong>JADWAL PELAKSANAAN TES :</strong></p>
        <table class="schedule-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tes / Ujian</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Ruang / Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Praktik & Wawancara</td>
                    <td>{{ $tes['praktik']->tanggal ?? '-' }}</td>
                    <td>{{ $tes['praktik']->jam ?? '-' }}</td>
                    <td>{{ $tes['praktik']->lokasi ?? '-' }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tertulis / Akademik</td>
                    <td>{{ $tes['tertulis']->tanggal ?? '-' }}</td>
                    <td>{{ $tes['tertulis']->jam ?? '-' }}</td>
                    <td>{{ $tes['tertulis']->lokasi ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer-note">
            * Harap membawa kartu ini saat pelaksanaan tes.<br>
            * Datang 15 menit sebelum jadwal yang ditentukan.
        </div>
    </div>

</body>

</html>
