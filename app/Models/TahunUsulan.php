<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunUsulan extends Model
{
    use HasFactory;
    protected $table = "tb_tahun_usulan";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'jenis_beasiswa', 'tahun', 'kuota', 'status'];

    public function bobotkriteria()
    {
        return $this->hasMany(Bobotkriteria::class);
    }

    public function tahunusulan()
    {
        return $this->hasMany(TahunUsulan::class);
    }
}
