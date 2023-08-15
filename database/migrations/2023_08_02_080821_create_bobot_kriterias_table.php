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
        Schema::create('tb_bobot_kriteria', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_tahun_usulan');
            // $table->foreign('id_tahun_usulan')->references('id')->on('tb_tahun_usulan');
            $table->integer('id_tahun_usulan');
            $table->integer('bobot_kepribadian');
            $table->integer('bobot_ipk');
            $table->integer('bobot_prestasi');
            $table->integer('bobot_penghasilan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_bobot_kriteria');
    }
};
