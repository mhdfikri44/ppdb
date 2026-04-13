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
        Schema::table('guardians', function (Blueprint $table) {
            $table->dropUnique(['nik_ayah']);
            $table->dropUnique(['nik_ibu']);
            $table->dropUnique(['nik_wali']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guardians', function (Blueprint $table) {
            $table->unique('nik_ayah');
            $table->unique('nik_ibu');
            $table->unique('nik_wali');
        });
    }
};
