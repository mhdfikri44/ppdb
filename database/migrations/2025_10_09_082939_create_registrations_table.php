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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('no_pendaftaran')->unique()->nullable();

            $table->boolean('status_data')->default(false);
            $table->boolean('status_dokumen')->default(false);

            $table->boolean('is_locked')->default(false);
            $table->timestamp('locked_at')->nullable();
            $table->enum('status_verifikasi', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
            $table->string('rejected_message')->nullable();

            $table->boolean('lulus')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
