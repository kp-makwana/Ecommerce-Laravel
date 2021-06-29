<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function register(UserRegisterRequest $request)
    {
        $f_name = $request->input('first_name');
        $l_name = $request->input('last_name');
        $dob = $request->input('dob');
        $country_code = $request->input('country_code');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();
        $user->f_name = $f_name;
        $user->l_name = $l_name;
        $user->dob = $dob;
        $user->country_code = $country_code;
        $user->contact_no = $phone;
        $user->gender = $gender;
        $user->email = $email;
        $user->username = $email;
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->route('login');
    }

    public function login(LoginRequest $request)
    {
        $result = User::where('email', $request->input('username'))->exists();
        if ($result) {
            if (Auth::attempt($request->only('username', 'password'), $request->filled('remember'))) {
                if (Auth()->user()->role === "admin") {
                    return redirect()->route('admin.index');
                }
                return redirect()->route('user.profile.index');
            }
            return redirect()->route('login')->with(['type' => 'error', 'message' => 'Invalid password']);
        }
        return redirect()->route('login')->with(['type' => 'error', 'message' => 'Invalid Username or password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
