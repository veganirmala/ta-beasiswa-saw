<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use App\Models\BobotKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $bobotkriteria = DB::table('tb_bobot_kriteria')
            ->join('tb_tahun_usulan', 'tb_bobot_kriteria.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->select('*')
            ->where('tahun', 'LIKE', '%' . $request->search . '%')
            ->get();
        } else {
        //mengambil semua data
            $bobotkriteria = DB::table('tb_bobot_kriteria')
            ->join('tb_tahun_usulan', 'tb_bobot_kriteria.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->select('*')
            ->get();
        }
        //tampilkan halaman index
        return view('bobotkriteria/index', data: compact('bobotkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thusulan = TahunUsulan::all();
        return view('bobotkriteria/create', compact('thusulan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'id_tahun_usulan' => 'required',
            'bobot_kepribadian' => 'required',
            'bobot_ipk' => 'required',
            'bobot_prestasi' => 'required',
            'bobot_penghasilan' => 'required'
        ]);

        BobotKriteria::create($validatedData);

        return redirect('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bobotkriteria = BobotKriteria::join('tb_tahun_usulan', 'tb_bobot_kriteria.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->where('tb_bobot_kriteria.id', $id)
            ->first();
        return view('bobotkriteria/show', compact('bobotkriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bobotkriteria =
            BobotKriteria::join('tb_tahun_usulan', 'tb_bobot_kriteria.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->where('tb_bobot_kriteria.id', $id)
            ->first();
        $thusulan = TahunUsulan::all();
        return view('bobotkriteria/update', compact('bobotkriteria', 'thusulan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'id_tahun_usulan' => 'required',
            'bobot_kepribadian' => 'required',
            'bobot_ipk' => 'required',
            'bobot_prestasi' => 'required',
            'bobot_penghasilan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $bobotkriteria = BobotKriteria::find($id);

        $bobotkriteria->update($validatedData);

        return redirect('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bobotkriteria = BobotKriteria::find($id);
        $bobotkriteria->delete();

        return redirect('/bobotkriteria')->with('success', 'Data Bobot Kriteria Berhasil dihapus !');
    }
}
