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
        Schema::create('t_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 50);
            $table->string('jurusan', 50);
            $table->string('lokasi_ruangan', 50);
            $table->string('nama_wali_kelas', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kelas');
    }
};
