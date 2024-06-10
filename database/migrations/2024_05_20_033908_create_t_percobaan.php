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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id();
            $table->integer('NIS');
            $table->string('nama_lengkap', 100);
            $table->integer('umur');
            $table->string('kelas', 20);
            $table->string('jurusan', 50);
            $table->string('alamat', 50);
            $table->string('golongan_darah', 1);
            $table->string('nama_ibu', 50);
            $table->string('nama_sekolah', 50);
            $table->integer('no_telepon');
            $table->string('hobi', 50);
            $table->string('cita_cita', 50);
            $table->string('hewan_peliharan', 50);
            $table->string('warna_favorit', 20);
            $table->string('makanan_fafvorit', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
