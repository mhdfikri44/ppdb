<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .bento-card {
            @apply bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="font-bold text-xl tracking-tight">PPDB - MTsN 1 Kota Dumai</span>
            </div>
            <div class="hidden md:flex gap-8 font-medium text-slate-600">
                <a href="#alur" class="hover:text-indigo-600 transition">Alur</a>
                <a href="#syarat" class="hover:text-indigo-600 transition">Syarat</a>
            </div>
            {{-- <div class="flex gap-3">
                <a href="#"
                    class="px-5 py-2.5 rounded-full font-semibold text-indigo-600 hover:bg-indigo-50 transition">Masuk</a>
                <a href="#"
                    class="px-6 py-2.5 rounded-full font-semibold bg-indigo-600 text-white shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">Daftar</a>
            </div> --}}
        </div>
    </nav>

    <section class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span
                    class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm font-bold uppercase tracking-wider">Pendaftaran
                    TA 2026/2027</span>
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mt-6">Gerbang Untuk <span
                        class="text-indigo-600">Masa Depan</span> Cemerlang.</h1>
                <p class="text-lg text-slate-500 mt-6 leading-relaxed">Selamat datang di portal pendaftaran siswa baru.
                    Proses mudah, transparan, dan terintegrasi secara online.</p>
                <div class="mt-10 flex flex-wrap gap-4">
                    @if (!$isOpen)
                        <button
                            class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center gap-2">
                            Pendaftaran Ditutup
                        </button>
                    @else
                        <a href="{{ route('student.register.form') }}"
                            class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center gap-2">
                            Daftar Sekarang <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    @endif
                    <a href="{{ route('student.index') }}"
                        class="px-8 py-4 bg-white border border-gray-200 rounded-2xl font-bold hover:bg-gray-100 transition">
                        Masuk
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -z-10 w-72 h-72 bg-indigo-400/20 blur-3xl rounded-full top-0 right-0"></div>
                <img src="{{ asset('assets/img/mts/hero2.jpg') }}" alt="siswa mengamati"
                    class="rounded-[2rem] shadow-2xl border-8 border-white">
            </div>
        </div>
    </section>

    <section id="alur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold">Alur Pendaftaran</h2>
            <p class="text-slate-500 mt-2">Ikuti langkah-langkah berikut untuk bergabung</p>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mt-12">
                {{-- kondisi pasif --}}
                {{-- <div class="p-6 rounded-3xl bg-slate-50 relative">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">01</div>
                    <div
                        class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-indigo-600 mb-4">
                        <i class="fas fa-user-plus text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Registrasi</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">1 - 30 April 2026</p>
                </div> --}}

                {{-- kondisi aktif --}}
                <div class="p-6 rounded-3xl bg-slate-50 relative border-2 border-indigo-600 ring-4 ring-indigo-50">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">01</div>
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-sm text-white mb-4">
                        <i class="fas fa-user-plus text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Pendaftaran Online</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">13 - 18 April 2026</p>
                </div>

                <div class="p-6 rounded-3xl bg-slate-50 relative border-2 border-indigo-600 ring-4 ring-indigo-50">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">02</div>
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-sm text-white mb-4">
                        <i class="fas fa-file-invoice text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Pengumuman Administrasi</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">19 April 2026</p>
                </div>

                <div class="p-6 rounded-3xl bg-slate-50 relative border-2 border-indigo-600 ring-4 ring-indigo-50">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">03</div>
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-sm text-white mb-4">
                        <i class="fas fa-upload text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Tes Praktik & Wawancara</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">21 - 24 April 2026</p>
                    {{-- <p class="text-sm text-indigo-400 text-left mt-2 font-semibold">21 - 24 April 2026</p> --}}
                </div>

                <div class="p-6 rounded-3xl bg-slate-50 relative border-2 border-indigo-600 ring-4 ring-indigo-50">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">04</div>
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-sm text-white mb-4">
                        <i class="fas fa-tasks text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Tes Akademik</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">25 April 2026</p>
                </div>

                <div class="p-6 rounded-3xl bg-slate-50 relative border-2 border-indigo-600 ring-4 ring-indigo-50">
                    <div class="text-4xl font-black text-indigo-200 absolute top-4 right-6">05</div>
                    <div
                        class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-sm text-white mb-4">
                        <i class="fas fa-bullhorn text-xl"></i>
                    </div>
                    <h3 class="font-bold text-left">Pengumuman Hasil</h3>
                    <p class="text-sm text-slate-400 text-left mt-2">28 April 2026</p>
                </div>
            </div>
        </div>
    </section>

    <section id="syarat" class="py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold">Syarat Pendaftaran</h2>
            <p class="text-slate-500 mt-2">Pastikan semua dokumen dalam format digital <strong>(PDF/JPG)</strong></p>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-12">
                <div class="bento-card col-span-2 md:col-span-3">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-slate-600">
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Umur maksimal pendaftar 15 tahun
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Pasfoto Latar Merah
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Surat Keterangan Aktif Sekolah Asal
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Kartu Keluarga
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> KTP Kedua Orang Tua
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Akta Kelahiran
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest">
                            <i class="fas fa-check-circle text-green-500"></i> Kartu NISN
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl uppercase text-sm font-bold tracking-widest md:col-span-2">
                            <i class="fas fa-check-circle text-green-500"></i> Surat Keterangan Mengaji/Ijazah MDA Atau
                            TPA
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-12 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-graduation-cap text-xs"></i>
                </div>
                <span class="font-bold text-white uppercase tracking-tighter">PPDB</span>
            </div>
            <p class="text-sm">© 2026 MTsN 1 Kota Dumai. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-facebook text-xl"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-youtube text-xl"></i></a>
            </div>
        </div>
    </footer>

</body>

</html>
