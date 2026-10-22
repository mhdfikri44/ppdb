<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waduh, Kesasar Ya? - 404 Not Found</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .error-card {
            @apply bg-white p-8 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-2xl transition-all duration-300;
        }

        .bounce-animation {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full text-center">
        <!-- Icon Section -->
        <div class="flex justify-center mb-8">
            <div class="relative bounce-animation">
                <div
                    class="w-24 h-24 bg-rose-500 rounded-3xl flex items-center justify-center text-white text-5xl shadow-xl shadow-rose-200">
                    <i class="fas fa-map-signs"></i>
                </div>
            </div>
        </div>

        <div class="error-card relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute -z-10 w-48 h-48 bg-rose-50 blur-3xl rounded-full -top-10 -right-10"></div>

            <span class="px-4 py-2 bg-rose-50 text-rose-600 rounded-full text-sm font-bold uppercase tracking-wider">
                Error 404: Jalan Buntu
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mt-6">
                Halamannya <span class="text-rose-500">Gak Ketemu,</span> Kayak Jodoh.
            </h1>

            <div class="space-y-4 mt-6">
                <p class="text-lg text-slate-600 leading-relaxed">
                    Waduh! Sepertinya kamu terlalu semangat nge-klik sampai nyasar ke dimensi lain. Halaman yang kamu
                    cari nggak ada di sini.
                </p>
                <p class="text-slate-500 italic">
                    "Mungkin halamannya lagi pergi beli seblak, atau emang kamu yang salah masukin alamat."
                </p>
            </div>

            <!-- Helpful Links -->
            <div class="mt-10 flex flex-col md:flex-row items-center justify-center">
                <a href="{{ url('/') }}"
                    class="w-full md:w-auto px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-200 hover:scale-105 transition-transform flex items-center justify-center gap-2">
                    <i class="fas fa-home"></i> Balik ke Jalan yang Benar
                </a>
            </div>
        </div>
    </div>

</body>

</html>
