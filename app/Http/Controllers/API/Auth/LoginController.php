<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use Response;
    public function login(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return $this->error("Invalid Email or Password.");
        }
        $token = $user->createToken('api_token')->plainTextToken;
        return (new UsersResource($user))->additional(['token' => $token]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success(null, "Logout successfully.");
    }

}
