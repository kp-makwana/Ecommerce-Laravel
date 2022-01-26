<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Offer;
use App\Traits\Response;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->route('user.viewCart');
    }

    public function viewCart()
    {
        $now = now();

        $items = Cart::with('offer')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $carts = $items->map(function ($query) use ($now) {
            $offers = Offer::where('product_id', $query->product_id)
                ->where('status', 'active')
                ->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now)->get();

            $product_discount = 0;

            foreach ($offers as $offer) {
                if ($offer->offer_price) {
                    $product_discount += $offer->offer_price;
                }
                if ($offer->flat_discount) {
                    $product_discount += $offer->flat_discount;
                }
                if ($offer->percentage) {
                    $product_discount += round(($offer->product->sale_price / 100) * $offer->percentage);
                }
            }

            $this->total_discount += $product_discount;
            $price = ($query->product->sale_price * $query->quantity) - $product_discount;
            $this->total_price += $price;
            $this->original_total_price += $query->product->sale_price * $query->quantity;

            return [
                'id' => $query->id,
                'product_name' => $query->product->name,
                'count' => $query->quantity,
                'offer' => $offers,
                'product_image' => asset('storage/ProductImages/' . $query->product_image[0]->name),
                'original_price' => $query->product->sale_price,
                'price' => $price,
                'product_discount' => $product_discount
            ];
        });

        $delivery_Charges = ($this->total_price < 499) ? 40 : 0;
        $this->total_price += $delivery_Charges;

        $data = [
            'price' => $this->original_total_price,
            'total_item' => $items->count(),
            'discount' => $this->total_discount,
            'delivery_Charges' => $delivery_Charges,
            'total_price' => $this->total_price
        ];
        return view('user.myCart', ['carts' => $carts, 'data' => $data]);
    }
}
