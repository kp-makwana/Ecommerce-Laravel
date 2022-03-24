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
