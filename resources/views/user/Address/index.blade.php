@extends('user.layout.sidebar',['title'=>'My Address'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-12 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>DELIVERY ADDRESS</b></h4>
                        </div>
                        <div
                            class="col align-self-center text-right text-muted">
                            <a class="btn btn-info" href="{{ route('user.address.add') }}">Add New Address</a>
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
                                <a href="" class="text-primary text-primary">EDIT</a>
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
                                New Address</a></div>
                        @endforelse
                    </div>
            </div>
        </div>
        <div class="modal fade" id="delete_address" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
             data-bs-dismiss="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel"><strong>DELETE ADDRESS</strong></h5>
                        <a type="button" id="model-close" class="btn-close model-close" data-bs-dismiss="modal"
                           aria-label="Close"
                           style="font-size: 18px;">x</a>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to remove this address?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background: #c6c8ca" class="btn model-close2"
                                data-bs-dismiss="modal"
                                aria-label="Close">CANCEL
                        </button>
                        <a id="route">
                            <button class="btn btn-danger">
                                DELETE
                            </button>
                        </a>
                    </div>
                </div>
            </div>
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
                    console.log($("#route").attr("onclick", 'removeAddress(' + id + ',' + obj + ')'));
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
