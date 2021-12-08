@props(['route','id'])


<div class="modal fade" id="delete_product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Are You Sure To Delete This
                        Product</strong></h5>
                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                   style="font-size: 18px;">x</a>

            </div>
            <div class="modal-body">
                <p>You can Also Restore from trash bin</p>
            </div>
            <div class="modal-footer">
                <button type="button" style="background: #c6c8ca" class="btn" data-bs-dismiss="modal"
                        aria-label="Close">Cancel
                </button>
                <form action="{{ route('admin.product.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <a href=""><input type="submit" class="btn btn-danger" value="Delete"/></a>
                </form>
            </div>

        </div>
    </div>
</div>
