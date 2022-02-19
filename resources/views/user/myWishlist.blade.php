@extends('user.layout.sidebar',['title'=>'My WishList'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-12 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>My WishList</b></h4>
                        </div>
                        <div
                            class="col align-self-center text-right text-muted">@if($data['total_item'] >0){{ $data['total_item'] ?? 0 }}
                            items @endif
                        </div>
                    </div>
                </div>
                @forelse($products as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-1">
                                <a href="{{ route('user.product.productDetail',$item['product_id']) }}">
                                    <img class="img-fluid" src="{{ $item['product_image'] }}">
                                </a>
                            </div>
                            <div class="col">
                                <div class="row text-muted">
                                    <a href="{{ route('user.product.productDetail',$item['product_id']) }}">{{ $item['product_name'] }}</a>
                                </div>
                            </div>
                            <div class="col">
                                <span
                                    class="fa px-2 py-2 text-white rounded my-2 fa-star bg-{{ $bladeService->ratingClass(4.4) }}">&nbsp;&nbsp;{{ 4.4 ?? "N/A"}}</span>
                                <span class="mx-3 text-muted">(450)<span class="mx-2"> Ratings</span></span>
                            </div>
                            <div class="col">
                                <div class="">
                                    <b class="mr-4">
                                        &#8377; {{ $item['price'] }}
                                    </b>
                                    &#8377;
                                    <span style="text-decoration: line-through">
                                     {{ $item['original_price'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <span class="close">
                                    <a href="#delete_product" class="passingID text-danger"
                                       data-id="{{ route('user.product.removeFromCart',$item['id']) }}"
                                       data-bs-toggle="modal">REMOVE</a>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="back-to-shop mt-4">
                        <p>Your Card is empty</p>
                    </div>
                @endforelse
                <div class="back-to-shop mt-4">
                    <a class="btn btn-info mt-4" style="width: 25%" href="{{ route('user.product.index') }}">Back to
                        shop</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
