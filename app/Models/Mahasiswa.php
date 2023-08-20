<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "tb_mahasiswa";
    protected $primaryKey = "nim";
    protected $fillable = [
        'nim', 'nama', 'jk', 'id_prodi',
        'no_telp', 'alamat', 'pekerjaan_ayah', 'tanggungan',
        'total_penghasilan', 'nama_bank', 'no_rek', 'semester', 'id_tahun_usulan'
    ];

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function nilaimahasiswa()
    {
        return $this->hasMany(NilaiMahasiswa::class);
    }

    public function berkasmahasiswa()
    {
        return $this->hasMany(BerkasMahasiswa::class);
    }
}
