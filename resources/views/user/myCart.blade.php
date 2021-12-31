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
                        <div class="col align-self-center text-right text-muted">{{ $total_items }} items</div>
                    </div>
                </div>
                @forelse($carts as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                                    src="{{ asset('/storage/ProductImages/'.$item->product_image[0]->name) }}">
                            </div>
                            <div class="col">
                                <div class="row text-muted">{{ $item->product->name }}</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col"><a href="#">-</a><a href="#" class="border">{{ $item->quantity }}</a><a
                                    href="#">+</a></div>
                            <div class="col">
                                &#8377; {{ $item->product->sale_price }}
                                <span class="close">
                                    <a href="#delete_product" class="passingID"
                                       data-id="{{ route('user.product.removeFromCart',$item->id) }}"
                                       data-bs-toggle="modal">&#10005;</a>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="row text-center">
                                <img class="img-fluid" src="{{ asset('images/emptyCart.png') }}" alt="">
                                <p>Your Card is empty</p>
                                <a href="{{ route('user.product.index') }}"><button class="btn btn-info">Shop now</button></a>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="back-to-shop"><a href="{{ route('user.product.index') }}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">ITEMS ({{ $total_items }})</div>
                    <div class="col text-right">&#8377;500</div>
                </div>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">Discount </div>
                    <div class="col text-right">&#8377;500</div>
                </div>
                <div class="row py-2">
                    <div class="col" style="padding-left:0;">Delivery Charges &#8377;500</div>
                    <div class="col text-right">&#8377;500</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">&#8377;5000</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col text-success">You will save ₹849 on this order</div>
                </div>
                <button class="btn" id="checkout">PLACE ORDER</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Are you sure you want to remove this item?</strong></h5>
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
@endpush
@push('style')
    <style>
        #card-custom.card-custom {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold
        }

        #card-custom .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent
        }

        @media (max-width: 767px) {
            .card {
                margin: 3vh auto
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem
        }

        @media (max-width: 767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65)
        }

        @media (max-width: 767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem
            }
        }

        .summary .col-2 {
            padding: 0
        }

        .summary .col-10 {
            padding: 0
        }

        .row {
            margin: 0
        }

        .title b {
            font-size: 1.5rem
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%
        }

        .col-2,
        .col {
            padding: 0 1vh
        }

        a {
            padding: 0 1vh
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem
        }

        img {
            width: 3.5rem
        }

        .back-to-shop {
            margin-top: 4.5rem
        }

        h5 {
            margin-top: 4vh
        }

        hr {
            margin-top: 1.25rem
        }

        form {
            padding: 2vh 0
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input:focus::-webkit-input-placeholder {
            color: transparent
        }

        #checkout {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0
        }

        #checkout:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none
        }

        #checkout:hover {
            color: white
        }

        a {
            color: black
        }

        a:hover {
            color: black;
            text-decoration: none
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("{{ asset('images/icon/long-arrow-right.png') }}");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center
        }
    </style>
@endpush
