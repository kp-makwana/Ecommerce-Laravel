<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\UserSignupRequest;
use App\Http\Requests\API\UserUpdateRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Resources\UsersResource;
use App\Models\Address;
use App\Models\User;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function signup(UserSignupRequest $request)
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

        $address = new Address;
        $address->user_id = $user->id;
        $address->save();

        $token = $user->createToken('auth_token', [request()->getClientIp()])->plainTextToken;
        return (new UsersResource($user))->additional(['token' => $token]);
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->user()->tokens()->delete();
        return $this->success(null, "Logout successfully.");
    }

    public function userDetails(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $address = $user->address;
        $data = [
            'first_name' => $user->f_name,
            'last_name' => $user->l_name,
            'profile_image' => asset(($user->ProfilePicture) ? 'storage/UserProfile/' . $user->ProfilePicture->name:'images/user.png'),
            'profile_complete' => '95%',
            'details'=>$user->description,
            'dob' => $user->dob,
            'phone' => $user->contact_no,
            'gender' => $user->gender,
            'email' => $user->email,
            'country_code'=>$user->country_code,
            'str_address' => $address->address,
            'zipcode' => $address->zipcode,
            'city' => $address->city->name ?? null,
            'state' => $address->state->name ?? null,
            'country' => $address->country->name ?? null,
        ];
        return $this->success($data);
    }

    public function userUpdate(UserUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        (new \App\Http\Controllers\UserController)->profileUpdate($request);
        return Response()->json(['message' => 'profile data update successfully']);
    }

    public function checkPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        if (Hash::check($request->password, Auth::user()->getAuthPassword())) {
            return Response()->json(['result' => true, 'message' => 'Current password match.']);
        }
        return Response()->json(['result' => false, 'message' => 'Current password Not match.']);
    }

    public function changePassword(PasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $password = $request->password;
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        if ($user->save()) {
            return Response()->json(['result' => true, 'message' => 'Password change successfully.']);
        }
        return Response()->json(['result' => false, 'message' => 'Password change fail  .']);
    }

    public function checkAuth(): bool
    {
        return Auth::check();
    }
}
