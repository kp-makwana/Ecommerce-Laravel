@extends('admin.layout.sidebar',['title'=>'Add Product'])
@section('content')
    <div class="container bg-dark text-white col-md-12">
        <form id="regForm" action="/action_page.php">
            <div class="col-md-10">
                <div class="tab">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="offer_price">Offer Price</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="bg-dark text-white form-control" id="offer_price" name="offer_price"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="bg-dark text-white form-control" id="description" name="description"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="status" id="status" class="bg-dark text-white form-control">
                                <option value="" selected disabled>-- Select Status --</option>
                                @foreach(App\Models\Offer::STATUS as $key =>$value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date">Offer Start Date</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="bg-dark text-white form-control" id="start_date" name="start_date"
                                   type="date"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="end_date">Offer Start Date</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="bg-dark text-white form-control" id="end_date" name="end_date" type="date"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
