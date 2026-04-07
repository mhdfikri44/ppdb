<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Penerimaan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 14px;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 6px 0;
            vertical-align: top;
        }

        .line {
            border-bottom: 1px solid black;
            width: 100%;
            display: inline-block;
        }

        .section {
            margin-top: 20px;
            font-weight: bold;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="title">
            FORMULIR DAFTAR ULANG
        </div>
        <div class="subtitle">
            {{ config('app.name') }}
        </div>

        <div class="section">A. Biodata Calon Siswa</div>

        <table>
            <tr>
                <td width="200">Nama Lengkap</td>
                <td>: {{ $student->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>: {{ $student->nisn }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $student->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($student->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $student->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $student->alamat }}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>: {{ $student->school ?? '-' }}</td>
            </tr>
        </table>

        <div class="section">B. Pernyataan</div>

        <p style="text-align: justify;">
            Dengan ini saya menyatakan bahwa data yang saya isi adalah benar dan saya bersedia
            mengikuti seluruh peraturan yang berlaku di {{ config('app.name') }}.
        </p>

        <div class="ttd">
            Dumai, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            <br>
            Orang Tua / Wali
            <br><br><br><br>

            (_________________________)
        </div>

    </div>

</body>

</html>
