@extends('admin.layout.sidebar',['title'=>'Bulk Product Upload'])
@section('content')
    <a href="{{ route('admin.download') }}" class="mb-5">Download Bulk Excel</a>
    <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="productUpdate" id="productUpdate">
        <button type="submit" id="submit">submit</button>
    </form>
@endsection
