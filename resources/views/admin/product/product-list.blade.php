@extends('admin.layout.sidebar',['title'=>"Category"])
@section('content')
    <div class="col-md-12 mb-3">
        <form action="{{ route('admin.product.listview') }}" name="sortingForm" id="sortingForm" method="GET">
            <div class="col-md-12 row my-4">
                <div class="col-md-2">
                    <div class="float-left mx-3">Latest Product <a
                            href="{{ route('admin.product.listview') }}">Here</a>.
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
                <div class="col-md-6 float-right">
                    <a href="{{ route('admin.product.deleted') }}">
                        <button type="button" class="float-right btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                            Deleted Product
                        </button>
                    </a>
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
                    <td><a href="{{ route('admin.product.productDetail',$product->id) }}" class="text-dark">{{ $product->name }}</a></td>
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
                        <a href="{{ route('admin.product.productDetail',$product->id) }}" class="mx-1"><span class="badge bg-dark">Show</span></a>
                        <a href="{{ route('admin.product.edit',$product->id) }}" class="mx-1"><span class="badge bg-info">Edit</span></a>
                        <a href="#delete_product" data-id="{{ $product->id }}" class="mx-1 passingID" data-bs-toggle="modal"><span class="badge bg-danger">Delete</span></a>
{{--                        <a href="{{ route('admin.product.delete',$product->id) }}" onclick="return confirm('Are you sure?')" class="mx-1"><span class="badge bg-danger">Delete</span></a>--}}
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
    <div class="modal fade" id="delete_product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Are You Sure To Delete This
                            Product</strong></h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                <div class="modal-body">
                    <p>You can Also Restore from trash bin</p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"
                            aria-label="Close">Cancel
                    </button>
                    <form action="{{ route('admin.product.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <a href=""><input type="submit" class="btn btn-danger" value="Delete"/></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">
@endpush
@push('script')
        <script src="{{ asset('js/product/custom.js') }}"></script>
    <script>
        function submit() {
            $('#sortingForm').submit();
        }

        $('#category,#brands,#rating,#sorting,#no_of_record').change(function () {
            submit();
        });
    </script>
    <script>
        $(".passingID").click(function () {
            var ids = $(this).attr('data-id');
            $("#id").val( ids );
            $('#delete_product').modal('show');
        });
    </script>
@endpush
