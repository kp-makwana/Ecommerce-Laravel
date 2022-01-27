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
