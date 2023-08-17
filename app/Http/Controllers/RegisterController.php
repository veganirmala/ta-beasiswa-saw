<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.registrasi')->with('title', 'Registrasi');
    }

    public function store(Request $request)
    {
        //membuat form validasi
        $validatedData = $request->validate([
            'nim' => 'required|max:11',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:tb_user,email',
            'password' => 'required|min:5|max:255'
        ]);

        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);
        //proses menambahkan level akses login
        $validatedData['level'] = 'Mahasiswa';
        //proses insert ke database
        $user = User::create($validatedData);
        //proses insert role ke database
        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        $defaultRole = Role::where('name', 'mahasiswa')->first();

        if ($defaultRole) {
            $user->assignRole($defaultRole);
        }

        //pindah ke form login dengan message success
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
