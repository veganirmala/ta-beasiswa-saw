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
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('nama');
            $table->string('jk');
            $table->unsignedBigInteger('id_prodi');
            $table->foreign('id_prodi')->references('id')->on('tb_prodi');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('pekerjaan_ayah');
            $table->integer('tanggungan');
            $table->float('total_penghasilan');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->integer('semester');
            $table->unsignedBigInteger('id_tahun_usulan');
            $table->foreign('id_tahun_usulan')->references('id')->on('tb_tahun_usulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mahasiswa');
    }
};
