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
                        <div class="col align-self-center text-right text-muted">
                            <a class="text-primary" href="{{ route('user.address.add') }}">ADD NEW ADDRESS</a>
                        </div>
                    </div>
                </div>
                @forelse($address as $i)
                    <div id="id_{{ $i->id }}" class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-1">
                                <input class="form-check" type="radio" value="{{ $i->id }}" name="address"
                                       {{ ($i->default_address == 1) ? 'checked':'' }}
                                       id="address">
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
                            <div class="col align-self-center text-right ">
                                <a href="{{ route('user.address.edit',$i->id) }}"
                                   class="text-primary text-primary">EDIT</a>
                                <a href="#delete_address" class="passingID text-danger"
                                   data-id="{{ $i->id }}"
                                   data-obj="id_{{ $i->id }}"
                                   data-bs-toggle="modal"
                                >DELETE</a>
                                <input type="hidden" name="route_{{ $i->id }}"
                                       value="{{ route('user.address.delete',$i->id) }}">
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="border-top">
                        <div class="text-lg-center mt-4"><h4 class="text-danger">No Address Found</h4></div>
                        <div class="text-lg-center mt-4"><a href="{{ route('user.address.add') }}" class="text-primary">Add
                                New Address</a>
                        </div>
                    </div>
                @endforelse
                <div class="back-to-shop mt-4">
                    <a class="btn btn-info mt-4" style="width: 25%" href="{{ route('user.cart.index') }}">Back </a>
                </div>
            </div>
            <div class="col-md-4 summary">
                <x-summary :summary="$data"/>
                @php
                    $count = \App\Models\DeliveryAddress::where('user_id',Auth::id())->count();
                    if($count == 0)
                        {
                            $message = 'ADD NEW ADDRESS';
                            $route = route('user.address.add');
                        }
                    else{
                        $message = 'GOTO PAYMENT OPTIONS';
                        $route = route('user.order.payment');
                    }
                @endphp
                <button id="next" class="btn btn-success" style="width: 100%;"
                        onclick="window.location='{{ $route }}'"
                >{{ $message }}
                </button>
            </div>
        </div>
        <x-modal.address-delete/>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
@push('script')
    <script>
        $(".passingID").click(function () {
            var id = $(this).attr('data-id');
            var obj = $(this).attr('data-obj');
            $("#route").attr("onclick", 'removeAddress(' + id + ',' + obj + ')');
            $('#delete_address').modal('toggle');
        });
    </script>
    <script>
        function removeAddress(id, obj) {
            $.ajax({
                url: '{{ route('user.address.delete') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                success: function (response) {
                    if (response.result === true) {
                        obj.remove();
                    }
                    if (response.available_address === 0) {
                        const btn = $('#next');
                        btn.attr('onclick', "window.location='{{ route('user.address.add') }}'")
                        btn.html('ADD NEW ADDRESS');
                        btn.removeClass('btn-success');
                        btn.addClass('btn-info');
                    }
                    $(".model-close2").click();
                },
            });
        }
    </script>
    <script>
        $('input:radio[name=address]').change(function () {
            $.ajax({
                url: '{{ route('user.address.defaultSet') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: this.value,
                },
                success: function (response) {

                },
            });
        });
    </script>
@endpush
