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
        Schema::create('tb_nilai_mahasiswa', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('nim');
            // $table->foreign('nim')->references('id')->on('tb_mahasiswa');
            $table->integer('nim');
            $table->float('nilai_kepribadian');
            $table->float('nilai_ipk');
            $table->float('nilai_prestasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_nilai_mahasiswa');
    }
};
