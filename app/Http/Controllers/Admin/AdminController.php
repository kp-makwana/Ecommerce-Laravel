<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function product()
    {
        return view('admin.product');
    }
}
