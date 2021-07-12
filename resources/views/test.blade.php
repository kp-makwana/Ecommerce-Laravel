<div id="main">
    <form action="{{ route('admin.product.index') }}" method="GET">
        <div class="col-md-12 row">
            <div class="col-md-2">
                <x-Category category="{{ $request['category'] ?? null }}"/>
            </div>
            <div class="col-md-2">
                <x-Brand brand="{{ $request['brands'] ?? null }}"/>
            </div>
            <div class="col-md-2">
                <x-ProductRating selectedRating="{{ $request['rating'] ?? null }}"/>
            </div>
            <div class="col-md-4 float-right">
                <input type="search" name="search" id="search" class="form-control float-right bg-dark text-white" placeholder="Search..." value="{{ $request['search'] ?? null }}"
                       aria-label="Search">
            </div>
            <div class="col-md-2 float-right">
                <a href="" class="ml-5">
                    <input type="submit" class="btn btn-primary"/>
                </a>
            </div>
        </div>
    </form>
    <div class="my-3">
        <div class="text-lg-left mx-3">Latest Product <a href="{{ route('admin.product.index') }}">Here</a>.</div>
        <div class="text-lg-right"><a href="{{ route('admin.product.add') }}" class="btn btn-success">Add New
                Product</a></div>
    </div>
    <ul class="cd-gallery">
        @forelse($products as $product)
            <li>
                <div class="py-4">
                    <span class="off bg-secondary">OFFER</span>
                    @php
                        $class = $bladeService->ratingClass($product->avg_rating);
                    @endphp
                    <span
                        class="rating fa fa-star bg-{{ $class }}">&nbsp;&nbsp;{{$product->avg_rating ?? "N/A"}}</span>
                    <span
                        class="on bg-{{ $product->quantity == 0 ? "danger":"success" }}">{{ $product->quantity }}</span>
                </div>
                <ul class="cd-item-wrapper">
                    @foreach($product->productImage as $key => $product_img)
                        <li class="{{ $key == 0 ? "selected":"move-right"}}" data-sale="true"
                            data-price="&#8377; {{ $product->sale_price }}">
                            <img src="{{ asset('/storage/ProductImages/'.$product_img->name) }}"
                                 alt="Preview image">
                        </li>
                    @endforeach
                </ul> <!-- cd-item-wrapper -->

                <div class="cd-item-info">
                    <b><a href="">{{ $product->name }}</a></b>
                    <em class="cd-price"><em style="font-size: small">Purchase Price:</em>
                        &#8377; {{ $product->purchase_price }}</em>
                </div> <!-- cd-item-info -->

            </li>
        @empty
            <div class="w-75 col-md-10">
                <div class="text-lg-center"><h4 class="text-danger">No Data Found</h4></div>
                <img src="{{asset('images/no-data.png')}}" class="img-fluid" alt="No Data Found"></div>
        @endforelse
        {{ $products->appends($request)->links() }}
    </ul>
</div>
