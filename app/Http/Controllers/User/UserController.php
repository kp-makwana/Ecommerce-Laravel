<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('user.editprofile', [
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
            'user' => Auth::user()
        ]);
    }

    public function update(UserUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        (new \App\Http\Controllers\UserController)->profileUpdate($request);
        return redirect()->route('user.profile.index');
    }

    public function checkPassword(Request $request): bool
    {
        return Hash::check($request->password, Auth::user()->getAuthPassword());
    }

    public function changePassword(Request $request)
    {
        $password = $request->password;
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        return $user->save();
    }
}
