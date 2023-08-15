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
        Schema::create('tb_berkas_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('dokumen_kepribadian')->nullable();
            $table->string('dokumen_khs')->nullable();
            $table->string('dokumen_penghasilan')->nullable();
            $table->string('dokumen_nilai_prestasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_berkas_mahasiswa');
    }
};
