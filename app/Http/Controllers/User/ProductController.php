<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeliveryAddressController;
use App\Models\Cart;
use App\Traits\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response;

    private $total_discount = 0;
    private $total_price = 0;
    private $original_total_price = 0;

    public function index(Request $request)
    {
        $result = (new \App\Http\Controllers\ProductController())->index($request);
        return view('user.Product.index', ['products' => $result['products'], 'request' => $result['request']]);
    }

    public function addToCart($id): \Illuminate\Http\JsonResponse
    {
        $result = (new \App\Http\Controllers\ProductController())->addToCarts($id);
        if ($result) {
            return $this->success($result);
        } else {
            return $this->error('Item not add to cart');
        }
    }

    public function removeFromCart($id): \Illuminate\Http\RedirectResponse
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function buyNow($id): \Illuminate\Http\RedirectResponse
    {
        (new \App\Http\Controllers\ProductController())->addToCarts($id);
        return redirect()->route('user.cart.index');
    }

    public function viewCart()
    {
        return view('user.Cart.index', ['data' => (new CartController())->summary()]);
    }

    public function Address()
    {
        $address = (new DeliveryAddressController())->index();
        return view('user.Cart.Address', ['data' => (new CartController())->summary(), 'address' => $address]);
    }

    public function placeOrder(Request $request)
    {
        return view('user.Cart.payment');
    }

    public function cartQuantityAdd($id): \Illuminate\Http\JsonResponse
    {
        return \App\Http\Controllers\ProductController::cartQuantityAdd($id);
    }

    public function cartQuantityRemove($id): \Illuminate\Http\JsonResponse
    {
        return \App\Http\Controllers\ProductController::cartQuantityRemove($id);
    }
}
