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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();

            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah', 16)->unique()->nullable();
            $table->string('tempat_lahir_ayah', 100)->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->foreignId('father_education_id')->nullable()->constrained('educations');
            $table->foreignId('father_occupation_id')->nullable()->constrained('occupations');
            $table->integer('penghasilan_ayah')->nullable();
            $table->string('hp_ayah', 20)->nullable();
            $table->string('keterangan_ayah', 50)->nullable();

            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu', 16)->unique()->nullable();
            $table->string('tempat_lahir_ibu', 100)->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->foreignId('mother_education_id')->nullable()->constrained('educations');
            $table->foreignId('mother_occupation_id')->nullable()->constrained('occupations');
            $table->integer('penghasilan_ibu')->nullable();
            $table->string('hp_ibu', 20)->nullable();
            $table->string('keterangan_ibu', 50)->nullable();

            $table->string('nama_wali')->nullable();
            $table->string('tempat_lahir_wali', 100)->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->foreignId('wali_education_id')->nullable()->constrained('educations');
            $table->foreignId('wali_occupation_id')->nullable()->constrained('occupations');
            $table->integer('penghasilan_wali')->nullable();
            $table->string('hp_wali', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
