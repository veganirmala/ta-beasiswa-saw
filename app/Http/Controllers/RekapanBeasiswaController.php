<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\TahunUsulan;
use Illuminate\Support\Facades\DB;
use stdClass;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;

class RekapanBeasiswaController extends Controller
{

    private $mahasiswa = [];
    private $nilai = [];
    private $penilaian = [];
    private $normalisasi = [];
    private $total = 0;


    public function index()
    {
        //tampilkan halaman index
        $thusulan = TahunUsulan::all()->where('status', '=', 'Aktif');
        $rekapan = Rekap::all()->sortByDesc('total');
        return view('rekapanbeasiswa/index', compact('thusulan', 'rekapan'));
    }

    //function cek skor IPK
    public function getIPK($ipk)
    {
        if ($ipk >= 3.61) {
            return 1;
        } else if ($ipk >= 3.41) {
            return 0.8;
        } else if ($ipk >= 3.21) {
            return 0.6;
        } else if ($ipk >= 3.01) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Prestasi
    public function getPrestasi($prestasi)
    {
        if ($prestasi >= 21) {
            return 1;
        } else if ($prestasi >= 16) {
            return 0.8;
        } else if ($prestasi >= 11) {
            return 0.6;
        } else if ($prestasi >= 6) {
            return 0.4;
        } else {
            return 0.2;
        }
    }

    //function cek skor Ekonomi
    public function getEkonomi($ekonomi)
    {
        if ($ekonomi >= 3000001) {
            return 0.2;
        } else if ($ekonomi >= 2000001) {
            return 0.4;
        } else if ($ekonomi >= 1000001) {
            return 0.6;
        } else if ($ekonomi >= 500001) {
            return 0.8;
        } else {
            return 1;
        }
    }

    //function cek skor kepribadian
    public function getPribadi($kepribadian)
    {
        if ($kepribadian >= 29) {
            return 1;
        } else if ($kepribadian >= 26) {
            return 0.8;
        } else if ($kepribadian >= 21) {
            return 0.6;
        } else if ($kepribadian >= 16) {
            return 0.4;
        } else if ($kepribadian >= 10) {
            return 0.2;
        } else {
            return 0;
        }
    }

    public function getValueInArray($type, $array, $index)
    {

        $resultValue = null;

        foreach ($array as $subarray) {
            $value = $subarray[$index];

            if ($type === 'max') {
                if ($resultValue === null || $value > $resultValue) {
                    $resultValue = $value;
                }
            } else {
                if ($resultValue === null || $value < $resultValue) {
                    $resultValue = $value;
                }
            }
        }

        return $resultValue;
    }

    //sinkronisasi data rekapan
    public function rekap_sinkron()
    {
        //ngambil data mahasiswa dengan inner join ke tabel nilai mahasiswa dan tahun usulan
        $datamahasiswa = DB::table('tb_mahasiswa')
            ->join('tb_nilai_mahasiswa', 'tb_mahasiswa.nim', '=', 'tb_nilai_mahasiswa.nim')
            ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->where('status', '=', 'Aktif')
            ->select('*')
            ->get();

        //panggil function datamahasiswa
        $this->run($datamahasiswa);

        //panggil function rekap dari controller rekap
        return redirect('rekapanbeasiswa');
    }

    public function run($datamahasiswa)
    {

        $generated_score = [];
        Rekap::truncate(); // hapus isi kolom, lalu lakukan perhitungan ulang

        foreach ($datamahasiswa as $datamhs) {
            //ngambil data mahasiswa
            $this->mahasiswa = [
                $datamhs->nim,
                $datamhs->nilai_kepribadian,
                $datamhs->nilai_ipk,
                $datamhs->nilai_prestasi,
                $datamhs->total_penghasilan,
            ];

            //simpan data nim mahasiswa di kolom 1
            $nim =  $this->mahasiswa[0];

            //simpan data skor ipk di kolom 1
            $skor_kepribadian = $this->getPribadi($this->mahasiswa[1]);

            //simpan data skor prestasi di kolom 2
            $skor_ipk = $this->getIPK($this->mahasiswa[2]);

            //simpan data skor prestasi di kolom 3
            $skor_prestasi = $this->getPrestasi($this->mahasiswa[3]);

            //simpan data skor ekonomi di kolom 4
            $skor_ekonomi = $this->getEkonomi($this->mahasiswa[4]);

            $temp_data_mhs = new stdClass();
            $temp_data_mhs->nim = $nim;
            $temp_data_mhs->skor_kepribadian = $skor_kepribadian;
            $temp_data_mhs->skor_ipk = $skor_ipk;
            $temp_data_mhs->skor_prestasi = $skor_prestasi;
            $temp_data_mhs->skor_ekonomi = $skor_ekonomi;
            $generated_score[] = $temp_data_mhs;

            //simpan semua data mahasiswa bentuk array
            for ($i = 0; $i < count($generated_score); $i++) {
                $this->nilai[$i] = [];
                for ($j = 0; $j < 4; $j++) {
                    $this->nilai[$i][0] = $generated_score[$i]->nim;
                    $this->nilai[$i][1] = $generated_score[$i]->skor_kepribadian; //benefit
                    $this->nilai[$i][2] = $generated_score[$i]->skor_ipk; //benefit
                    $this->nilai[$i][3] = $generated_score[$i]->skor_prestasi; //benefit
                    $this->nilai[$i][4] = $generated_score[$i]->skor_ekonomi; //cost
                }
            }

            //hitung max kriteria kepribadian dari tabel dummy
            $max_kepribadian = $this->getValueInArray('max', $this->nilai, 1);

            //hitung max kriteria ipk dari tabel dummy
            $max_ipk = $this->getValueInArray('max', $this->nilai, 2);

            //hitung max kriteria prestasi dari tabel dummy
            $max_prestasi = $this->getValueInArray('max', $this->nilai, 3);

            //hitung min kriteria ekonomi dari tabel dummy
            $min_ekonomi = $this->getValueInArray('min', $this->nilai, 4);

            //RUMUS BENEFIT DAN COST SAW
            if ($skor_kepribadian >= 0) {
                $this->penilaian[1] = $skor_kepribadian / $max_kepribadian;
            }
            if ($skor_ipk >= 0.2) {
                $this->penilaian[2] = $skor_ipk / $max_ipk;
            }
            if ($skor_prestasi >= 0.2) {
                $this->penilaian[3] = $skor_prestasi / $max_prestasi;
            }
            if ($skor_ekonomi >= 0.2) {
                $this->penilaian[4] = $min_ekonomi / $skor_ekonomi;
            }

            //Nilai Bobot Persentase Per Kriteria ngambil dari tabel bobot
            $get_table_bobot = DB::table('tb_bobot_kriteria')
                ->select('tahun', 'bobot_kepribadian', 'bobot_ipk', 'bobot_prestasi', 'bobot_penghasilan', 'kuota', 'status')
                ->join('tb_tahun_usulan', 'tb_bobot_kriteria.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
                ->where('status', '=', 'Aktif')
                ->get();

            $w = $get_table_bobot->toArray()[0];

            //Rumus Normalisasi dikalikan dengan bobot
            $this->normalisasi[0] = $w->bobot_kepribadian * $this->penilaian[1];
            $this->normalisasi[1] = $w->bobot_ipk * $this->penilaian[2];
            $this->normalisasi[2] = $w->bobot_prestasi * $this->penilaian[3];
            $this->normalisasi[3] = $w->bobot_penghasilan * $this->penilaian[4];

            //hitung total nilai mahasiswa
            $this->total = $this->normalisasi[0] + $this->normalisasi[1] + $this->normalisasi[2] + $this->normalisasi[3];

            //buat if status nilai akhir
            if ($this->total >= 85) {
                $status = 'Sangat Layak';
            } else if ($this->total >= 75) {
                $status = 'Layak';
            } else {
                $status = 'Tidak Layak';
            }

            $payloadRekap = [
                'nim' => $datamhs->nim,
                'tahun' => $datamhs->tahun,
                'skor_kepribadian' => $skor_kepribadian,
                'skor_ipk' => $skor_ipk,
                'skor_prestasi' => $skor_prestasi,
                'skor_ekonomi' => $skor_ekonomi,
                'total' => $this->total,
                'status' => $status
            ];

            //simpan ke tabel rekap
            Rekap::create($payloadRekap);
        }
    }

    public function export()
    {
        return Excel::download(new RekapExport, 'rekap.xlsx');
    }
}
