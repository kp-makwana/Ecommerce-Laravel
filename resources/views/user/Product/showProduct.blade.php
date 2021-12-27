@extends('user.layout.sidebar',['title'=>$product->name])
@section('content')
    <ul class="cd-gallery">
        <li class="col-md-6 custom-product">
            <ul class="cd-item-wrapper py-5">
                @foreach($product->productImage as $key => $product_img)
                    <li class="{{ $key == 0 ? "selected":"move-right"}}" data-sale=""
                        data-price="&#8377; {{ $product->sale_price }}">
                        <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                             alt="Preview image">
                    </li>
                @endforeach
            </ul> <!-- cd-item-wrapper -->
        </li>
        <li class="col-md-6 py-4 px-5 bg-light text-black-50">
            <div class="col-md-12 row">
                <div class="col-md-10">
                    <h5 class="mb-1"><strong>{{ $product->name }}</strong></h5>
                </div>
                <div class="col-md-2">
                    <div
                        class="heart {{ \App\Models\WishList::where('product_id','=',$product->id)->first() ? 'is-active':'' }}"
                        onclick="addToWishList()"></div>
                </div>
            </div>
            <div class="mb-2">
                <span
                    class="fa px-2 py-2 text-white rounded my-2 fa-star bg-{{ $bladeService->ratingClass($product->avg_rating) }}">&nbsp;&nbsp;{{$product->avg_rating ?? "N/A"}}</span>
                <span class="mx-3">{{ count($product->productRating) }} <span class="mx-2"> Ratings</span></span>
            </div>
            <h6 class=""><a href="" style="color: black">{{ $product->brand->name }}</a></h6>
            <div class="my-3">
                Purchase Price:<span class="mr-3 text-success"><strong>{{ $product->purchase_price }}</strong></span>
                <p>Sale Price:<span class="mr-3 text-danger"><strong>&#8377;{{ $product->sale_price }}</strong></span>
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-borderless mb-0">
                    <tbody>
                    <tr>
                        <th class="pl-0 w-25" scope="row"><strong>Available Stock</strong></th>
                        <td>{{$product->quantity}}</td>
                    </tr>
                    <tr>
                        <th class="pl-0 w-25" scope="row"><strong>Total selling</strong></th>
                        <td>4587</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>
    <div class="center buttons col-md-6">
        <div class="d-flex buttons flex-row">
            <div class="cart"><i class="fa fa-shopping-cart"></i></div>
            @php
                $result = (App\Models\Cart::where('user_id',Auth::user()->id)->where('product_id',$product->id)->first());
            @endphp
            @if($result != null)
                <a id="goToCart" href="{{ route('user.viewCart') }}">
                    <button id="addToCart" class="btn btn-info cart-button px-5 clicked"><span
                            class="dot">{{ $result->quantity }}</span>Go To Cart
                    </button>
                </a>

            @else
                <a id="goToCart" href="#">
                    <button id="addToCart" class="btn btn-success cart-button px-5 " onclick="addToCart()"><span
                            class="dot">1</span>Add to
                        cart
                    </button>
                </a>
            @endif
        </div>
        <div class="px-5">
            <a href="{{ route('user.product.buyNow',$product->id) }}">
                <button class="btn buttons btn-primary cart-button px-5">Buy Now</button>
            </a>
        </div>
    </div>
    <div class="col-md-12 row table">
        <div class="col-md-6">
            <div class="pb-3">
                <div class="float-left"><strong>Description</strong></div>
            </div>
            <hr>
            <div class="col-md-12">
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pb-3">
                <div class="float-left"><strong>Offers</strong></div>
            </div>
            <x-Form.Add-Offer :id="$product->id"/>
            <hr>
            <ul>
                @forelse($product->offers as $offer)
                    <x-offer :id="$offer->id" :product="$product->id"/>
                    <li class="col-md-12">
                        <p class="font-weight-bold">{{ $offer->offer_name }}</p>
                        <div class="text-black-50"><strong>Current Status:</strong><span
                                class="ml-2 {{ ($offer->status == 'active')?'text-success':'text-danger' }}">{{ $offer->status }}</span>
                        </div>
                        <div class="text-black-50">
                            <strong>{{ $offer->offer_price ? "Offer Price:":"" }}</strong> {{$offer->offer_price}}</div>
                        <div class="text-black-50">
                            <strong>{{ $offer->percentage ? "Percentage:":"" }}</strong> {{$offer->percentage}}</div>
                        <div class="text-black-50">
                            <strong>{{ $offer->flat_discount ? "Flat Discount:":"" }}</strong> {{$offer->flat_discount}}
                        </div>
                        @php $s_date = $bladeService->dateFormat($offer->start_date) @endphp
                        <div class="text-success"><strong>Start Date :</strong>{{ $s_date['date'] }} <span
                                class="ml-2"> {{ $s_date['time'] }}</span></div>
                        <?php $e_date = $bladeService->dateFormat($offer->end_date) ?>
                        <div class="text-danger"><strong>End Date :</strong>{{ $e_date['date'] }} <span
                                class="ml-2"> {{ $e_date['time'] }}</span></div>
                        <div class="mt-2 text-black-50">
                            <strong>Offer Description: </strong>{{ $offer->description }}
                        </div>
                    </li>
                @empty
                    <span class="text-info">No offer Found</span>
                @endforelse
            </ul>
        </div>
    </div>
    <div class="col-md-12 row table" id="review">
        <div class="col-md-6">
            <div class="pb-3">
                <div class="float-left"><strong> See All Rating & review </strong></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="px-5 row">
        <ul class="">
            <div class="userRating bg-light">
                @forelse($ratings as $rating)
                    <li class="col-md-12 row mt-1 bg-light text-black-50">
                        <div class="col-md-2 card-img-top">
                            <img class="rounded-circle"
                                 src="{{ $rating->user->ProfilePicture ? asset('storage/UserProfile/'.$rating->user->ProfilePicture->name) : asset('images/user.png') }}"
                                 height="120"
                                 alt="Profile Pic">
                        </div>
                        <div class="col-md-10 row">
                            <div class="col-md-1">
                            <span
                                class="fa px-2 py-2 text-white rounded fa-star bg-{{ $bladeService->ratingClass($rating->rating) }}">&nbsp;&nbsp;{{$rating->rating ?? "N/A"}} </span>
                            </div>
                            <div class="col-md-11">
                                <span class="font-weight-bolder table">{{ $rating->title }}</span>
                            </div>
                            <div class="col-md-12 my-3 table">
                                {{ $rating->description }}
                            </div>
                            <div class="col-md-12 text-sm-left row">
                                <p class="ont-weight-light">{{ $rating->user->FullName }}</p>
                            </div>
                        </div>
                    </li>
                    <hr>
                @empty
                    NO Rating Found
                @endforelse
                @php
                    $request['review'] = "review";
                @endphp
                {{ $ratings->fragment('review')->links() }}
            </div>
        </ul>
    </div>
    <x-Description :id="$product->id"/>
@endsection
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <script>

        $('button[name="remove_levels"]').on('click', function (e) {
            var $form = $(this).closest('form');
            e.preventDefault();
            $('#confirm').modal({
                backdrop: 'static',
                keyboard: false
            })
                .on('click', '#delete', function (e) {
                    $form.trigger('submit');
                });
            $("#cancel").on('click', function (e) {
                e.preventDefault();
                $('#confirm').modal.model('hide');
            });
        });
    </script>
    <script>
        function addToCart() {
            $.ajax({
                'url': '{{ route('user.product.addToCart',$product->id) }}',
                'type': 'GET',
                success: function (response) {
                    console.log(response)
                    $('#addToCart').addClass('clicked');
                    var $link = $('#addToCart');
                    var $img = $link.find('span');
                    $link.html('Go To Cart');
                    $link.append($img);
                    $('#addToCart').removeClass('btn-success');
                    $('#addToCart').addClass('btn-info');
                    $('#goToCart').attr('href', '{{ route('user.viewCart') }}');
                    $('#addToCart').prop("onclick", null);
                    if (response.data) {
                        toastr.success('Product Added in cart.');
                    }
                },
            });
        }
    </script>
    <script>

        function addToWishList() {
            $.ajax({
                'url': '{{ route('user.wishlist.addOrRemoveWishList',$product->id) }}',
                'type': 'GET',
                success: function (response) {
                    $(".heart").toggleClass("is-active");
                },
            });
        }
    </script>
@endpush
@push('style')
    <style>
        .center {
            /*height: 100vh;*/
            display: flex;
            /*justify-content: center;*/
            align-items: center
        }

        .buttons {
            padding: 10px;
            background-color: #d6d4d4;
            border-radius: 8px;
            position: relative
        }

        .dot {
            height: 14px;
            width: 14px;
            background-color: green;
            border-radius: 50%;
            position: absolute;
            left: 27%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 8px;
            color: #fff;
            opacity: 0
        }

        .cart-button {
            height: 48px;
            width: 250px;
        }

        .cart-button:focus {
            box-shadow: none
        }

        .cart {
            position: relative;
            height: 48px !important;
            width: 100px;
            margin-right: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            padding: 11px;
            border-radius: 5px;
            font-size: 21px
        }

        .cart-button.clicked span.dot {
            animation: item 0.3s ease-in forwards
        }

        @keyframes item {
            0% {
                opacity: 1;
                top: 30%;
                left: 30%
            }

            25% {
                opacity: 1;
                left: 26%;
                top: 0%
            }

            50% {
                opacity: 1;
                left: 23%;
                top: -22%
            }

            75% {
                opacity: 1;
                left: 19%;
                top: -18%
            }

            100% {
                opacity: 1;
                left: 14%;
                top: 28%
            }
        }
    </style>
    <style>
        .heart {
            width: 100px;
            height: 100px;
            background: url("{{ asset('images/wishList.png') }}") no-repeat;
            background-position: 0 0;
            cursor: pointer;
            transition: background-position 1s steps(28);
            transition-duration: 0s;
        }

        .heart.is-active {
            transition-duration: 1s;
            background-position: -2800px 0;
        }

        .stage {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
@endpush
