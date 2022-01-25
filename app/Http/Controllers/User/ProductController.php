<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Traits\Response;
use Illuminate\Database\Query\Builder;
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
        $now = now();

//        $items = Cart::with('product','product_image','offer')
//            ->where('user_id', Auth::user()->id)
//            ->orderBy('created_at', 'DESC')
//            ->get();

        $items = Cart::with('offer',function ($offer) use($now){
            $offer->where('status','active')
                ->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now);
        })
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $carts = $items->map(function ($query) use ($now) {
            return [
                'id' => $query->id,
                'product_name' => $query->product->name,
                'count' => $query->quantity,
                'offer' => $query->offer,
                'product_image'=> asset('storage/ProductImages/' . $query->product_image[0]->name),
                'price' => 10000,
            ];
        });
        $data = [
            'price' => 7500,
            'total_item' => $items->count(),
            'discount' => 749,
            'delivery_Charges' => 499,
            'total_price' => 7549
        ];
        return view('user.myCart', ['carts' => $carts, 'data' => $data]);
    }
}
