<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', ['user' => Auth::user()]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Session::put('url.intended',url()->previous());
        Auth::logout();
        return redirect()->route('login');
    }

    public function product()
    {
        return view('admin.product');
    }

}
