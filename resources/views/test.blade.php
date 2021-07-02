<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #eee
        }

        .t-products {
            background-image: linear-gradient(to right top, #5629c0, #5625cb, #5620d5, #551ae0, #5412eb);
            color: #fff;
            border-radius: 3px
        }

        .processor {
            background-color: #fff;
            margin-top: 5px;
            border-bottom: 1px solid #eee
        }

        .brand {
            background-color: #fff;
            border-bottom: 1px solid #eee
        }

        .type {
            background-color: #fff
        }

        .product {
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            position: relative
        }

        .about span {
            color: #5629c0;
            font-size: 16px
        }

        .cart-button button {
            font-size: 12px;
            color: #fff;
            background-color: #5629c0;
            height: 38px
        }

        .cart-button button:focus,
        button:active {
            font-size: 12px;
            color: #fff;
            background-color: #5629c0;
            box-shadow: none
        }

        .product_fav i {
            line-height: 40px;
            color: #5629c0;
            font-size: 15px
        }

        .product_fav {
            display: inline-block;
            width: 36px;
            height: 39px;
            background: #FFFFFF;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            border-radius: 11%;
            text-align: center;
            cursor: pointer;
            margin-left: 3px;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease
        }

        .product_fav:hover {
            background: #5629c0
        }

        .product_fav:hover i {
            color: #fff
        }

        .about {
            margin-top: 12px
        }

        .off {
            position: absolute;
            left: 65%;
            top: 6%;
            width: 80px;
            text-align: center;
            height: 30px;
            line-height: 8px;
            border-radius: 5px;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid mt-5 mb-5">
    <div class="row g-2">
        <div class="col-md-3">
            <div class="t-products p-2">
                <h6 class="text-uppercase">Computer & Periferals</h6>
                <div class="p-lists">
                    <div class="d-flex justify-content-between mt-2"> <span>Laptops</span> <span>23</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Desktops</span> <span>46</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Monitors</span> <span>13</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Mouse</span> <span>33</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Keyboard</span> <span>12</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Printer</span> <span>53</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>Mobiles</span> <span>203</span> </div>
                    <div class="d-flex justify-content-between mt-2"> <span>CPU</span> <span>23</span> </div>
                </div>
            </div>
            <div class="processor p-2">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h6 class="text-uppercase">Processor</h6> <span>--</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Intel Core i7 </label> </div> <span>3</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Core i6 </label> </div> <span>4</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Core i3 </label> </div> <span>14</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Centron </label> </div> <span>8</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Pentinum </label> </div> <span>14</span>
                </div>
            </div>
            <div class="brand p-2">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h6 class="text-uppercase">Brand</h6> <span>--</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Apple </label> </div> <span>13</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Asus </label> </div> <span>4</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Dell </label> </div> <span>24</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Lenovo </label> </div> <span>18</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Acer </label> </div> <span>44</span>
                </div>
            </div>
            <div class="type p-2 mb-2">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h6 class="text-uppercase">Type</h6> <span>--</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Hybrid </label> </div> <span>23</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Laptop </label> </div> <span>24</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Desktop </label> </div> <span>14</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Touch </label> </div> <span>28</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Tablets </label> </div> <span>44</span>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="product py-4"> <span class="off bg-success">-25% OFF</span>
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
    </div>
</div>
</body>
</html>
