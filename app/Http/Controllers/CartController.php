<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private static $total_discount = 0;
    private static $total_price = 0;
    private static $original_total_price = 0;

    public function summary(): array
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
            static::$total_discount += $product_discount; //  Product Discount Assign in total_discount
            $price = $original_price - $product_discount;   //  Product Discountable Price with Quantity
            static::$total_price += $price;   //  Grand_Total with Discount
            static::$original_total_price += $original_price; //  Grand_Total Without Discount

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
        $delivery_Charges = (static::$total_price < 499) ? 40 : 0;
        static::$total_price += $delivery_Charges;

        return [
            'price' => static::$original_total_price,
            'total_item' => $items->count(),
            'discount' => static::$total_discount,
            'delivery_Charges' => $delivery_Charges,
            'total_price' => static::$total_price,
            'carts' => $carts
        ];
    }
}
