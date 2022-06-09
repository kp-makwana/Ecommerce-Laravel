<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Address;
use App\Models\Profile_picture;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Store a secret message for the user.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function storeSecret(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill([
            'secret' => Crypt::encryptString($request->secret),
        ])->save();
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function register(UserRegisterRequest $request): array
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

        return ['success' => 'form submit successfully'];
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $result = User::where('email', $request->input('username'))->orWhere('username', $request->input('username'))->exists();
        if ($result) {
            if (Auth::attempt($request->only('username', 'password'), $request->filled('remember'))) {
                return redirect()->intended();
            }
            return redirect()->route('login')->with(['type' => 'error', 'message' => 'Invalid password']);
        }
        return redirect()->route('login')->with(['type' => 'error', 'message' => 'Invalid Username or password']);
    }

    public function forgetPasswordPage()
    {
        return view('forgetPassword');
    }

    public function forgetPassword(Request $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('login')->with(['status' => 'success', 'message' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        return view('resetPassword');
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => 'success', 'message' => __($status)])
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Session::put('url.intended',url()->previous()?:'/');
        Auth::logout();
        return redirect()->route('login');
    }

    public function profileUpdate($request): bool
    {
        #params
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $dob = $request->input('dob');
        $country_code = $request->input('country_code');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $user_address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
        $fileUpload = $request->file('fileUpload');

        #user update
        $user = User::find(Auth::user()->id);
        $user->f_name = $f_name;
        $user->l_name = $l_name;
        $user->dob = $dob;
        $user->country_code = $country_code;
        $user->contact_no = $phone;
        $user->gender = $gender;
        $user->email = $email;
        $user->save();

        #user address update
        $address = Address::where('user_id', $user->id)->first();
        $address->address = $user_address;
        $address->city_id = $city;
        $address->state_id = $state;
        $address->country_id = $country;
        $address->zipcode = $zipcode;
        $address->save();

        #user Profile update
        if ($request->hasFile('fileUpload')) {
            $profile = Profile_picture::where('user_id', $user->id)->first();
            if ($profile) {
                //delete old file
                //File::delete($image_path);
                unlink(public_path('/storage/UserProfile/' . $profile->name));
            } else {
                $profile = new Profile_picture();
            }
            #params
            $original_name = $fileUpload->getClientOriginalName();
            $mimeType = $fileUpload->getMimeType();
            $getSize = $fileUpload->getSize();
            $image_name = time() . '.' . $fileUpload->extension();

            #resize image & store
            $image_resize = Image::make($fileUpload->getRealPath());
            $image_resize->resize(225, 225);

            #save data
            $profile->user_id = $user->id;
            $profile->name = $image_name;
            $profile->original_name = $original_name;
            $profile->mime_type = $mimeType;
            $profile->size = $getSize;

            $path = public_path() . '/storage/UserProfile/';
            if (file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $image_resize->save($path . $image_name);
            $profile->save();
        }
        return true;
    }
}
