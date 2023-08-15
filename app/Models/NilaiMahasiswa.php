<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;
    protected $table = "tb_nilai_mahasiswa";
    protected $primaryKey = "nim";
    protected $fillable = ['id', 'nim', 'nilai_kepribadian', 'nilai_ipk', 'nilai_prestasi', 'keterangan', 'status'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
