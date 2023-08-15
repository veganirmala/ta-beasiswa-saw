<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilaimahasiswa = NilaiMahasiswa::latest()->paginate(5);
        //tampilkan halaman index
        return view('nilaimahasiswa/index', data: compact('nilaimahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mhs = Mahasiswa::all();
        return view('nilaimahasiswa/create', compact('mhs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nilai_kepribadian' => 'required',
            'nilai_ipk' => 'required',
            'nilai_prestasi' => 'required'
        ]);

        NilaiMahasiswa::create($validatedData);

        return redirect('/nilaimahasiswa')->with('success', 'Data Nilai Mahasiswa Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        $nilaimahasiswa = NilaiMahasiswa::join('tb_mahasiswa', 'tb_nilai_mahasiswa.nim', '=', 'tb_mahasiswa.nim')
            ->where('tb_nilai_mahasiswa.nim', $nim)
            ->select('tb_nilai_mahasiswa.*', 'tb_mahasiswa.*')
            ->first();

        return view('nilaimahasiswa/show', compact('nilaimahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nim)
    {

        $nilaimahasiswa = NilaiMahasiswa::join('tb_mahasiswa', 'tb_nilai_mahasiswa.nim', '=', 'tb_mahasiswa.nim')
            ->where('tb_nilai_mahasiswa.nim', $nim)
            ->select('tb_nilai_mahasiswa.*', 'tb_mahasiswa.*')
            ->first();

        $mhs = Mahasiswa::all();
        return view('nilaimahasiswa/update', compact('nilaimahasiswa', 'mhs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required',
            'nilai_kepribadian' => 'required',
            'nilai_ipk' => 'required',
            'nilai_prestasi' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $nilaimahasiswa = NilaiMahasiswa::find($nim);

        $nilaimahasiswa->update($validatedData);

        return redirect('/nilaimahasiswa')->with('success', 'Data Nilai Mahasiswa Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim)
    {
        $nilaimahasiswa = NilaiMahasiswa::find($nim);
        $nilaimahasiswa->delete();

        return redirect('/nilaimahasiswa')->with('success', 'Data Nilai Mahasiswa Berhasil dihapus !');
    }
}
