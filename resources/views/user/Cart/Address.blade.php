@extends('user.layout.sidebar',['title'=>'Select Address'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">{{ $data['total_item'] ?? 0 }}items
                        </div>
                    </div>
                </div>
                @foreach($data['carts'] as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                                    src="{{ $item['product_image'] }}">
                            </div>
                            <div class="col">
                                <div class="row text-muted">{{ $item['product_name'] }}</div>
                                @if(count($item['offer']) > 0)
                                    <div class="text-success" data-toggle="tooltip" data-placement="bottom"
                                         title="{{ $item['offer'] }}"
                                    >
                                        {{ count($item['offer'])}} Offers applied <span class="fa fa-info"></span>
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <a href="#" id="cartQuantityRemove"
                                   data-url="{{ route('user.cart.cartQuantityRemove',$item['product_id']) }}"
                                   data-id="{{ $item['product_id'] }}"
                                   class="{{ ($item['count'] <= 1) ? 'cartQuantityRemove custom-disable':'cartQuantityRemove' }}"
                                >-</a>
                                <a href="#" id="count_{{ $item['product_id'] }}" class="border"
                                   data-id="{{ $item['product_id'] }}">{{ $item['count'] }}</a>
                                <a href="#" id="cartQuantityAdd"
                                   class="{{ ($item['count'] == 5) ? 'cartQuantityAdd custom-disable':'cartQuantityAdd' }}"
                                   data-url="{{ route('user.cart.cartQuantityAdd',$item['product_id']) }}"
                                   data-id="{{ $item['product_id'] }}"
                                >+</a></div>
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
                @endforeach
                <div class="back-to-shop"><a href="{{ route('user.product.index') }}">&leftarrow;</a><span
                        class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <x-summary :data="$data"/>
                <a class="btn" id="checkout" href="{{ route('user.cart.address') }}">PLACE
                    ORDER
                </a>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
@push('script')
    <script>

    </script>
@endpush
