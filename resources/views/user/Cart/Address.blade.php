@extends('user.layout.sidebar',['title'=>'Select Address'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>DELIVERY ADDRESS</b></h4>
                        </div>
                    </div>
                </div>
                @foreach($address as $i)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-1">
                                <input class="custom-radio" type="radio" name="address" value="1" id="address">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <b class="mr-3">
                                        {{ $i->name }}
                                    </b>
                                    <span class="small ml-4" style="color: #878787;background-color: #f0f0f0">
                                        {{ $i->type }}
                                    </span>
                                    <span class="ml-4">
                                        {{ $i->mobile_number }}
                                    </span>
                                </div>
                                <div class="row text-dart">
                                    <span class="">
                                        {{ $i->address }}
                                    </span>
                                    <span class="">
                                        {{ $i->city->name }}, {{ $i->state->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="col align-self-center text-right text-muted">
                                <a href="" class="text-primary text-primary">EDIT</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-1 mt-0">
                            <input class="custom-radio" type="radio" name="address" value="1" id="address">
                        </div>
                        <div class="col">
                            <b class="mr-3">
                                EDIT ADDRESS
                            </b>
                            <div class="col">
                                <input type="text" name="name" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="name" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Name
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="mobile" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="mobile" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Mobile
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="zipcode" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="zipcode" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Zipcode
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="locality" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="locality" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Locality
                                </lable>
                            </div>
                            <div class="col">
                                <x-state class="input-group-lg"/>
                                <lable for="state" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    State
                                </lable>
                            </div>
                            <div class="col">
                                <x-city class="input-group-lg"/>
                                <lable for="city" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    State
                                </lable>
                            </div>
                            <div class="col">
                                <textarea name="address" class="form-control input-group-lg" id=""
                                          style="padding: 10px 16px 0 13px;"
                                ></textarea>
                                <lable for="address" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Address
                                </lable>
                            </div>

                        </div>
                        <div class="col align-self-center text-right text-muted">
                            <a href="" class="text-primary text-primary">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="back-to-shop mt-4">
                    <a class="btn btn-info mt-4" style="width: 25%" href="{{ route('user.cart.index') }}">Back </a>
                </div>
            </div>
            <div class="col-md-4 summary">
                <x-summary :summary="$data"/>
                <a class="btn btn-primary" style="
                width: 100%;"
                   href="{{ route('user.cart.address') }}">GOTO PAYMENT OPTIONS</a>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
@push('script')
    <script>

    </script>
@endpush
