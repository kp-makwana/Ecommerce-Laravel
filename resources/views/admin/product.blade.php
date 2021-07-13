@extends('admin.layout.sidebar',['title'=>'Product'])
@section('content')
    <div>
        <div class="col-md-12">
            <form action="{{ route('admin.product.index') }}" name="sortingForm" id="sortingForm" method="GET">
                <div class="col-md-12 row my-4">
                    <div class="col-md-2">
                        <div class="text-lg-left mx-3">Latest Product <a
                                href="{{ route('admin.product.index') }}">Here</a>.
                        </div>
                    </div>
                    <div class="col-md-1">
                        <lable for="sorting">Sort By:</lable>
                    </div>
                    <div class="col-md-1">
                        <x-Sorting sorting="{{ $request['sorting'] ?? 'desc' }}"/>
                    </div>
                    <div class="col-md-1">
                        <lable for="orderBy">Number of rows:</lable>
                    </div>
                    <div class="col-md-1">
                        <x-NumberOfRow record="{{ $request['no_of_record'] ?? 10}}"/>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="col-md-12 text-lg-right"><a href="{{ route('admin.product.add') }}"--}}
{{--                                                                class="btn btn-success">Add New--}}
{{--                                Product</a></div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-2">
                        <x-Category category="{{ $request['category'] ?? null }}"/>
                    </div>
                    <div class="col-md-2">
                        <x-Brand brand="{{ $request['brands'] ?? null }}"/>
                    </div>
                    <div class="col-md-2">
                        <x-ProductRating selectedRating="{{ $request['rating'] ?? null }}"/>
                    </div>
                    <div class="col-md-4 float-right pl-5">
                        <div class="col-md-12 text-lg-right">
                            <input type="search" name="search" id="search"
                                   class="form-control float-right bg-dark text-white"
                                   placeholder="Search..." value="{{ $request['search'] ?? null }}"
                                   aria-label="Search">
                        </div>
                    </div>
                    <div class="col-md-2 float-right">
                        <div class="col-md-12 text-lg-right">
                            <a href="" class="ml-4">
                                <input type="submit" class="px-5 btn btn-primary"/>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <ul class="cd-gallery">
            @forelse($products as $product)
                <li>
                    <div class="py-4">
                        <span class="off bg-secondary">OFFER</span>
                        @php
                            $class = $bladeService->ratingClass($product->avg_rating);
                        @endphp
                        <span
                            class="rating fa fa-star bg-{{ $class }}">&nbsp;&nbsp;{{$product->avg_rating ?? "N/A"}}</span>
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
                    {{--                    <span class="text-sm-left text-danger">{{ $product->brand }}</span>--}}
                    {{--                    <span class="text-sm-right text-danger">{{ $product->category }}</span>--}}

                </li>
            @empty
                <div class="w-75 col-md-10">
                    <div class="text-lg-center"><h4 class="text-danger">No Data Found</h4></div>
                    <img src="{{asset('images/no-data.png')}}" class="img-fluid" alt="No Data Found"></div>
            @endforelse
            {{ $products->appends($request)->links() }}
        </ul>
    </div>
@endsection
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
    <script>
        function submit() {
            $('#sortingForm').submit();
        }
        $('#category,#brands,#rating,#sorting,#no_of_record') .change(function () {
            submit();
        });
    </script>

    {{--    <script>--}}
    {{--        function myFunction() {--}}
    {{--            document.getElementById("myDropdown").classList.toggle("show");--}}
    {{--        }--}}

    {{--        function filterFunction() {--}}
    {{--            var input, filter, ul, li, a, i;--}}
    {{--            input = document.getElementById("myInput");--}}
    {{--            filter = input.value.toUpperCase();--}}
    {{--            div = document.getElementById("myDropdown");--}}
    {{--            a = div.getElementsByTagName("a");--}}
    {{--            for (i = 0; i < a.length; i++) {--}}
    {{--                txtValue = a[i].textContent || a[i].innerText;--}}
    {{--                if (txtValue.toUpperCase().indexOf(filter) > -1) {--}}
    {{--                    a[i].style.display = "";--}}
    {{--                } else {--}}
    {{--                    a[i].style.display = "none";--}}
    {{--                }--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
@endpush
