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
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="name" name="name"
                                               type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mobile_number">Mobile Number</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="mobile_number" name="mobile_number"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="zipcode">Zipcode</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="zipcode" name="zipcode"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="locality">Locality</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="locality" name="locality"
                                               type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <textarea class="form-control" name="address" id="address"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-state class="input-group-lg"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-city class="input-group-lg"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="alt_phone">Alternate Phone</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="alt_phone" name="alt_phone"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="type">Address Type</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <select id="type" name="type" class="form-control">
                                            <option value="" disabled selected>-- Select Address Type --</option>
                                            @foreach(config('constants.addressType') as $type)
                                                <option
                                                    value="{{ $type }}" {{ ($type == 'home')?'selected':'' }}> {{ ucfirst($type) }}</option>
                                            @endforeach
                                        </select>
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
    <script src="{{ asset('js/common.js') }}"></script>
@endpush
