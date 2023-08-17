<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login')->with('title', 'Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            //ambil data user
            $user = Auth::user();
            //membuat session yang akan melekat setelah login
            session()->put('user_id', $user->id);
            session()->put('user_nim', $user->nim);
            session()->put('user_level', $user->level);
            $request->session()->regenerate();

            if($user->level == "Admin") {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/berkasmahasiswa');
            }
        }
        return back()->withInput(
            $request->except('password')
        )->with('error', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
