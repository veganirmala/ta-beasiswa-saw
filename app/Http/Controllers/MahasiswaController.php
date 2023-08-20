<?php

namespace App\Http\Controllers;

use App\Models\TahunUsulan;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if ($request->has('search')) {

        //     $mahasiswa = DB::table('tb_mahasiswa')
        //         ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
        //         ->join('tb_prodi', 'tb_mahasiswa.id_prodi', '=', 'tb_prodi.id')
        //         ->select('*')
        //         ->get()
        //         ->where('nim', 'LIKE', '%' . $request->search . '%')->paginate(5);
        // } else {
        //     $mahasiswa = DB::table('tb_mahasiswa')
        //         ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
        //         ->join('tb_prodi', 'tb_mahasiswa.id_prodi', '=', 'tb_prodi.id')
        //         ->select('*')
        //         ->get()
        //         ->paginate(5);
        // }

        //mengambil semua data
        $mahasiswa = DB::table('tb_mahasiswa')
            ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->join('tb_prodi', 'tb_mahasiswa.id_prodi', '=', 'tb_prodi.id')
            ->select('*')
            ->get();

        //tampilkan halaman index
        return view('mahasiswa/index', data: compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thusulan = TahunUsulan::all();
        $prodi = Prodi::all();
        return view('mahasiswa/create', compact('thusulan', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'id_prodi' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'pekerjaan_ayah' => 'required',
            'tanggungan' => 'required',
            'total_penghasilan' => 'required',
            'nama_bank' => 'required',
            'no_rek' => 'required',
            'semester' => 'required',
            'id_tahun_usulan' => 'required'
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::join('tb_prodi', 'tb_mahasiswa.id_prodi', '=', 'tb_prodi.id')
            ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->where('tb_mahasiswa.nim', $nim)
            ->select('tb_mahasiswa.*', 'tb_prodi.*', 'tb_tahun_usulan.*')
            ->first();
        return view('mahasiswa/show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        $mahasiswa =
            Mahasiswa::join('tb_prodi', 'tb_mahasiswa.id_prodi', '=', 'tb_prodi.id')
            ->join('tb_tahun_usulan', 'tb_mahasiswa.id_tahun_usulan', '=', 'tb_tahun_usulan.id')
            ->where('tb_mahasiswa.nim', $nim)
            ->select('tb_mahasiswa.*', 'tb_prodi.*', 'tb_tahun_usulan.*')
            ->first();
        $thusulan = TahunUsulan::all();
        $prodi = Prodi::all();
        return view('mahasiswa/update', compact('mahasiswa', 'thusulan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'id_prodi' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'pekerjaan_ayah' => 'required',
            'tanggungan' => 'required',
            'total_penghasilan' => 'required',
            'nama_bank' => 'required',
            'no_rek' => 'required',
            'semester' => 'required',
            'id_tahun_usulan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $mahasiswa = Mahasiswa::find($nim);

        $mahasiswa->update($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil dihapus !');
    }
}
