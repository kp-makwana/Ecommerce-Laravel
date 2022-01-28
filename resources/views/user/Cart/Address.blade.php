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
                @foreach($data['carts'] as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-1">
                                <input class="custom-radio" type="radio" name="address" value="1" id="address">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <b class="mr-3">
                                        FULL NAME
                                    </b>
                                    <span class="small ml-4" style="color: #878787;background-color: #f0f0f0">
                                        HOME
                                    </span>
                                    <span class="ml-4">
                                        MOBILE NUMBER
                                    </span>
                                </div>
                                <div class="row text-dart">
                                    <span class="">
                                        FULL ADDRESS
                                    </span>
                                    <span class="">
                                        CITY & State
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
                        <div class="col-1">
                            <input class="custom-radio" type="radio" name="address" value="1" id="address">
                        </div>
                        <div class="col">
                            <div class="col">
                                <b class="mr-3">
                                    EDIT ADDRESS
                                </b>
                                <div class="col">
                                    <input type="text" name="address" value="address" class="" id=""
                                           style="padding: 20px 16px 0 13px; ">
                                    <lable for="address"
                                           style="position: absolute;top: 0;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                        Liable
                                    </lable>
                                </div>
                            </div>
                            <div class="row text-dart">
                                    <span class="">
                                        FULL ADDRESS
                                    </span>
                                <span class="">
                                        CITY & State
                                    </span>
                            </div>
                        </div>
                        <div class="col align-self-center text-right text-muted">
                            <a href="" class="text-primary text-primary">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="back-to-shop mt-4">
                    <a class="btn btn-info mt-4" style="width: 25%" href="{{ route('user.viewCart') }}">Back </a>
                </div>
            </div>
            <div class="col-md-4 summary">
                <x-summary :data="$data"/>
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
