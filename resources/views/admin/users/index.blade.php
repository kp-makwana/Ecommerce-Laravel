@extends('admin.layout.sidebar',['title'=>"Users"])
@section('content')
    <div class="col-md-12">
        <form action="{{ route('admin.user.index') }}" name="Form" id="Form" method="GET">
            <div class="col-md-12 row my-4">
                <div class="col-md-1">
                    <lable for="orderBy">Number of Product:</lable>
                </div>
                <div class="col-md-1">
                    <x-NumberOfRow record="{{ $request['no_of_record'] ?? 10}}"/>
                </div>
                <div class="col-md-8 float-right pl-5">
                    <div class="col-md-12 text-lg-right">
                        <input type="search" name="search" id="search"
                               class="form-control float-right"
                               placeholder="Search..." value="{{ $request['search'] ?? null }}"
                               aria-label="Search">
                    </div>
                </div>
                <div class="col-md-2 float-right">
                    <div class="col-md-12 text-lg-right">
                        <a href="" class="ml-4">
                            <input type="submit" class="px-5 btn btn-primary"/>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
        <table class="table table-custom table-lg" id="customers">
            <thead>
            <tr>
                <th><b>@sortablelink('id')</b></th>
                <th><b><a href="">Photo</a></b></th>
                <th><b>@sortablelink('f_name', 'Full Name')</b></th>
                <th><b>@sortablelink('email')</b></th>
                <th><b>@sortablelink('contact_no','Contact No')</b></th>
                <th><b>@sortablelink('country_code','Country')</b></th>
                <th><b>Last Active</b></th>
                <th class="text-center"><b>Actions</b></th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <a href="">#{{ $user->id }}</a>
                    </td>
                    <td>
                        <div class="avatar avatar-info">
                            @if($user->ProfilePicture)
                                <img class="rounded-circle"
                                     src="{{ $user->ProfilePicture ? asset('storage/UserProfile/'.$user->ProfilePicture->name) : asset('images/user.png') }}"
                                     alt="">
                            @else
                                <span class="avatar-text rounded-circle" style="background-color: {{ $bladeService->randomColor() }}">{{ substr($user->Full_Name,0,1) }}</span>
                            @endif
                        </div>
                    </td>
                    <td>{{ $user->Full_Name }}</td>
                    <td>
{{--                        <a href="mailto:{{ $user->email }}??subject = Feedback&body = Message">{{ $user->email }}</a>--}}
                        <span>{{ $user->email }}</span>
                    </td>
                    <td>
{{--                        <a href="tel:{{ $user->PhoneNumber }}">+{{ $user->PhoneNumber }}</a>--}}
                        <span>+{{ $user->PhoneNumber }}</span>
                    </td>
                    <td> (+{{ $user->country_code }}) {{ ucfirst($user->country->name) }}</td>
                    <td>{{ $bladeService->lastActivity($user->activity) }}</td>
                    <td class="text-end">
                        <a href="" class="mx-1"><span class="badge bg-dark">Show</span></a>
                        <a href="" class="mx-1"><span class="badge bg-info">Edit</span></a>
                        <a href="" class="mx-1"><span class="badge bg-danger">Delete</span></a>
                    </td>
                    @empty
                        No user Found
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $users->appends($request)->links() }}
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush
@push('script')
    <script>
        $('#no_of_record').change(function () {
            $('#Form').submit();
        });
    </script>
@endpush
