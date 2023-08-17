<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class Dashboard extends Controller
{
    public function index()
    {
        if(Session::get('user_level') == 'Admin') {
            return view('dashboard');
        } else {
            return redirect()->intended('/berkasmahasiswa');
        }
    }
}
