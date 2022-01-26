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
                        <div class="col align-self-center text-right text-muted">{{ $data['total_item'] }} items</div>
                    </div>
                </div>
                @foreach($carts as $item)
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
                                   class={{ ($item['count'] == 1) ? ' custom-disable':'' }}>-</a>
                                <a href="#" class="border">{{ $item['count'] }}</a>
                                <a href="#" id="cartQuantityAdd"
                                   data-id="{{ route('user.cart.cartQuantityAdd',$item['product_id']) }}"
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
                    {{--@empty
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="row text-center">
                                    <img class="img-fluid" src="{{ asset('images/emptyCart.png') }}" alt="">
                                    <p>Your Card is empty</p>
                                    <a href="{{ route('user.product.index') }}">
                                        <button class="btn btn-info">Shop now</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse--}}
                @endforeach
                <div class="back-to-shop"><a href="{{ route('user.product.index') }}">&leftarrow;</a><span
                        class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">ITEMS ({{ $data['total_item'] }})</div>
                    <div class="col text-right">&#8377;{{ $data['price'] }}</div>
                </div>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">Discount</div>
                    <div class="col text-right">&#8377;{{ $data['discount'] }}</div>
                </div>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">Delivery Charges
                        <div class="text-muted small" data-toggle="tooltip" data-placement="bottom"
                             title="{{ $item['offer'] }}">
                            Free Delivery Order > 499
                        </div>

                    </div>
                    <div class="col text-right">&#8377;{{ $data['delivery_Charges'] }}</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&#8377;{{ $data['total_price'] }}</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col text-success">You will save ₹{{ $data['discount'] }} on this order</div>
                </div>
                <button class="btn" id="checkout">PLACE ORDER</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Are you sure you want to remove this
                            item?</strong></h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                <div class="modal-body">
                    <p>You can Also Restore from trash bin</p>
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
        $("#cartQuantityAdd").click(function () {
            const url = $(this).attr('data-id');
            $.ajax({
                'url': url,
                'type': 'GET',
                success: function (response) {
                    $(".heart").toggleClass("is-active");
                },
            });
        });
    </script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewcart.css') }}">
    <style>
        .custom-disable {
            pointer-events: none;
            cursor: default;
            text-decoration: none;
            color: black;
        }
    </style>
@endpush
