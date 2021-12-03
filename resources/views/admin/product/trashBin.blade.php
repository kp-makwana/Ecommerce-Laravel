@extends('admin.layout.sidebar',['title'=>"Category"])
@section('content')
    <div class="col-md-12 mb-3">
        <form action="{{ route('admin.product.deleted') }}" name="sortingForm" id="sortingForm" method="GET">
            <div class="col-md-12 row my-4">
                <div class="col-md-2">
                    <div class="float-left mx-3">All Deleted Product <a
                            href="{{ route('admin.product.deleted') }}">Here</a>.
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
    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
        <table class="table table-custom table-lg" id="customers">
            <thead>
            <tr>
                <th><b>@sortablelink('id')</b></th>
                <th><b><a href="#">Photo</a></b></th>
                <th><b>@sortablelink('name')</b></th>
                <th><b>@sortablelink('sale_price','Price')</b></th>
                <th><b>@sortablelink('quantity','Stock')</b></th>
                <th><b>@sortablelink('avg_rating','Rating')</b></th>
                <th><b>@sortablelink('updated_at','Last Update Date')</b></th>
                <th class="text-center"><b><a href="#">Actions</a></b></th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <span>#{{ $product->id }}</span>
                    </td>
                    <td>
                        <div class="avatar avatar-info">
                            @if($product->productImage[0])
                                <img class="" width="40"
                                     src="{{ $product->productImage[0] ? asset('storage/ProductImages/'.$product->productImage[0]->name) : asset('images/user.png') }}"
                                     alt="">
                            @else
                                <span class="avatar-text rounded-circle"
                                      style="background-color: {{ $bladeService->randomColor() }}">{{ substr($product->name,0,1) }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span>{{ $product->name }}</span>
                    </td>
                    <td>
                        <span>{{ $product->sale_price }}</span>
                    </td>
                    <td>
                        <span>{{ $product->quantity }}</span>
                    </td>
                    <td>
                        <span>{{ $product->avg_rating }}</span>
                    </td>
                    <td>
                        <span>{{ $product->updated_at }}</span>
                    </td>
                    <td class="text-center">
                        <a href="#" class="mx-1"><span class="badge bg-success">Restore</span></a>
                        <a href="#" class="mx-1"><span class="badge bg-danger">Delete</span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No Data Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $products->appends($request)->links() }}
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">
@endpush
@push('script')
    {{--    <script src="{{ asset('js/product/product.js') }}"></script>--}}
    <script>
        function submit() {
            $('#sortingForm').submit();
        }

        $('#category,#brands,#rating,#sorting,#no_of_record').change(function () {
            submit();
        });
    </script>
@endpush
