@extends('admin.layout.sidebar',['title'=>'Product'])
@section('content')
    <div class="col-md-12">
        <div class="row g-2">
            <div class="col-md-4">
                <div class="product py-4 w-100"> <span class="off bg-success">-25% OFF</span>
                    <div class="text-center"> <img src="{{ asset('images/iron.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>XRD Active Shoes</h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4"> <span class="off bg-warning">SALE</span>
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Hygen Smart watch </h5> <span>$123.43</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4">
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Acer surface book 2.5</h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4"> <span class="off bg-success">-10% OFF</span>
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Dell XPS Surface</h5> <span>$1,245.89</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4">
                    <!-- <span class="off bg-success">-25% OFF</span> -->
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Acer surface book 5.5</h5> <span>$2,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4"> <span class="off bg-success">-5% OFF</span>
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Xps smart watch 5.0</h5> <span>$999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4"> <span class="off bg-warning">SALE</span>
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Acer surface book 8.5</h5> <span>$3,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4">
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product py-4">
                    <div class="text-center"> <img src="{{ asset('images/user.png') }}" width="200"> </div>
                    <div class="about text-center">
                        <h5>Dell surface book 5</h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                        <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
