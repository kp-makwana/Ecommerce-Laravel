@extends('admin.layout.sidebar',['title'=>$product->name])
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
            <h4 class="mb-1"><strong>{{ $product->name }}</strong></h4>
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
            {{--            <p class="pt-1">{{ $product->description }}</p>--}}
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
    <div class="col-md-12 row table">
        <div class="col-md-6">
            <div class="pb-3">
                <div class="float-left"><strong>Description:</strong></div>
                <div class="float-right"><a href="#">Add Description</a></div>
            </div>
            <hr>
            <div class="col-md-12">

                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="pb-3">
                <div class="float-left"><strong>Offers:</strong></div>
                <div class="float-right"><a href="#">Add Offer</a></div>
            </div>
            <hr>
            <ul>
                @forelse($product->offers as $offer)
                    <li class="col-md-12">
                        <div class="float-right"><a href="" class="mr-3">View Offer</a><a class="text-dark" href="#">Edit</a>
                        </div>
                        <p class="font-weight-bold">{{ $offer->offer_name }}</p>
                        <div class="text-black-50"><strong>Current Status:</strong><span class="ml-2 {{ ($offer->status == 'active')?'text-success':'text-danger' }}">{{ $offer->status }}</span></div>
                        <div class="text-black-50">
                            <strong>{{ $offer->offer_price ? "Offer Price:":"" }}</strong> {{$offer->offer_price}}</div>
                        <div class="text-black-50">
                            <strong>{{ $offer->percentage ? "Percentage:":"" }}</strong> {{$offer->percentage}}</div>
                        <div class="text-black-50">
                            <strong>{{ $offer->flat_discount ? "Flat Discount:":"" }}</strong> {{$offer->flat_discount}}
                        </div>
                        <?php $s_date = $bladeService->dateFormat($offer->start_date) ?>
                        <div class="text-success"><strong>Start Date :</strong>{{ $s_date['date'] }} <span class="ml-2"> {{ $s_date['time'] }}</span></div>
                        <?php $e_date = $bladeService->dateFormat($offer->end_date) ?>
                        <div class="text-danger"><strong>End Date :</strong>{{ $e_date['date'] }} <span class="ml-2"> {{ $e_date['time'] }}</span></div>
                        <div class="mt-2">
                            <p>{{ $offer->description }}</p>
                        </div>
                    </li>
                @empty
                    <span class="text-info">No offer Found</span>
                @endforelse
            </ul>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="col-md-6">

        </div>
    </div>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Link with href
        </a>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Button with data-target
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>
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
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

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
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
@endpush
