@extends('admin.layout.sidebar',['title'=>'Add Product'])
@section('content')
    <div class="container bg-dark text-white col-md-12">
        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12 my-5 mx-5">
            @csrf
            <div class="row col-md-10">
                <div class="text-center mt-lg-5"><h1 class="text-white">Insert New Product</h1></div>
                {{--                    <div class="profile-img col-md-4">--}}
                {{--                        <img id="imagePreview"--}}
                {{--                             src="{{ asset('images/user.png') }}"--}}
                {{--                             alt=""/>--}}
                {{--                        <div class="file btn btn-lg btn-primary">--}}
                {{--                            Change Photo--}}
                {{--                            <input type="file" class="hide" id="fileUpload" accept="image/*"--}}
                {{--                                   name="fileUpload"/>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
            </div>
        </form>
        <div class="col-md-10 mx-5 my-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="product_name">Product Name</label>
                </div>
                <div class="col-md-6">
                    <input class="bg-dark text-white form-control" name="product_name" type="text" required/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Purchase Price</label>
                </div>
                <div class="col-md-6">
                    <input class="bg-dark text-white form-control" id="purchase_price" name="purchase_price"
                           type="text"
                           onkeypress="return isNumberKey(event)"/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Sale Price</label>
                </div>
                <div class="col-md-6">
                    <input class="bg-dark text-white form-control" id="sale_price" name="sale_price" type="text"
                           onkeypress="return isNumberKey(event)"/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Select brand</label>
                </div>
                <div class="col-md-6">
                    <x-Brand/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Select Category</label>
                </div>
                <div class="col-md-6">
                    <x-Category/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Product Type</label>
                </div>
                <div class="col-md-6">
                    <x-ProductType/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Quantity</label>
                </div>
                <div class="col-md-6">
                    <input class="bg-dark text-white form-control" id="quantity" name="quantity" type="text"
                           onkeypress="return isNumberKey(event)"/>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Description</label>
                </div>
                <div class="col-md-6">
                    <input class="bg-dark text-white form-control" id="description" name="description">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Offers & Deals</label>
                </div>
                <div class="col-md-6">
                    <a id="showDeals"> <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id="offersDeals">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>offer Price</label>
                    </div>
                    <div class="col-md-6">
                        <input class="bg-dark text-white form-control" id="purchase_price" name="purchase_price"
                               type="text"
                               onkeypress="return isNumberKey(event)"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Description</label>
                    </div>
                    <div class="col-md-6">
                        <input class="bg-dark text-white form-control" id="offer_dis" name="offer_dis">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Status</label>
                    </div>
                    <div class="col-md-6">
                        <select name="status" id="status" class="bg-dark text-white form-control">
                            <option value="">-- Select Status--</option>
                            @foreach(App\Models\Offer::STATUS as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Offer Start Date</label>
                    </div>
                    <div class="col-md-6">
                        <input class="bg-dark text-white form-control" type="date" id="start_date" name="start_date">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Offer End Date</label>
                    </div>
                    <div class="col-md-6">
                        <input class="bg-dark text-white form-control" type="date" id="end_date" name="end_date">
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('script')
            <script>
                $(document).ready(function () {
                    $('#offersDeals').hide();
                });

                $("i").click(function () {

                    $('#offersDeals').toggle();
                });

                function isNumberKey(evt) {
                    var charCode = (evt.which) ? evt.which : evt.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            </script>
    @endpush
