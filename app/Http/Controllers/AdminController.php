<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', ['user' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
