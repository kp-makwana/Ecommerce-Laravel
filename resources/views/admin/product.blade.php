@extends('admin.layout.sidebar',['title'=>'Product'])
@section('content')
    <p class="credits">Product pictures from <a href="#">Ecommerce</a>.</p>
    <ul class="cd-gallery">
        @foreach($products as $product)
            <li>
                <div class="py-4">
                    <span class="off bg-secondary">OFFER</span>
                    @php
                        $rating = $bladeService->rating($product->id);
                        $class = $bladeService->ratingClass($rating);
                    @endphp
                    <span
                        class="rating fa fa-star bg-{{ $class }}">&nbsp;&nbsp;{{$rating}}</span>
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
                    <b><a href="#">{{ $product->name }}</a></b>
                    <em class="cd-price"><em style="font-size: small">Purchase Price:</em>
                        &#8377; {{ $product->purchase_price }}</em>
                </div> <!-- cd-item-info -->

            </li>

        @endforeach
        {{ $products->links() }}
    </ul> <!-- cd-gallery -->

@endsection
@push('style')
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">

@endpush
@push('script')
    <script src="{{ asset('js/product/product.js') }}"></script>
@endpush
