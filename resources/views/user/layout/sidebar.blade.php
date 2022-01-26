<!doctype html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap2.min.css') }}">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{--    <script src="{{ asset('js/popper.js') }}"></script>--}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{--    <script src="{{asset('js/main.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">
    {{--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    @stack('style')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{--    form validation--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
            @php $user = App\Models\User::find(Auth::user()->id) @endphp
            <img
                src="{{ $user->ProfilePicture? asset('storage/UserProfile/'.$user->ProfilePicture->name) : asset('images/user.png') }}"
                class="img logo rounded-circle mb-5">
            <a class="mb-5">{{ $user->fullname  }}</a>
            <ul class="list-unstyled components my-4">
                <li class="{{ request()->is('user/dashboard/*') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.index') }}">Home</a>
                </li>
                <li class="{{ request()->is('user/profile/*') ? 'active' : '' }}">
                    <a href="{{ route('user.profile.index') }}">My Profile</a>
                </li>
                <li class="{{ request()->is('user/product/*') ? 'active' : '' }}">
                    <a href="{{ route('user.product.index') }}">Product</a>
                </li>
                <li class="{{ request()->is('user/order/*') ? 'active' : '' }}">
                    <a href="{{ route('user.order.index') }}">Order</a>
                </li>
                <li class="{{ request()->is('user/wishlist/*') ? 'active' : '' }}">
                    <a href="{{ route('user.wishlist.index') }}">My Wishlist</a>
                </li>
                <li class="{{ request()->is('user/cart/*') ? 'active' : '' }}">
                    <a href="{{ route('user.viewCart') }}">My Cart</a>
                </li>
                <li class="{{ request()->is('user/help/*') ? 'active' : '' }}">
                    <a href="{{ route('user.help.index') }}">Help & Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a
                        href="{{ route('login') }}">Colorlib.com</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid bg-dark">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">{{ Auth::user()->FullName }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">More</a>
                        </li>
                        <li class="nav-item">
                            @php $count = \App\Models\Cart::where('user_id',Auth::user()->id)->count()@endphp
                            <a class="nav-link" href="{{ route('user.viewCart') }}"><i class="fa fa-shopping-cart"></i>
                                cart{{ ($count>0)?('('.$count.')'):'' }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</div>
@stack('script')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(function () {
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif
    });
</script>
</body>
</html>
