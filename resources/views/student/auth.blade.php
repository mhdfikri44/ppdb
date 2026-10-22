<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - E-PPDB Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-[450px]">
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-2xl text-white shadow-xl shadow-indigo-200 mb-4">
                <i class="fas fa-graduation-cap text-2xl"></i>
            </div>
            <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 uppercase">E-PPDB 2026</h2>
            <p class="text-slate-500 text-sm mt-1">Portal Pendaftaran Siswa Baru</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-8 md:p-10 border border-white">
            <div class="flex bg-slate-100 p-1.5 rounded-2xl mb-8">
                <button onclick="switchForm('login')" id="btn-login"
                    class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-white text-indigo-600 shadow-sm">Masuk</button>
                <button onclick="switchForm('register')" id="btn-register"
                    class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 text-slate-500">Daftar</button>
            </div>

            <div id="login-form">
                <form class="space-y-5">
                    <div class="space-y-2">
                        <label class="text-[13px] font-bold text-slate-700 ml-1">EMAIL / NO. PENDAFTARAN</label>
                        <input type="text" placeholder="Masukkan NISN yang sudah terdaftar"
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 uppercase">Password</label>
                        <input type="password" placeholder="Masukkan password"
                            class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all duration-300 mt-2">
                        Masuk
                    </button>
                </form>
            </div>

            <div id="register-form" class="hidden">
                <form class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 uppercase">Nama Lengkap</label>
                        <input type="text"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 uppercase">Email Aktif</label>
                        <input type="email"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 uppercase">NISN</label>
                        <input type="text"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[13px] font-bold text-slate-700 ml-1 uppercase">Password</label>
                        <input type="password"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition text-sm">
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all mt-2">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchForm(type) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const btnLogin = document.getElementById('btn-login');
            const btnRegister = document.getElementById('btn-register');

            if (type === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                btnLogin.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
                btnLogin.classList.remove('text-slate-500');
                btnRegister.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
                btnRegister.classList.add('text-slate-500');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                btnRegister.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
                btnRegister.classList.remove('text-slate-500');
                btnLogin.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
                btnLogin.classList.add('text-slate-500');
            }
        }
    </script>
</body>

</html>
