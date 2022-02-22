@extends('user.layout.sidebar',['title'=>'MY Cart'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div
                            class="col align-self-center text-right text-muted">@if($data['total_item'] >0){{ $data['total_item'] ?? 0 }}
                            items @endif
                        </div>
                    </div>
                </div>
                @forelse($data['carts'] as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <a href="{{ route('user.product.productDetail',$item['product_id']) }}">
                                    <img class="img-fluid" src="{{ $item['product_image'] }}">
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('user.product.productDetail',$item['product_id']) }}" class="mt-0">
                                    <div class="row text-muted">{{ $item['product_name'] }}</div>
                                </a>
                                @if(count($item['offer']) > 0)
                                    <div class="text-success mt-0" data-toggle="tooltip" data-placement="bottom"
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
            @if($data['total_item'] >0)
                <div class="col-md-4 summary">
                    <x-summary :summary="$data"/>
                    <a class="btn btn-success" style="width: 100%;" href="{{ route('user.cart.address') }}">PLACE
                        ORDER
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="delete_product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Remove Item</strong></h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this item?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"
                            aria-label="Close">CANCEL
                    </button>
                    <a id="route">
                        <button class="btn btn-danger">
                            REMOVE
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(".passingID").click(function () {
            var ids = $(this).attr('data-id');
            $("#route").attr("href", ids);
            $('#delete_product').modal('show');
        });
    </script>
    <script>
        $(".cartQuantityAdd").click(function () {
            const url = $(this).attr('data-url');
            const id = $(this).attr('data-id');
            const q = '#count_' + id
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    location.reload();
                }
            });
        });
        $(".cartQuantityRemove").click(function () {
            const url = $(this).attr('data-url');
            const id = $(this).attr('data-id');
            const q = '#count_' + id
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    location.reload();
                }
            });
        });
    </script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
    <style>
        .custom-disable {
            pointer-events: none;
            cursor: default;
            text-decoration: none;
            color: black;
        }
    </style>
@endpush
