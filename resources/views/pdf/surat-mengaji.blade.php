<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Mengaji</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 16px;
            line-height: 1.5em;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 4px 0;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            SURAT KETERANGAN MENGAJI
        </div>

        <div class="content">
            <p>Saya yang bertanda tangan di bawah ini :</p>
            <table>
                <tr>
                    <td width="20"></td>
                    <td width="100">Nama</td>
                    <td>: _____________________________________________</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Umur</td>
                    <td>: _____________________________________________</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pekerjaan</td>
                    <td>: _____________________________________________</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Alamat</td>
                    <td>: _____________________________________________</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding-left: 9px"> _____________________________________________</td>
                </tr>
            </table>
            <br>
            <p>Dengan ini menerangkan bahwa :</p>
            <table>
                <tr>
                    <td width="20"></td>
                    <td width="100">Nama</td>
                    <td>: {{ $student->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Umur</td>
                    <td>: {{ Carbon\Carbon::parse($student->tanggal_lahir)->age }} Tahun</td>
                    {{-- hitung umur berdasarkan tahun lahir, $student->tanggal_lahir --}}
                </tr>
                <tr>
                    <td></td>
                    <td>Tempat Sekolah</td>
                    <td>: {{ $student->asal_sekolah ?? '-' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Alamat</td>
                    <td>: {{ $student->alamat_asal_sekolah ?? '-' }}</td>
                </tr>
            </table>
            <br>
            <p style="text-align: justify;">
                Adalah benar belajar Al-Qur'an ( mengaji ) di bawah bimbingan saya dan pada saat ini telah sampai pada
                tingkat <span>___________</span>.
            </p>
            <p style="text-align: justify;">
                Demikianlah surat keterangan ini saya buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
            </p>

            <table style="text-align: center;">
                <tr>
                    <td width="200"></td>
                    <td>
                        <div>
                            <div>
                                <p>
                                    Dumai, <span>
                                        {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                                    </span>
                                </p>
                                <br>
                                <div style="margin-top: 40px">
                                    _______________________
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
