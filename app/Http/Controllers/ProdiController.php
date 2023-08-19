<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $prodi = Prodi::where('nama_prodi', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $prodi = Prodi::latest()->paginate(5);
        }

        //mengambil semua data user
        // $prodi = Prodi::latest()->paginate(5);

        return view('prodi/index', data: compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nama_jurusan' => 'required',
            'nama_prodi' => 'required',
            'jenjang' => 'required'
        ]);

        Prodi::create($validatedData);

        return redirect('/prodi')->with('success', 'Data Prodi Berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prodi = Prodi::find($id);
        return view('prodi/show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prodi = Prodi::find($id);
        return view('prodi/update', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nama_jurusan' => 'required',
            'nama_prodi' => 'required',
            'jenjang' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $prodi = Prodi::find($id);

        $prodi->update($validatedData);

        return redirect('/prodi')->with('success', 'Data Prodi Berhasil diedit !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect('/prodi')->with('success', 'Data Prodi Berhasil dihapus !');
    }
}
