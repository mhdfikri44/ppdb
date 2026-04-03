<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $isOpen = Setting::get('ppdb_open');
    return view('index', compact('isOpen'));
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
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

    Route::resource('/', AdminController::class);
});

Route::prefix('student')->name('student.')->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('{student:nisn}/data/pribadi', 'edit1')->name('edit1');
        Route::get('{student:nisn}/data/keluarga', 'edit2')->name('edit2');
        Route::get('{student:nisn}/data/asal-sekolah', 'edit3')->name('edit3');

        Route::put('{student}/data/pribadi', 'update1')->name('update1');
        Route::put('{student}/data/keluarga', 'update2')->name('update2');
        Route::put('{student}/data/asal-sekolah', 'update3')->name('update3');

        Route::get('{student:nisn}/dokumen', 'document')->name('document');
        Route::post('{student}/dokumen/{jenis}', 'upload')->name('upload');
        Route::put('{student}/dokumen/mengunci', 'lock')->name('document.lock');
        Route::put('{student}/dokumen/membuka', 'unlock')->name('document.unlock');
        Route::put('{student}/konfirmasi', 'confirm')->name('confirm');

        Route::get('{student:nisn}/cetak-kartu-tes', 'cetakKartuTes')->name('cetak.kartu.tes');
        Route::put('{student:nisn}/lihat-hasil', 'seeResult')->name('lihat.hasil');
    });
    Route::resource('/', StudentController::class)->except(['edit', 'update', 'show', 'destroy']);
});
