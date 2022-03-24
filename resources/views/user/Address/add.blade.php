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
                    <form action="{{ route('user.address.addOrEdit') }}" id="address_add" method="post"
                          name="address_add">
                        @csrf
                        <div class="col-md-10">
                            <input type="hidden" name="previousUrl" value="{{ $previousUrl }}">
                            <div class="tab row col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1 mb-1" id="name" name="name" type="text"
                                               value="{{ old('name') }}"/>
                                        @error('name')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="mobile_number">Mobile Number<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1" id="mobile_number" name="mobile_number"
                                               value="{{ old('mobile_number') }}"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                        @error('mobile_number')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="zipcode">Zipcode<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1" id="zipcode" name="zipcode"
                                               value="{{ old('zipcode') }}"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                        @error('zipcode')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="locality">Locality<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1" id="locality" name="locality"
                                               value="{{ old('locality') }}"
                                               type="text"/>
                                        @error('locality')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <label for="state">State<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <x-state class="input-group-lg mb-1"/>
                                        @error('state')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="city">City<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        {{--                                        <x-city class="input-group-lg mb-1"/>--}}
                                        <select id="CityList" name="city" class="form-control input-group-lg mb-1">
                                            <option value="0" disabled selected>-- Select State First --</option>
                                        </select>

                                        @error('city')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="alt_phone">Alternate Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1" id="alt_phone" name="alt_phone"
                                               value="{{ old('alt_phone') }}"
                                               onkeypress="return isNumberKey(event)" type="text"/>
                                        @error('alt_phone')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="landmark">Landmark</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control mb-1" id="landmark" name="landmark"
                                               value="{{ old('landmark') }}"
                                               type="text"/>
                                        @error('landmark')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="type">Address Type<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="type" name="type" class="form-control mb-1">
                                            <option value="" disabled selected>-- Select Address Type --</option>
                                            @foreach(config('constants.addressType') as $type)
                                                <option
                                                    value="{{ $type }}" {{ ($type == 'home')?'selected':'' }}> {{ ucfirst($type) }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="address">Address<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea class="form-control mb-1" name="address"
                                                  id="address">{{ old('address') }}</textarea>
                                        @error('address')<p class="text-danger">*{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;" class="mr-4 mt-3">
                                <div class="mr-5" style="float:right;">
                                    <button type="button" class="btn btn-info" id="prevBtn"
                                            onclick="window.location='{{ route('user.address.index') }}'">Cancel
                                    </button>
                                    <button type="reset" class="btn btn-primary" id="prevBtn">Reset</button>
                                    <button type="submit" class="btn btn-success" id="prevBtn">Submit</button>
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
    <script>
        $( document ).ready(function() {
            city()
        });
        $('#stateList').change(function () {
            city()
        });
        function city(){
            var stateId = $('#stateList').val();
            const city = $("#CityList");
            $.ajax({
                type: 'POST',
                url: '{{ route('cityList') }}',
                data: {
                    stateId: stateId,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    if ((data.cities.length) > 0) {
                        $("#CityList option").remove();

                        city.append(new Option('--select city--', '0'));
                        const cityDefault = $("#CityList option[value='0']");
                        cityDefault.attr('selected', 'selected');
                        cityDefault.attr('disabled', 'disabled');
                        $.each(data.cities, function () {
                            $("#CityList").append(new Option(this.name, this.id));
                        });
                    } else {
                        $("#CityList option").remove();
                        $("#CityList").append(new Option('--SELECT STATE FIRST--', '0'));
                        const cityDefault = $("#CityList option[value='0']");
                        cityDefault.attr('selected', 'selected');
                        cityDefault.attr('disabled', 'disabled');
                    }
                }
            });
        }
    </script>
@endpush
