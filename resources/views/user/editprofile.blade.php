@extends('user.layout.sidebar')
@section('content')
    <div class="container emp-profile bg-dark text-white">
        <form action="{{ route('user.profile.update') }}" method="POST" name="update" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img id="imagePreview"
                             src="{{ $user->ProfilePicture ? asset('storage/UserProfile/'.$user->ProfilePicture->name) : asset('images/user.png') }}"
                             alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" class="hide" id="fileUpload" accept="image/*"
                                   name="fileUpload"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-white">
                    <div class="profile-head">
                        <h5 class="text-white">
                            {{ $user->full_name }}
                        </h5>
                        <p class="profile-rating">Profile Complete : <span>100%</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false">Address</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br/>
                        <a href="">Web Developer</a><br/>
                        <a href="">WordPress</a><br/>
                        <a href="">WooCommerce</a><br/>
                        <a href="">PHP, .Net</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="bg-dark text-white form-control" name="f_name" type="text"
                                           value="{{ $user->f_name }}" required
                                    />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="bg-dark text-white form-control" name="l_name" type="text"
                                           value="{{ $user->l_name }}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Date Of Birth</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="bg-dark text-white form-control" name="dob" type="date"
                                           value="{{ $user->dob }}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Country Code</label>
                                </div>
                                <div class="col-md-6">
                                    <x-CountryCode/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="bg-dark text-white form-control" name="phone" maxlength="10"
                                           minlength="10" onkeypress="return isNumberKey(event)"
                                           value="{{ $user->contact_no }}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    @error('gender')
                                    <div class="error">*</div> @enderror
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <select id="gender" name="gender" class="bg-dark text-white form-control">
                                        <option value="" disabled selected>select gender</option>
                                        @foreach(App\Models\User::GENDER as $key=>$value)
                                            <option
                                                value="{{ $key }}" {{ $user->gender === $key ?"selected":""  }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="bg-dark text-white form-control"
                                           value="{{ $user->email }}"/>
                                </div>
                            </div>
                            @if($errors->all())
                                @foreach($errors->all() as $key=>$value)
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="error text-danger">* {{ $value }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Street Address</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="bg-dark text-white form-control"
                                           value="{{ $user->address->address ?? ""}}"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>ZipCode</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="zipcode" class="form-control bg-dark text-white"
                                           maxlength="6"
                                           value="{{ $user->address->zipcode ?? ""}}"
                                           onkeypress="return isNumberKey(event)"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Country</label>
                                </div>
                                <div class="col-md-6">
                                    <x-country/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>State</label>
                                </div>
                                <div class="col-md-6">
                                    <div id="getStatesList">
                                        <x-state/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>City</label>
                                </div>
                                <div class="col-md-6" id="getCityList">
                                    <x-city/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>

        var fileTag = document.getElementById("fileUpload"),
            preview = document.getElementById("imagePreview");

        fileTag.addEventListener("change", function () {
            changeImage(this);
        });

        function changeImage(input) {
            var reader;

            if (input.files && input.files[0]) {
                reader = new FileReader();

                reader.onload = function (e) {
                    preview.setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        $('#countryList').change(function () {
            var countryId = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('fetchStates') }}',
                data: {
                    country_id: countryId,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    $("#getStatesList").html(data);
                    $('#stateList').change(function () {
                        var stateId = $(this).val();
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('fetchCities') }}',
                            data: {
                                stateId: stateId,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                $("#getCityList").html(data);
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection
