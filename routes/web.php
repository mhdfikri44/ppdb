<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $isOpen = Setting::get('ppdb_open');
    return view('index', compact('isOpen'));
})->name('landingPage');

Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login.form');
    Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

Route::middleware('guest:student')->group(function () {
    Route::get('/register', [StudentAuthController::class, 'registerForm'])->name('student.register.form');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register');
    Route::get('/login', [StudentAuthController::class, 'loginForm'])->name('student.login.form');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/', 'studentList')->name('list');
            Route::get('data', 'studentData')->name('data');

            Route::get('verifikasi', 'studentConfirmList')->name('confirm.list');
            Route::get('verifikasi/data', 'studentConfirmData')->name('confirm.data');

            Route::get('approved', 'studentApprovedList')->name('approved.list');
            Route::get('approved/data', 'studentApprovedData')->name('approved.data');
            Route::get('rejected/data', 'studentRejectedData')->name('rejected.data');

            Route::get('{student:nisn}/detail', 'studentDetail')->name('detail');
            Route::get('{student:nisn}/detail/json', 'getStudentDetail');

            Route::delete('{student}', 'studentDelete')->name('delete');
            Route::put('{student}/verifikasi', 'verify')->name('verify');
            Route::put('{student}/verifikasi/cancel', 'cancelApproved')->name('cancel.approved');
        });

        Route::prefix('test')->name('test.')->group(function () {
            Route::get('praktik', 'testPraktik')->name('praktik');
            Route::get('tertulis', 'testTertulis')->name('tertulis');
            Route::get('praktik/data', 'testPraktikData')->name('praktik.data');
            Route::get('tertulis/data', 'testTertulisData')->name('tertulis.data');

            Route::get('template', 'downloadTemplateJadwal')->name('download.template');
            Route::post('import/jadwal', 'importJadwal')->name('import.jadwal');
            Route::delete('clear/jadwal', 'clearJadwal')->name('clear.jadwal');
        });

        Route::get('penilaian', 'scoring')->name('scoring');
        Route::get('penilaian/data', 'scoringData')->name('scoring.data');

        Route::get('penilaian/template', 'downloadTemplateNilai')->name('scoring.template');
        Route::post('penilaian/import/nilai', 'importNilai')->name('scoring.import.nilai');

        Route::post('penilaian/passed', 'passed')->name('scoring.passed');
        Route::post('penilaian/failed', 'failed')->name('scoring.failed');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::put('/update', 'update')->name('update');
            // Route::put('toggle', 'toggle')->name('toggle');
        });
    });
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::prefix('student')->name('student.')->middleware('auth:student')->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('data/pribadi', 'edit1')->name('edit1');
        Route::get('data/keluarga', 'edit2')->name('edit2');
        Route::get('data/asal-sekolah', 'edit3')->name('edit3');

        Route::put('data/pribadi', 'update1')->name('update1');
        Route::put('data/keluarga', 'update2')->name('update2');
        Route::put('data/asal-sekolah', 'update3')->name('update3');

        Route::get('dokumen', 'document')->name('document');
        Route::post('dokumen/{jenis}', 'upload')->name('upload');
        Route::put('dokumen/mengunci', 'lock')->name('document.lock');
        Route::put('dokumen/membuka', 'unlock')->name('document.unlock');
        Route::put('konfirmasi-pendaftaran', 'confirm')->name('confirm');

        Route::get('cetak/kartu-tes', 'cetakKartuTes')->name('cetak.kartu.tes');
        Route::get('cetak/surat-mengaji', 'cetakSuratNgaji')->name('cetak.surat.mengaji');
        Route::get('cetak/formulir-penerimaan', 'cetakFormulir')->name('cetak.formulir');
        Route::put('lihat-hasil-kelulusan', 'seeResult')->name('lihat.hasil');
    });
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout');
});
