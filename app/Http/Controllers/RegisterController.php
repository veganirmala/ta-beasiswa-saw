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
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|max:255'
        ]);

        //proses enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        //proses insert ke database
        $user = User::create($validatedData);

        $defaultRole = Role::where('name', 'mahasiswa')->first();

        if ($defaultRole) {
            $user->assignRole($defaultRole);
        }

        //pindah ke form login dengan message success
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
