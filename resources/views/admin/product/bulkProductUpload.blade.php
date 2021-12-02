@extends('admin.layout.sidebar',['title'=>'Bulk Product Upload'])
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="text-dark">
                <strong>
                    Product Stock update Demo Sheet Dwonload
                </strong>
            </div>
        </div>
        <div class="card-body">
            <div class="ml-4">
                <div class="alert mb-3"
                     style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    <strong>Step 1:</strong>
                    <p>1. Download the skeleton file and fill it with proper data.</p>
                    <p>2. You can download the example file to understand how the data must be filled.</p>
                    <p>3. Once you have downloaded and filled the skeleton file, upload it in the form below and
                        submit.</p>
                    <p>4. After uploading products you need to edit them and set product's images and choices.</p>
                </div>
                <div class="">
                    <a href="{{ route('admin.product.demoSheetDownload') }}" download="">
                        <button class="btn btn-primary">Download Product Stock update Demo Sheet</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="text-dark">
                <strong>
                    Product Stock sheet Upload
                </strong>
            </div>
        </div>
        <div class="card-body">
            <div class="alert mb-3">
                <form action="{{ route('admin.product.productStockUpdate') }}" method="POST" id="productStockUpdate"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="productUpdate" class="custom-file-input" id="productUpdate">
                            <label class="custom-file-label" for="productUpdate">Choose file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        @error('productUpdate')<p class="text-danger">*{{ $message }}</p>@enderror
                        <p class="text-danger" id="productUpdateError"></p>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary">Upload Sheet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('#productUpdateError').on('change', function () {
            const fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endpush
