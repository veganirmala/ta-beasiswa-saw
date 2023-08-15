<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasMahasiswa extends Model
{
    use HasFactory;
    protected $table = "tb_berkas_mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nim', 'dokumen_kepribadian', 'dokumen_khs',
        'dokumen_penghasilan', 'dokumen_nilai_prestasi', 'status', 'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
