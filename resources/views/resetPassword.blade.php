@extends('layout.guest-sidebar',['title'=>'Reset Password'])

@section('content')
    <!-- Registeration Form -->
    <div class="col-md-7 col-lg-6 ml-auto mt-5">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="row my-5">
                <input type="hidden" name="token" value="{{ request()->input('token') }}">
                <input type="hidden" name="email" value="{{ request()->input('email') }}">

                <!-- Email Address -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                                    </span>
                    </div>
                    <input id="password" type="password" name="password" placeholder="Enter password"
                           class="form-control bg-white border-left-0 border-md" value="Test@123">
                </div>
                @error('password')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- Password -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                           <i class="fa fa-lock text-muted"></i>
                            </span>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           placeholder="Confirm password"
                           class="form-control bg-white border-left-0 border-md" value="Test@123">
                </div>
                @error('email')<p class="text-danger ml-3">*{{ $message }}</p>@enderror
                @if(Session::has('type'))
                    <p class="text-danger ml-3">*{{ Session::get('message')}}</p>
            @endif



            <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Login</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

