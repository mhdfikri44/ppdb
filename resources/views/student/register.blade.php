<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PMBM | Daftar</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    @include('student.components.style')
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="{{ route('landingPage') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo">
                                    <img src="{{ asset('assets/img/mts/logo-mts.png') }}" alt="" srcset="" width="50">
                                </span>
                                <img src="{{ asset('assets/img/mts/logo.png') }}" alt="" srcset="" width="100">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="text-center mb-1 pt-2">Daftar Akun Baru</h4>
                        {{-- <p class="mb-4">Buat akun baru</p> --}}

                        <form id="" class="mb-3" action="{{ route('student.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control max-10 angka" id="nisn" name="nisn" placeholder="Masukkan nisn"
                                    value="{{ old('nisn') }}" autofocus />
                                @error('nisn')
                                    <div id="nisn" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control max-255" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan nama lengkap" value="{{ old('nama_lengkap') }}" />
                                @error('nama_lengkap')
                                    <div id="nama_lengkap" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                    <div id="password" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="konfirmasi_password" class="form-control" name="konfirmasi_password"
                                        placeholder="Masukkan password kembali" aria-describedby="konfirmasi_password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('konfirmasi_password')
                                    <div id="konfirmasi_password" class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah memiliki akun?</span>
                            <a href="{{ route('student.login.form') }}">
                                <span>Masuk disini</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <!-- / Content -->

    @include('student.components.loading')
    @include('student.components.alert')
    @include('student.components.script')
</body>

</html>
