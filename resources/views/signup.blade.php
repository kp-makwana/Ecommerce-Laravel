@extends('layout.guest-sidebar')

@section('content')

    <!-- Registeration Form -->
    <div class="col-md-7 col-lg-6 ml-auto mt-4">
        <form action="{{ route('user.register') }}" method="POST" id="registration_form" name="registration_form">
            @csrf
            <div class="row">

                <!-- First Name -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                    </div>
                    <input id="first_name" type="text" name="first_name" placeholder="First Name"
                           value="{{ old('first_name') }}" class="form-control bg-white border-left-0 border-md">
                </div>
                @error('first_name')
                <p class="text-danger ml-3">{{ $message }}</p>
                @enderror

            <!-- Last Name -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                    </div>
                    <input id="last_name" type="text" name="last_name" placeholder="Last Name"
                           value="{{ old('last_name') }}" class="form-control bg-white border-left-0 border-md">
                </div>
                @error('last_name')
                <p class="text-danger ml-3">{{ $message }}</p>
                @enderror

            <!-- Email Address -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                    </div>
                    <input id="email" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}"
                           class="form-control bg-white border-left-0 border-md">
                </div>
                @error('email')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- Phone Number -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                    </div>
                    <select id="country_code" name="country_code" style="max-width: 80px"
                            class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                        {{ $country = App\Models\Country::all() }}

                        @foreach($country as $count)
                            <option value="{{ $count->country_code }}">+{{ $count->country_code }}</option>
                        @endforeach
                    </select>
                    <input id="phone" type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
                           class="form-control bg-white border-md border-left-0 pl-3">
                </div>
                @error('phone')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- gender -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                    </div>
                    <select id="gender" name="gender" value="{{ old('gender') }}"
                            class="form-control custom-select bg-white border-left-0 border-md">
                        <option value="" disabled selected>select gender</option>
                        @foreach(App\Models\User::GENDER as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                @error('gender')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- date of birth -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-calendar-date" viewBox="0 0 16 16">
  <path
      d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
  <path
      d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
                            </span>
                    </div>
                    <input id="dob" type="date" value="{{ old('dob') }}" name="dob"
                           class="form-control bg-white border-left-0 border-md">
                </div>
                @error('dob')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- Password -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                    </div>
                    <input id="password" type="password" name="password" placeholder="Password"
                           class="form-control bg-white border-left-0 border-md">
                </div>
                @error('password')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- Password Confirmation -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                    </div>
                    <input id="c_password" type="password" name="c_password" placeholder="Confirm Password"
                           class="form-control bg-white border-left-0 border-md">
                </div>
                @error('c_password')<p class="text-danger ml-3">*{{ $message }}</p>@enderror
                <p id="pass" class="text-danger ml-3"></p>

                <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Create your account</span>
                    </button>
                </div>

                <!-- Divider Text -->
                <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                    <div class="border-bottom w-100 ml-5"></div>
                    <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                    <div class="border-bottom w-100 mr-5"></div>
                </div>

                <!-- Social Login -->
                <div class="form-group col-lg-12 mx-auto">
                    <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                        <i class="fa fa-facebook-f mr-2"></i>
                        <span class="font-weight-bold">Continue with Facebook</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                        <i class="fa fa-twitter mr-2"></i>
                        <span class="font-weight-bold">Continue with Twitter</span>
                    </a>
                </div>

                <!-- Already Registered -->
                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold"> Already Registered?<a href="{{ route('login') }}"
                                                                                  class="text-primary ml-2">Login</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection

