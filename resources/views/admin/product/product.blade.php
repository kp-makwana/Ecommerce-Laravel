@extends('admin.layout.sidebar',['title'=>'Product'])
@section('content')
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
                    <x-Sorting sorting="{{ $request['sorting'] ?? '0' }}"/>
                </div>
                <div class="col-md-1">
                    <lable for="orderBy">Number of Product:</lable>
                </div>
                <div class="col-md-1">
                    <x-NumberOfRow record="{{ $request['no_of_record'] ?? 10}}"/>
                </div>
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
                               class="form-control float-right"
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
            <li class="custom-product">
                <div class="py-4">
                    <span
                        class="rating fa fa-star bg-{{ $bladeService->ratingClass($product->avg_rating) }}">&nbsp;&nbsp;{{$product->avg_rating ?? "N/A"}}</span>
                    <span
                        class="on text-white bg-{{ $product->quantity == 0 ? "danger":"success" }}">{{ $product->quantity }}</span>
                </div>
                <ul class="cd-item-wrapper">
                    @foreach($product->productImage as $key => $product_img)
                        <li class=" {{ $key == 0 ? "selected":"move-right"}}" data-sale="true"
                            data-price="&#8377; {{ $product->sale_price }}">
                            <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                                 alt="Preview image">
                        </li>
                    @endforeach
                </ul> <!-- cd-item-wrapper -->

                <div class="cd-item-info">
                    <b><a href="{{ route('admin.product.productDetail',$product->id) }}">{{ $product->name }}</a></b>
                    <em class="cd-price text-success"><em style="font-size: small">Purchase Price:</em>
                        &#8377; {{ $product->purchase_price }}</em>
                </div> <!-- cd-item-info -->
            </li>
        @empty
            <div class="w-75 col-md-10">
                <div class="text-lg-center"><h4 class="text-danger">No Data Found</h4></div>
                <img src="{{asset('images/no-data.png')}}" class="img-fluid" alt="No Data Found"></div>
        @endforelse
    </ul>
    {{ $products->appends($request)->links() }}
@endsection
@push('style')
    {{--    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">--}}
@endpush
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
    <script>
        function submit() {
            $('#sortingForm').submit();
        }

        $('#category,#brands,#rating,#sorting,#no_of_record').change(function () {
            submit();
        });
    </script>
@endpush
