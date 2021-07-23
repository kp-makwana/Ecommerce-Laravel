@extends('admin.layout.sidebar',['title'=>$product->name])
@section('content')
    <form action="{{ route('admin.product.save',$product->id) }}" method="POST" id="update_product" name="update_product">
        @csrf
        <ul class="cd-gallery">
            <li class="col-md-6 custom-product">
                <ul class="cd-item-wrapper py-5">
                    @foreach($product->productImage as $key => $product_img)
                        <li class="{{ $key == 0 ? "selected":"move-right"}}" data-sale=""
                            data-price="&#8377; {{ $product->sale_price }}">

                            <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                                 alt="Preview image">
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="col-md-6 py-4 px-5 bg-light text-black-50">
                <div class="mb-3 row">
                    <label for="product_name" class="col-md-3 col-form-label text-dark font-weight-bold">Product
                        Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_name" name="product_name"
                               value="{{ $product->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="brand" class="col-md-3 col-form-label text-dark font-weight-bold">Brand
                        Name</label>
                    <div class="col-sm-9">
                        <x-brand :brand="$product->brand_id" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category" class="col-md-3 col-form-label text-dark font-weight-bold">Category Name</label>
                    <div class="col-sm-9">
                        <x-Category :category="$product->category_id" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="product_type" class="col-md-3 col-form-label text-dark font-weight-bold">Product Type</label>
                    <div class="col-sm-9">
                        <x-ProductType :type="$product->product_type_id" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="purchase_price" class="col-md-3 col-form-label text-success"><strong>Purchase
                            Price:</strong></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="purchase_price" name="purchase_price"
                               value="{{ $product->purchase_price }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sale_price" class="col-md-3 col-form-label text-danger"><strong>Sale
                            Price:</strong></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="sale_price" name="sale_price"
                               value="{{ $product->sale_price }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="quantity" class="col-md-3 col-form-label text-dark"><strong>Available
                            Stock:</strong></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="quantity" name="quantity"
                               value="{{ $product->quantity }}">
                    </div>
                </div>

            </li>
        </ul>
        <div class="col-md-12">
            <div class="pb-3">
                <div class="float-left"><strong>Description:</strong></div>
            </div>
            <hr>
            <div class="col-md-12">
                <textarea class="form-control" name="description" id="description" placeholder="Leave a comment here" id="floatingTextarea2"
                          style="height: 250px">{{ $product->description }}</textarea>
            </div>
            <input type="file" style="display: none" id="imageUpload" accept="image/*"
                   name="upload_file[]" onchange="preview_image();" multiple/>
{{--            <input type="file" style="display: none" id="imageUpload" accept="image/*"--}}
{{--                   name="upload_file[]" onchange="preview_image();" multiple/>--}}
        </div>
{{--        <hr>--}}

        <div class="col-md-12 mt-5">
            <div class="pb-3">
                <div class="float-left"><strong>Product Images:</strong></div>
                <div class="float-right"><a id="OpenImgUpload" href="#">Select Images</a></div>
            </div>
            <hr>
            <div class="col-md-12">
{{--                <form action="{{ route('admin.product.delete_img') }}" method="POST">--}}
{{--                    @csrf--}}
                    <div class="col-md-12 row mb-2">
                        <?php $img = [] ?>
                        @foreach($product->productImage as $key => $product_img)
                            <label class="col-md-3 cd-item-wrapper row">
                                <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}" class="mb-2"
                                     style="display: flex;
                                gap: 20px;
                                width: 150px;"
                                     alt="Preview image">
                                <input type="checkbox" name="img[{{ $img = $product_img->id}}]"
                                       class="text-center cb-element">
                            </label>
                        @endforeach
                        <hr>
                    </div>
                    <div class="pb-3">
                        <div class="float-left">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked Images is Deleting</label>
                            </div>
                        </div>
{{--                        <div class="float-right">--}}
{{--                            <button id="Delete_img" type="submit" class="btn btn-danger">Delete Selected Images</button>--}}
{{--                        </div>--}}
                    </div>
{{--                </form>--}}
                <div id="image_preview" style="margin-top: 50px"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="pb-3">
                <div class="float-right ml-2">
                    <button id="submit" type="submit" class="btn btn-success">Save Changes</button>
                </div>
                <div class="float-right ml-2"><a href="{{ route('admin.product.edit',$product->id) }}">
                        <button id="submit" class="btn btn-info">Reset</button>
                    </a></div>
                <div class="float-right">
                    <a href="{{ route('admin.product.productDetail',$product->id) }}">
                        <button type="button" style="background: #c6c8ca" class="btn">Cancel</button>
                    </a>
                </div>
            </div>
        </div>
    </form>
{{--    <hr>--}}
@endsection
@push('style')
    <style>
        .preview-image {
            display: block;
            gap: 20px;
            width: 150px;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
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
        $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });

        $(".cb-element").change(function () {
            if ($(".cb-element").length == $(".cb-element:checked").length)
                $("#checkAll").prop('checked', true);
            else
                $("#checkAll").prop('checked', false);
        });
    </script>

    <script>
            // $("#update_product").validate({
            //     errorClass: 'text-danger',
            //     rules: {
            //         product_name: "required",
            //         purchase_price: "required",
            //         sale_price: "required",
            //         brands: "required",
            //         category: "required",
            //         product_type: "required",
            //         quantity: "required",
            //         description: "required",
            //         'upload_file[]': {
            //             required: true,
            //             extension: "jpg|jpeg|png|ico|bmp"
            //         }
            //     },
            //     messages: {
            //         product_name: "Enter Product Name",
            //         product_price: "Please Enter Product Price",
            //         brands: "Please Select Brand",
            //         category: "Please Select Category",
            //         product_type: "Please Select Product Type",
            //         quantity: "Please Enter Product Quantity",
            //         description: "Please Enter Description",
            //         'upload_file[]': {
            //             required: "Please upload Product Image",
            //             extension: "Please Select Valid Image Format,Accept Only jpg,jpeg,png,icon,bpm File Format"
            //         },
            //     },
            // });
    </script>
@endpush
