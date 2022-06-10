@extends('user.layout.sidebar',['title'=>'Payment'])
@section('content')
    <div class="payment">
        <h3>Payment is pending</h3>
        <span>Please don't refresh the page...</span>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                 aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/Payment/checkout.js') }}"></script>
    <script>
        var options = {
            "handler": function (response){
                $.ajax({
                    'url': '{{ route('user.payment.verify') }}',
                    'type': 'POST',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content'),
                        'auth_id':{{ \Illuminate\Support\Facades\Auth::id() }},
                        'razorpay_payment_id':response.razorpay_payment_id,
                        'razorpay_order_id':response.razorpay_order_id,
                        'razorpay_signature':response.razorpay_signature
                    },
                    success: function (response) {
                        console.log(response)
                    }
                });
            },
        };
        var SITEURL = '{{URL::to('')}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $( document ).ready(function(e) {
            // $('#paynow').on('click',function(e){
            $.ajax({
                'url': '{{ route('user.checkout') }}',
                'type': 'POST',
                'data':{
                    '_token':$('meta[name="csrf-token"]').attr('content'),
                    'auth_id':{{ \Illuminate\Support\Facades\Auth::id() }}
                },
                success: function (response) {
                    let PaymentData = response.data
                    $.extend(PaymentData, options);
                    var rzp1 = new Razorpay(PaymentData);
                    rzp1.open();
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
