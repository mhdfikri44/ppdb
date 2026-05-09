<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagi Maintenis! - {{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .bento-card {
            @apply bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-2xl transition-all duration-300;
        }

        .tennis-ball {
            animation: bounce-ball 0.6s ease-in infinite alternate;
        }

        @keyframes bounce-ball {
            from {
                transform: translateY(0) scaleX(1);
            }

            to {
                transform: translateY(-40px) scaleX(0.9);
            }
        }

        .shadow-ball {
            animation: shadow-size 0.6s ease-in infinite alternate;
        }

        @keyframes shadow-size {
            from {
                transform: scale(1);
                opacity: 0.2;
            }

            to {
                transform: scale(0.5);
                opacity: 0.05;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full text-center">
        <!-- Visual Maintenis -->
        <div class="flex justify-center mt-10 mb-10">
            <div class="relative">
                <!-- Raket Icon -->
                <div
                    class="w-24 h-24 bg-indigo-600 rounded-3xl flex items-center justify-center text-white text-4xl shadow-xl rotate-12">
                    <i class="fas fa-table-tennis"></i>
                </div>
                <!-- Bola Tenis (Yellow-Green) -->
                <div class="absolute -top-8 -right-6">
                    <div
                        class="tennis-ball w-10 h-10 bg-[#ccff00] rounded-full border-2 border-white shadow-lg flex items-center justify-center">
                        <div class="w-8 h-8 border-2 border-white/30 rounded-full"></div>
                    </div>
                    <div class="shadow-ball w-8 h-2 bg-black/20 rounded-[100%] mx-auto mt-10 blur-sm"></div>
                </div>
            </div>
        </div>

        <div class="bento-card relative overflow-hidden">
            <!-- Dekorasi Latar -->
            <div class="absolute -z-10 w-48 h-48 bg-indigo-50 blur-3xl rounded-full -top-10 -right-10"></div>

            <span
                class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm font-bold uppercase tracking-widest">
                Status: Sedang "Maintenis" 🎾
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mt-6">
                Server Lagi <span class="text-indigo-600">Izin Tanding</span> Sebentar.
            </h1>

            <div class="space-y-4 mt-6">
                <p class="text-lg text-slate-600 leading-relaxed">
                    Mohon maaf, sistem kami sedang melakukan <b>Maintenis</b> (Maintenance rasa Tenis) agar performanya
                    tetap <i>smash</i> dan nggak gampang capek.
                </p>
                <div class="p-4 bg-amber-50 rounded-2xl border-l-4 border-amber-400 text-left">
                    <p class="text-sm text-amber-800">
                        <b>Pesan Admin:</b> "Skor sementara lagi 40-40 (Deuce), dikit lagi selesai kok. Mending kamu
                        ambil minum dulu atau cek perlengkapan sekolah lainnya."
                    </p>
                </div>
            </div>

            <div class="mt-10">
                <a href="javascript:location.reload()"
                    class="inline-flex items-center gap-3 px-10 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:scale-105 active:scale-95 transition-all">
                    <i class="fas fa-redo-alt"></i> Cek Skor (Refresh)
                </a>
            </div>
        </div>

</body>

</html>
