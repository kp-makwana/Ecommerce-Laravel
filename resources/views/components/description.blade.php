{{--   Modal  --}}

<div class="modal fade" id="_description" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="">
            <div class="modal-header text-center col-md-12 text-center">
                {{--                <a href="" style="">x</a>--}}
                <h5 class="modal-title text-center" id="exampleModalToggleLabel">Edit Description </h5>
                <a type="button" class="btn-close"  data-bs-dismiss="modal"  aria-label="Close" style="font-size: 18px;">x</a>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 250px">{{ $product->description }}</textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"  aria-label="Close">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
