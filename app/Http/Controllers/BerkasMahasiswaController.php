<?php

namespace App\Http\Controllers;

use App\Models\BerkasMahasiswa;
//use App\Controller\Storage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\Storage;
use stdClass;
use Session;

class BerkasMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if(Session::get('user_level') == 'Admin') {
            if ($request->has('search')) {
                $berkasmahasiswa = BerkasMahasiswa::where('nim', 'LIKE', '%' . $request->search . '%')
                ->orwhere('status', 'LIKE', '%' . $request->search . '%')
                ->latest()->paginate(5);
            } else {  
            //mengambil semua data diurutkan dari yg terbaru DESC
            $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);
            }
        } else {
            $nim = Session::get('user_nim');
            $berkasmahasiswa = BerkasMahasiswa::where('tb_berkas_mahasiswa.nim', $nim)->latest()->paginate(5);
        }

        //tampilkan halaman index
        return view('berkasmahasiswa/index', data: compact('berkasmahasiswa'));
    }

    public function create()
    {
        return view('berkasmahasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'dokumen_kepribadian' => 'required|file|mimes:pdf',
            'dokumen_khs' => 'required|file|mimes:pdf',
            'dokumen_penghasilan' => 'required|file|mimes:pdf',
            'dokumen_nilai_prestasi' => 'required|file|mimes:pdf',
        ]);

        // Process other form data if needed
        $nim = $request->input('nim');

        // Store the files
        if ($request->hasFile('dokumen_kepribadian')) {
            $dokumen_kepribadianName = $nim . '_dokumen_kepribadian.pdf';
            $request->file('dokumen_kepribadian')->storeAs('uploads', $dokumen_kepribadianName, 'public');
        }

        if ($request->hasFile('dokumen_khs')) {
            $dokumen_khsName = $nim . '_dokumen_khs.pdf';
            $request->file('dokumen_khs')->storeAs('uploads', $dokumen_khsName, 'public');
        }

        if ($request->hasFile('dokumen_penghasilan')) {
            $dokumen_penghasilanName = $nim . '_dokumen_penghasilan.pdf';
            $request->file('dokumen_penghasilan')->storeAs('uploads', $dokumen_penghasilanName, 'public');
        }

        if ($request->hasFile('dokumen_nilai_prestasi')) {
            $dokumen_nilai_prestasiName = $nim . '_dokumen_nilai_prestasi.pdf';
            $request->file('dokumen_nilai_prestasi')->storeAs('uploads', $dokumen_nilai_prestasiName, 'public');
        }


        // Store the data in the database
        BerkasMahasiswa::create([
            'nim' => $nim,
            'dokumen_kepribadian' => $dokumen_kepribadianName,
            'dokumen_khs' => $dokumen_khsName,
            'dokumen_penghasilan' => $dokumen_penghasilanName,
            'dokumen_nilai_prestasi' => $dokumen_nilai_prestasiName,
        ]);

        // Perform any other necessary database operations or tasks

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil ditambahkan !');
    }

    public function show($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('tb_mahasiswa', 'tb_berkas_mahasiswa.nim', '=', 'tb_mahasiswa.nim')
            ->where('tb_berkas_mahasiswa.nim', $nim)
            ->select('tb_berkas_mahasiswa.*', 'tb_mahasiswa.*')
            ->first();

        $file_path = new stdClass();
        if($berkasmahasiswa) {
            $file_path->dokumen_kepribadian = '/storage/uploads/' . $berkasmahasiswa->dokumen_kepribadian;
            $file_path->dokumen_khs = '/storage/uploads/' . $berkasmahasiswa->dokumen_khs;
            $file_path->dokumen_penghasilan = '/storage/uploads/' . $berkasmahasiswa->dokumen_penghasilan;
            $file_path->dokumen_nilai_prestasi = '/storage/uploads/' . $berkasmahasiswa->dokumen_nilai_prestasi;
            return view('berkasmahasiswa/show', data: compact('berkasmahasiswa', 'file_path'));
        } else {
            return redirect('/berkasmahasiswa')->with('danger', 'Data Berkas Belum ditinjau !');
        }

    }

    public function edit($nim)
    {
        $berkasmahasiswa =
            BerkasMahasiswa::join('tb_mahasiswa', 'tb_berkas_mahasiswa.nim', '=', 'tb_mahasiswa.nim')
            ->where('tb_berkas_mahasiswa.nim', $nim)
            ->select('tb_berkas_mahasiswa.*', 'tb_mahasiswa.*')
            ->first();

        return view('berkasmahasiswa/update', data: compact('berkasmahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'status' => 'required',
            'keterangan' => 'required'
        ]);

        //mengambil data yg akan diupdate
        $berkasmahasiswa = BerkasMahasiswa::where('nim', $nim)->first();
        $berkasmahasiswa->update($validatedData);

        return redirect('/berkasmahasiswa')->with('success', 'Data Berkas Mahasiswa Berhasil diedit !');
    }


    public function detail()
    {
        if(Session::get('user_level') == 'Admin') {
            //mengambil semua data diurutkan dari yg terbaru DESC
            $berkasmahasiswa = BerkasMahasiswa::latest()->paginate(5);
        } else {
            $nim = Session::get('user_nim');
            $berkasmahasiswa = BerkasMahasiswa::where('tb_berkas_mahasiswa.nim', $nim)->latest()->paginate(5);
        }

        //tampilkan halaman index
        return view('berkasmahasiswa/detail', data: compact('berkasmahasiswa'));
    }
}
