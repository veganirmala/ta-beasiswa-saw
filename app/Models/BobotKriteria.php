<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    use HasFactory;
    protected $table = "tb_bobot_kriteria";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_tahun_usulan', 'bobot_kepribadian',
        'bobot_ipk', 'bobot_prestasi', 'bobot_penghasilan'
    ];

    public function tahunusulan()
    {
        return $this->belongsTo(TahunUsulan::class);
    }
}
