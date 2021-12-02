{{--   Modal  --}}
<div class="modal fade" id="view_offer_{{ $id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.product.offer.offer_add_update',$id) }}" name="offer_update_{{ $offer->id }}"
                  id="offer_update_{{ $id }}"
                  method="POST">
                @csrf
                <input type="hidden" value="{{ $offer->id }}" name="id" id="id">
                <input type="hidden" value="{{ $product_id }}" name="product_id" id="product_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Edit Offer</strong></h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                <div class="modal-body" id="id_{{ $id }}">
                    <div class="col-md-12">

                        <div class="mb-3 row">
                            <div class="col-sm-3">
                                <label for="name" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                    Name:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="offer_name" name="offer_name"
                                       value="{{ $offer->offer_name }}">
                            </div>
                        </div>
                        <hr>
                        <fieldset class="col-md-12 px-1 py-1">
                            <legend style="font-size: small"><span class="text-danger">*</span>Any One Required</legend>
                            <div class="col-md-12 px-1 py-1">
                                <div class="mb-3 row">
                                    <label for="offer_price" class="col-sm-3 col-form-label">Offer price:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control discount" name="offer_price"
                                               id="offer_price"
                                               value="{{ $offer->offer_price }}" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="percentage" class="col-sm-3 col-form-label">Discount in
                                        Percentage:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control discount" name="percentage"
                                               id="percentage"
                                               value="{{ $offer->percentage }}" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="flat_discount" class="col-sm-3 col-form-label">Flat Discount:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control discount" name="flat_discount"
                                               id="flat_discount"
                                               value="{{ $offer->flat_discount }}" onkeypress="return isNumberKey(event)">
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        @error('flat_discount') <span class="text-danger">{{ $message }}</span>@enderror
                        <hr>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-3 col-form-label"><span class="text-danger">*</span>Description:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description"
                                       value="{{ $offer->offer_name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-3 col-form-label">Status:</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="0" selected disabled>-- Select Status --</option>
                                    @foreach(App\Models\Offer::STATUS as $key =>$value)
                                        <option
                                            value="{{ $key }}" {{ ($key == $offer->status) ? "selected":"" }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="start_date" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                Start Date:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="start_date" name="start_date"
                                       value="{{ $bladeService->date_time($offer->start_date) }}"
                                       type="datetime-local"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="end_date" class="col-md-3 col-form-label"><span class="text-danger">*</span>Offer
                                End Date:</label>
                            <div class="col-sm-9">

                                <input class="form-control" id="end_date" name="end_date" value="{{ $bladeService->date_time($offer->end_date) }}"
                                       type="datetime-local"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"
                            aria-label="Close">Cancel
                    </button>
                    <button type="reset" class="btn btn-info">Reset</button>
                    <input type="submit" class="btn btn-success" value="Update"/>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $("#offer_update_{{ $id }}").validate({
            errorClass: 'text-danger',
            rules: {
                offer_name: {
                    required: true,
                },
                offer_price: {
                    require_from_group: [1, ".discount"],
                },
                percentage: {
                    require_from_group: [1, ".discount"],
                },
                flat_discount: {
                    require_from_group: [1, ".discount"],
                },
                description: {
                    required: true,
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                }
            },
            messages: {
                offer_name: {
                    required: "Offer Name not Empty.",
                    min: "Minimum Character is 3."
                },
                offer_price: {
                    require_from_group: ""
                },
                percentage: {
                    require_from_group: ""
                },
                flat_discount: {
                    require_from_group: "At least 1 Discount field is Required",
                },
                description: {
                    required: "Description is Required.",
                },
                start_date: {
                    required: "Offer Start Date is Required.",
                },
                end_date: {
                    required: "Offer End Date is Required.",
                }
            }
        });
    </script>
@endpush

