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
            <h5 class="mb-1"><strong>{{ $product->name }}</strong></h5>
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
            <div class="userRating bg-light">{{--            collapse--}}
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

    {{--    --}}{{--  Offer Delete Modal  --}}
    {{--    <div class="modal fade" id="delete_offer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">--}}
    {{--        <div class="modal-dialog modal-dialog-centered">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Are You Sure To Delete The--}}
    {{--                            Offer</strong></h5>--}}
    {{--                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"--}}
    {{--                       style="font-size: 18px;">x</a>--}}

    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <p>Offer Name</p>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"--}}
    {{--                            aria-label="Close">Cancel--}}
    {{--                    </button>--}}
    {{--                    <input type="submit" class="btn btn-danger"/>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $("#add_offer").validate({
            errorClass: 'text-danger',
            rules: {
                offer_name: {
                    required: true,
                },
                offer_price: {
                    require_from_group: [1, ".discount"],
                },
                percentage: {
                    require_from_group: [1, ".discount"],
                },
                flat_discount: {
                    require_from_group: [1, ".discount"],
                },
                description: {
                    required: true,
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                }
            },
            messages: {
                offer_name: {
                    required: "Offer Name not Empty.",
                    min: "Minimum Character is 3."
                },
                offer_price: {
                    require_from_group: ""
                },
                percentage: {
                    require_from_group: ""
                },
                flat_discount: {
                    require_from_group: "At least 1 Discount field is Required",
                },
                description: {
                    required: "Description is Required.",
                },
                start_date: {
                    required: "Offer Start Date is Required.",
                },
                end_date: {
                    required: "Offer End Date is Required.",
                }
            }
        });
    </script>
@endpush
