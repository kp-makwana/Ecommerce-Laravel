{{--   Modal  --}}
<div class="modal fade" id="add_offer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.product.offer.add') }}" name="add_offer" id="add_offer" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Add New Offer</strong></h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <div class="col-sm-3">
                                <label for="name" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                    Name:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="offer_name" name="offer_name">
                            </div>
                        </div>
                        <hr>
                        <fieldset class="col-md-12 px-1 py-1">
                            <legend style="font-size: small"><span class="text-danger">*</span>Any One Required</legend>
                            <div class="col-md-12 px-1 py-1">
                                <div class="mb-3 row">
                                    <label for="offer_price" class="col-sm-3 col-form-label">Offer price:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="offer_price" id="offer_price">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="percentage" class="col-sm-3 col-form-label">Discount in
                                        Percentage:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="percentage" id="percentage">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="flat_discount" class="col-sm-3 col-form-label">Flat Discount:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="flat_discount" id="flat_discount">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-3 col-form-label"><span class="text-danger">*</span>Description:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-3 col-form-label">Status:</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="0" selected disabled>-- Select Status --</option>
                                    @foreach(App\Models\Offer::STATUS as $key =>$value)
                                        <option
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="start_date" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                Start Date:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="start_date" name="start_date" type="datetime-local"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="end_date" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                End Date:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="end_date" name="end_date" type="datetime-local"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"
                            aria-label="Close">Cancel
                    </button>
                    <input type="submit" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>

