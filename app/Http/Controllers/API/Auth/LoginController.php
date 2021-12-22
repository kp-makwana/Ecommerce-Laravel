<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Response;

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token', [request()->getClientIp()])->plainTextToken;
            return (new UsersResource(auth()->user()))->additional(['token' => $token]);
        } else {
            return $this->error("Invalid Email or Password.");
        }
    }

    public function userDetails(Request $request): UsersResource
    {
        return (new UsersResource(auth()->user()));
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->user()->tokens()->delete();
        return $this->success(null, "Logout successfully.");
    }

}
