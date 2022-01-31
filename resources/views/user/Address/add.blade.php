@extends('user.layout.sidebar',['title'=>'Add Address'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-12 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>ADD A NEW ADDRESS</b></h4>
                        </div>
                    </div>
                </div>
                <div class="row border-top">
                    <form action="{{ route('user.address.saveAdd') }}" id="address_add" method="post"
                          name="address_add">
                        @csrf
                        <div class="col-md-10">
                            <div class="tab row col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="product_name">Name</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="name" name="name"
                                               type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="purchase_price">Purchase Price</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="mobile" name="mobile"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="sale_price">Sale Price</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="zipcode" name="zipcode"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="sale_price">Sale Price</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="locality" name="locality"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="brand_id">Brand Name</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-state class="input-group-lg"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category_id">Category Name</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-city class="input-group-lg"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="product_type">Product Type</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <textarea name="address" class="form-control input-group-lg" id=""
                                                  style="padding: 10px 16px 0 13px;"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity">Quantity</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="quantity" name="quantity" type="text"
                                               onkeypress="return isNumberKey(event)"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="description">Description</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <textarea class="form-control" id="description" name="description"
                                                  rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="image">Upload Product Images</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <a id="OpenImgUpload" href="#">Select Images</a>
                                        <input type="file" style="display: none" id="imageUpload" accept="image/*"
                                               name="upload_file[]" onchange="preview_image();" multiple/>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;" class="mr-4 mt-3">
                                <div class="mr-5" style="float:right;">
                                    <button type="submit" class="btn btn-primary" id="prevBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
@push('script')

@endpush
