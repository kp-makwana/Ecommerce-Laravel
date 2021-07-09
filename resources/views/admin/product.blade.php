@extends('admin.layout.sidebar',['title'=>'Product'])
@section('nav')
    {{--    <nav class="navbar navbar-expand-lg bg-dark">--}}
    {{--        <div class="container-fluid">--}}

    {{--            <button type="button" id="sidebarCollapse" class="btn btn-primary">--}}
    {{--                <i class="fa fa-bars"></i>--}}
    {{--                <span class="sr-only">Toggle Menu</span>--}}
    {{--            </button>--}}
    {{--            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"--}}
    {{--                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
    {{--                    aria-expanded="false" aria-label="Toggle navigation">--}}
    {{--                <i class="fa fa-bars"></i>--}}
    {{--            </button>--}}
    {{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--                <ul class="nav navbar-nav ml-auto">--}}
    {{--                    <li class="nav-item active">--}}
    {{--                        <a class="nav-link" href="#">Latest Product</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item dropdown-header dropdown mr-2 dropdown">--}}
    {{--                        <a class="dropdown-toggle" href="#category_menu" id="navbarDropdown" role="button"--}}
    {{--                           onclick="myFunction()"--}}
    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                            Category--}}
    {{--                        </a>--}}
    {{--                        <div id="myDropdown" class="dropdown-content">--}}
    {{--                            <input type="text" placeholder="Search.." id="myInput" class="bi bi-search"--}}
    {{--                                   autocomplete="off"--}}
    {{--                                   onkeyup="filterFunction()">--}}
    {{--                            <div class="dropdown-scrollbar">--}}
    {{--                                @foreach(App\Models\Category::OrderBy('name')->get() as $value)--}}
    {{--                                    <a class="hover" href="">{{ $value->name }}</a>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item dropdown-header dropdown mr-2">--}}
    {{--                        <a class="dropdown-toggle" href="#brand_menu" id="navbarDropdown" role="button"--}}
    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                            Brand--}}
    {{--                        </a>--}}
    {{--                        <div class="dropdown-menu" id="brand_menu" aria-labelledby="navbarDropdown">--}}
    {{--                            <ul class="dropdown-item"><input type="checkbox" class="mr-2" name="" id="">All Product</ul>--}}
    {{--                            <ul class="dropdown-item"><input type="checkbox" class="mr-2" name="" id="">All Product</ul>--}}
    {{--                            <ul class="dropdown-item"><input type="checkbox" class="mr-2" name="" id="">All Product</ul>--}}
    {{--                            <ul class="dropdown-item"><input type="checkbox" class="mr-2" name="" id="">All Product</ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}

    {{--                    <li class="nav-item dropdown-header dropdown mr-2">--}}
    {{--                        <a class="dropdown-toggle" href="#brand_menu" id="navbarDropdown" role="button"--}}
    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--                            Rating--}}
    {{--                        </a>--}}
    {{--                        <div class="dropdown-menu" id="brand_menu" aria-labelledby="navbarDropdown">--}}
    {{--                            <ul class="dropdown-item"><input type="checkbox" class="mr-2" name="" id="">All Product</ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item dropdown-header dropdown mr-2">--}}
    {{--                        <form class="form-inline">--}}
    {{--                            <input class="form-control bg-dark text-white mr-sm-2" type="search" placeholder="Search"--}}
    {{--                                   aria-label="Search">--}}
    {{--                            <a href="">--}}
    {{--                                <button class="btn  btn-primary my-2 my-sm-0" type="submit">Search</button>--}}
    {{--                            </a>--}}
    {{--                        </form>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </nav>--}}
@endsection
@section('content')
<div id="main">
    <div class="col-md-12 row">
        <div class="col-md-2">
            <x-Category/>
        </div>
        <div class="col-md-2">
            <x-Brand/>
        </div>
        <div class="col-md-2">
            <x-ProductRating/>
        </div>
        <div class="col-md-4 float-right">
            <input type="search" class="form-control float-right bg-dark text-white" placeholder="Search..."
                   aria-label="Search">
        </div>
        <div class="col-md-2 float-right">
            <a href="" class="ml-5">
                <button class="btn btn-primary">Search..</button>
            </a>
        </div>
    </div>
    <div class="my-3">
        <div class="text-lg-left mx-3">Latest Product <a href="{{ route('admin.product.index') }}">Here</a>.</div>
        <div class="text-lg-right"><a href="{{ route('admin.product.add') }}" class="btn btn-success">Add New
                Product</a></div>
    </div>
    <ul class="cd-gallery">
        @foreach($products as $product)
            <li>
                <div class="py-4">
                    <span class="off bg-secondary">OFFER</span>
                    @php
                        $rating = $bladeService->rating($product->id);
                        $class = $bladeService->ratingClass($rating);
                    @endphp
                    <span
                        class="rating fa fa-star bg-{{ $class }}">&nbsp;&nbsp;{{$rating}}</span>
                    <span
                        class="on bg-{{ $product->quantity == 0 ? "danger":"success" }}">{{ $product->quantity }}</span>
                </div>
                <ul class="cd-item-wrapper">
                    @foreach($product->productImage as $key => $product_img)
                        <li class="{{ $key == 0 ? "selected":"move-right"}}" data-sale="true"
                            data-price="&#8377; {{ $product->sale_price }}">
                            <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                                 alt="Preview image">
                        </li>
                    @endforeach
                </ul> <!-- cd-item-wrapper -->

                <div class="cd-item-info">
                    <b><a href="">{{ $product->name }}</a></b>
                    <em class="cd-price"><em style="font-size: small">Purchase Price:</em>
                        &#8377; {{ $product->purchase_price }}</em>
                </div> <!-- cd-item-info -->

            </li>

        @endforeach
        {{ $products->links() }}
    </ul> <!-- cd-gallery -->
</div>
@endsection
@push('script')
    <script>
        $('#category').change(function () {
            var categoryId = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.product.sortBy') }}',
                data: {
                    categoryId: categoryId,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#main').html(data)
                }
            });
        });
    </script>
@endpush
@push('style')
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">
    <style>
        #myInput {
            box-sizing: inherit;
            background-position: 14px 12px;
            background-repeat: no-repeat;
            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .hover:hover {
            background: #aaa;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 230px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .show {
            display: block;
        }

        .dropdown-scrollbar {
            max-height: 400px;
            overflow: scroll;
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
{{--    <script>--}}
{{--        const searchButton = document.getElementById('search-button');--}}
{{--        const searchInput = document.getElementById('search-input');--}}
{{--        searchButton.addEventListener('click', () => {--}}
{{--            const inputValue = searchInput.value;--}}
{{--            alert(inputValue);--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endpush
