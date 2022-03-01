@extends('layout.guest-sidebar',['title'=>'Forget Password'])

@section('content')
    <div class="col-md-7 col-lg-6 ml-auto mt-5">
        <form action="{{ route('forgetPassword') }}" method="POST">
            @csrf
            <div class="row my-5">
                <!-- Email Address -->
                <div class="input-group col-lg-12 mb-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                    </div>
                    <input id="email" type="email" name="email" placeholder="Enter Email"
                           class="form-control bg-white border-left-0 border-md">
                </div>
                @error('email')<p class="text-danger ml-3">*{{ $message }}</p>@enderror

            <!-- Submit Button -->
                <div class="form-group col-lg-12 mx-auto mb-0">
                    <button type="submit" class="btn btn-primary btn-block py-2">
                        <span class="font-weight-bold">Send Mail</span>
                    </button>
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
