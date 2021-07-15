@extends('admin.layout.sidebar',['title'=>$product->name])
@section('content')
    <ul class="cd-gallery">
        <li class="col-md-6">
            <div class="py-4">
                <span
                    class="on bg-{{ $product->quantity == 0 ? "danger":"success" }}">{{ $product->quantity }}</span>
            </div>
            <ul class="cd-item-wrapper">
                @foreach($product->productImage as $key => $product_img)
                    <li class="{{ $key == 0 ? "selected":"move-right"}}" data-sale=""
                        data-price="&#8377; {{ $product->sale_price }}">
                        <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                             alt="Preview image">
                    </li>
                @endforeach
            </ul> <!-- cd-item-wrapper -->

            <div class="cd-item-info">
                <b><a href="{{ route('admin.product.productDetail',['id'=>$product->id]) }}">{{ $product->name }}</a></b>
                <em class="cd-price"><em style="font-size: small">Purchase Price:</em>
                    &#8377; {{ $product->purchase_price }}</em>
            </div> <!-- cd-item-info -->
        </li>
        <li class="col-md-6 py-4 px-5 bg-light text-black-50">
            <h4 class="mb-2"><strong>{{ $product->name }}</strong></h4>
            <span
                class="fa px-2 py-2 text-white rounded my-2 fa-star bg-{{ $bladeService->ratingClass($product->avg_rating) }}">&nbsp;&nbsp;{{$product->avg_rating ?? "N/A"}}</span>
            <span class="mx-3">{{ count($product->productRating) }} <span class="mx-2"> Total Ratings</span></span>
            <h6 class="mb-3"><a href="" style="color: black">{{ $product->brand->name }}</a></h6>
            <p>Purchase Price:<span class="mr-1 text-success"><strong>{{ $product->purchase_price }}</strong></span></p>
            <p>Sale Price:<span class="mr-1 text-danger"><strong>&#8377;{{ $product->sale_price }}</strong></span></p>
            <p class="pt-1">{{ $product->description }}</p>
            <div class="table-responsive">
                <table class="table table-sm table-borderless mb-0">
                    <tbody>
                    <tr>
                        <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                        <td>Shirt 5407X</td>
                    </tr>
                    <tr>
                        <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                        <td>Black</td>
                    </tr>
                    <tr>
                        <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                        <td>USA, Europe</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="table-responsive mb-2">
                <table class="table table-sm table-borderless">
                    <tbody>
                    <tr>
                        <td class="pl-0 pb-0 w-25">Quantity</td>
                        <td class="pb-0">Select size</td>
                    </tr>
                    <tr>
                        <td class="pl-0">
                            <div class="def-number-input number-input safari_only mb-0">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                        class="minus"></button>
                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        class="plus"></button>
                            </div>
                        </td>
                        <td>
                            <div class="mt-1">
                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="small" name="materialExampleRadios"
                                           checked="">
                                    <label class="form-check-label small text-uppercase card-link-secondary"
                                           for="small">Small</label>
                                </div>
                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="medium"
                                           name="materialExampleRadios">
                                    <label class="form-check-label small text-uppercase card-link-secondary"
                                           for="medium">Medium</label>
                                </div>
                                <div class="form-check form-check-inline pl-0">
                                    <input type="radio" class="form-check-input" id="large"
                                           name="materialExampleRadios">
                                    <label class="form-check-label small text-uppercase card-link-secondary"
                                           for="large">Large</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary btn-md mr-1 mb-2 waves-effect waves-light">Buy now</button>
            <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light"><i
                    class="fas fa-shopping-cart pr-2"></i>Add to
                cart
            </button>
        </li>
    </ul>
@endsection
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
@endpush
@push('style')
    <style>
        /* The heart of the matter */
        .testimonial-group > .row {
            overflow-x: auto;
            white-space: nowrap;
        }

        .testimonial-group > .row > .col-xs-4 {
            display: inline-block;
            float: none;
        }

        /* Decorations */
        .col-xs-4 {
            color: #fff;
            font-size: 48px;
            padding-bottom: 20px;
            padding-top: 18px;
        }

        .col-xs-4:nth-child(3n+1) {
            background: #c69;
        }

        .col-xs-4:nth-child(3n+2) {
            background: #9c6;
        }

        .col-xs-4:nth-child(3n+3) {
            background: #69c;
        }
    </style>
@endpush
