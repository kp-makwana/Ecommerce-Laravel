<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Offer;
use App\Traits\Response;
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

        #Get Cart Data
        $items = Cart::with('offer')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        #Cart Data Mapping
        $carts = $items->map(function ($query) use ($now) {
            $offers = Offer::where('product_id', $query->product_id)
                ->where('status', 'active')
                ->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now)->get();

            $offer_data = $offers->map(function ($query) {
                return $query->offer_name;
            });

            $product_discount = 0;

            #Offer Discount
            foreach ($offers as $offer) {
                $product_discount += $offer->offer_price ?? 0;
                $product_discount += $offer->flat_discount ?? 0;
                $product_discount += $offer->percentage ? round(($offer->product->sale_price / 100) * $offer->percentage) : 0;
            }

            $original_price = $query->product->sale_price * $query->quantity;   // Product Original value assign with Quantity
            $this->total_discount += $product_discount; //  Product Discount Assign in total_discount
            $price = $original_price - $product_discount;   //  Product Discountable Price with Quantity
            $this->total_price += $price;   //  Grand_Total with Discount
            $this->original_total_price += $original_price; //  Grand_Total Without Discount

            #Product Data
            return [
                'id' => $query->id,
                'product_id' => $query->product_id,
                'product_name' => $query->product->name,
                'count' => $query->quantity,
                'offer' => $offer_data,
                'product_image' => asset('storage/ProductImages/' . $query->product_image[0]->name),
                'original_price' => $original_price,
                'price' => $price,
                'product_discount' => $product_discount
            ];
        });

        #Delivery_Charges
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

    public function cartQuantityAdd($id): \Illuminate\Http\JsonResponse
    {
        return \App\Http\Controllers\ProductController::cartQuantityAdd($id);
    }

    public function cartQuantityRemove($id): \Illuminate\Http\JsonResponse
    {
        return \App\Http\Controllers\ProductController::cartQuantityRemove($id);
    }
}
