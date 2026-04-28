<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waduh, Lagi Rehat Dulu! - {{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .maintenance-card {
            @apply bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-2xl transition-all duration-300;
        }

        .float-animation {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full text-center">
        <div class="flex justify-center mb-8">
            <div class="relative float-animation">
                <div
                    class="w-24 h-24 bg-indigo-600 rounded-3xl flex items-center justify-center text-white text-4xl shadow-xl shadow-indigo-200">
                    <i class="fas fa-mug-hot"></i>
                </div>
                <div
                    class="absolute -bottom-2 -right-2 w-10 h-10 bg-amber-400 rounded-2xl border-4 border-white flex items-center justify-center text-white shadow-lg">
                    <i class="fas fa-wrench text-xs"></i>
                </div>
            </div>
        </div>

        <div class="maintenance-card relative overflow-hidden">
            <div class="absolute -z-10 w-48 h-48 bg-indigo-50 blur-3xl rounded-full -top-10 -right-10"></div>

            <span
                class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm font-bold uppercase tracking-wider">
                Status: Server Lagi Ngopi ☕
            </span>

            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mt-6">
                Sistem Kami <span class="text-indigo-600">Lagi Istirahat</span> Biar Gak Tanteum.
            </h1>

            <div class="space-y-4 mt-6">
                <p class="text-lg text-slate-600 leading-relaxed">
                    Sama seperti kamu yang butuh libur sekolah, server kami juga lagi butuh "me-time" sebentar buat
                    mandi keringat dan ganti oli.
                </p>
                <p class="text-slate-500 italic">
                    "Admin lagi beresin kabel yang kusut kayak hubungan kamu sama si dia. Sabar ya!"
                </p>
            </div>

            <div class="mt-8 p-4 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                <p class="text-sm text-slate-500">
                    <span class="font-bold text-indigo-600 text-xs uppercase block mb-1">Tips Gabut:</span>
                    Coba tarik napas dalam-dalam, minum air putih, atau cek lagi berkas pendaftaran di map. Jangan
                    sampai ada yang ketinggalan!
                </p>
            </div>

            <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="javascript:location.reload()"
                    class="w-full md:w-auto px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center justify-center gap-2">
                    <i class="fas fa-sync-alt"></i> Coba Klik Siapa Tau Berhasil
                </a>
            </div>
        </div>
    </div>

</body>

</html>
