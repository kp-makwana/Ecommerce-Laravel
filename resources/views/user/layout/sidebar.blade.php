<!doctype html>
<html lang="en">
<head>
    <title>E-commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{--    <script src="{{ asset('js/popper.js') }}"></script>--}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{--    <script src="{{asset('js/main.js')}}"></script>--}}
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
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
                <li class="{{ request()->is('user/order') ? 'active' : '' }}">
                    <a href="#">Order</a>
                </li>
                <li class="{{ request()->is('user/wishlist') ? 'active' : '' }}">
                    <a href="#">My Wishlist</a>
                </li>
                <li class="{{ request()->is('user/cart') ? 'active' : '' }}">
                    <a href="#">My Cart</a>
                </li>
                <li class="{{ request()->is('user/help') ? 'active' : '' }}">
                    <a href="#">Help & Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib.com</a>
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
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Portfolio</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
