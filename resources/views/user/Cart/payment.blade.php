{{--
@extends('user.layout.sidebar',['title'=>'Payment'])
@section('content')
    <div class="payment">
        <h3>Payment page is pending</h3>
        <span>Your Order has been placed....</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                 aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        let data = 0;
        const intervalId = window.setInterval(function () {
            progress()
        }, 10);

        function progress() {
            data += 1
            $(".progress-bar").css({"width": data + "%"});
            if (data >= 100) {
                clearInterval(intervalId)
                console.log('sfsfddsf')
                $('<h1>')
                    .append('<h1>Order Has Been Placed!</h1>')
                    .insertAfter('.payment');
                setTimeout(function () {
                    window.location = "{{ route('user.order.placeOrder') }}"
                }, 3000)
            }
        }
    </script>
@endpush
--}}
@extends('user.layout.sidebar',['title'=>'Payment'])
@section('content')
    <div class="payment">
        <h3>Payment page is pending</h3>
        <span>Your Order has been placed....</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                 aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        <button id="paynow" class="paynow">Pay Now</button>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/Payment/checkout.js') }}"></script>
    <script>
        var SITEURL = '{{URL::to('')}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#paynow').on('click',function(e){
            var options = {
                "key": "rzp_test_7y7xZB7qOMMm5l",
                "amount": 2000,
                "name": "Tutsmake",
                "description": "Payment",
                "image": "https://lh3.googleusercontent.com/a-/AOh14Gh833ThinFrkzBq4_fS-S0KHP552epZx4guGbm_yw=s83-c-mo",
                "handler": function (response){
                    alert(response.razorpay_payment_id);
                    alert(response.razorpay_order_id);
                    alert(response.razorpay_signature)
                },
                "allow_rotation":false,
                "prefill": {
                    "contact": '9988665544',
                    "email":   'tutsmake@gmail.com',
                },
                "modal":{
                    // "confirm_close":true,
                    "animation":true,

                },
                "theme": {
                    "color": "#F0F0F0"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        });

        function checkoutDetails() {
            $.ajax({
                'url': '{{ route('user.checkout') }}',
                'type': 'POST',
                'data':{
                    '_token':$('meta[name="csrf-token"]').attr('content'),
                    'auth_id':{{ \Illuminate\Support\Facades\Auth::id() }}
                },
                success: function (response) {
                }
            });
        }
        </script>
@endpush
