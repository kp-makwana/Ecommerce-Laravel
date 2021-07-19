{{--   Modal  --}}

<div class="modal fade" id="view_offer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">{{ $action }} Description</h5>
                <a type="button" class="btn-close"  data-bs-dismiss="modal"  aria-label="Close" style="font-size: 18px;">x</a>
            </div>
            <div class="modal-body">
                {{ $offer }}
            </div>
        </div>
    </div>
</div>
