<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 10)->unique();
            $table->string('nama_lengkap');
            $table->string('password');
            $table->string('nik', 16)->unique()->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->foreignId('religion_id')->nullable()->constrained();
            $table->string('hobi', 100)->nullable();
            $table->string('cita_cita', 100)->nullable();
            $table->string('prestasi')->nullable();
            $table->string('penyakit')->nullable();

            $table->integer('anak_keberapa')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->string('tempat_tinggal', 50)->nullable();
            $table->string('transportasi', 50)->nullable();
            $table->decimal('jarak_tempuh', 5, 2)->nullable();
            $table->string('waktu_tempuh', 20)->nullable();
            $table->string('no_kk', 16)->nullable();
            $table->string('no_kip_pkh_kks_kps', 30)->nullable();

            $table->year('tahun_lulus')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('alamat_asal_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
