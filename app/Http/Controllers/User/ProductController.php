<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use Response;

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
        return redirect()->route('user.viewCart');
    }

    public function viewCart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $data = $carts->map(function ($query) {
            return [
                'id' => $query->id,
                'product_name' => $query->product->name,
                'count' => $query->quantity,
                'offer' => $query->offer->map(function ($q) {
                    return [
                        'offer_id' => $q->id,
                        'offer_name' => $q->name,
                    ];
                }),
                'price' => 10000,
            ];
        });
        $total_items = $carts->count();
        return view('user.myCart', ['carts' => $carts, 'total_items' => $total_items]);
    }
}
