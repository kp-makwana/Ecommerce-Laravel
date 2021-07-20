@extends('admin.layout.sidebar',['title'=>'Add Product'])
@section('content')
    <div class="container col-md-12">
        <form action="{{ route('admin.product.save') }}" id="product_add" method="post" name="product_add"
              enctype="multipart/form-data">
            @csrf
            <div class="col-md-10">
                <div class="header">
                    <h1>Insert New Product</h1>
                </div>
                <div class="tab row col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_name">Product Name</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="product_name" name="product_name"
                                   type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="purchase_price">Purchase Price</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="purchase_price" name="purchase_price"
                                   onkeypress="return isNumberKey(event)" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sale_price">Sale Price</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="sale_price" name="sale_price"
                                   onkeypress="return isNumberKey(event)" type="text"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="brand_id">Brand Name</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-Brand/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category_id">Category Name</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-Category/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_type">Product Type</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <x-ProductType/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantity">Quantity</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="quantity" name="quantity" type="text" onkeypress="return isNumberKey(event)"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Upload Product Images</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a id="OpenImgUpload" href="#">Select Images</a>
                            <input type="file" style="display: none" id="imageUpload" accept="image/*"
                                   name="upload_file[]" onchange="preview_image();" multiple/>
                        </div>
                    </div>
                </div>
                <div style="overflow:auto;" class="mr-4 mt-3">
                    <div class="mr-5" style="float:right;">
                        <button type="submit" class="btn btn-primary" id="prevBtn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-12 mt-3 row">
            <div id="image_preview" ></div>
        </div>
    </div>
@endsection
@push('style')
<style type="text/css">
    .image_preview {
        display: flex;
        gap: 20px;
    }

    .preview-image {
        display: flex;
        gap: 20px;
        width: 150px;
    }
</style>
@endpush
@push('script')
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <script>
        $("#OpenImgUpload").click(function () {
            $("#imageUpload").trigger('click');
        });
    </script>
    <script>
        function preview_image() {
            Array.from(event.target.files).filter(f => {
                return f.type.startsWith('image/')
            }).forEach((f) => {
                $('#image_preview').append("<img class='preview-image' src='" + URL.createObjectURL(f) + "'><br>");
            });
        }
    </script>
    <script>
        $(function () {
            $("#product_add").validate({
                errorClass: 'text-danger',
                rules: {
                    product_name: "required",
                    purchase_price: "required",
                    sale_price: "required",
                    brands: "required",
                    category: "required",
                    product_type: "required",
                    quantity: "required",
                    description: "required",
                    'upload_file[]': {
                        required: true,
                        extension: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    product_name: "Enter Product Name",
                    product_price: "Please Enter Product Price",
                    brands: "Please Select Brand",
                    category: "Please Select Category",
                    product_type: "Please Select Product Type",
                    quantity: "Please Enter Product Quantity",
                    description: "Please Enter Description",
                    'upload_file[]': {
                        required: "Please upload Product Image",
                        extension: "Please Select Valid Image Format,Accept Only jpg,jpeg,png,icon,bpm File Format"
                    },
                },
            });
        });
    </script>
@endpush
