<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Offer;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    use Response;
    public function fetchCountry()
    {
        $countries = Country::all('name','id','country_code');
        $data = $countries->map(function ($q){
            return [
                'id'=>$q->id,
                'name'=>$q->name,
                'code'=>(int)$q->country_code
            ];
        });
        return $this->success($data);
    }

    public function fetchStates()
    {

    }

    public function fetchCities()
    {

    }

    public function productDiscount($id)
    {
        $offers = Offer::where('product_id', $id)
            ->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())->get();

        $product_discount = 0;
        $total_discount = 0;
        #Offer Discount
        foreach ($offers as $offer) {
            $product_discount += $offer->offer_price ?? 0;
            $product_discount += $offer->flat_discount ?? 0;
            $product_discount += $offer->percentage ? round(($offer->product->sale_price / 100) * $offer->percentage) : 0;
        }

        $total_discount += $product_discount; //  Product Discount Assign in total_discount
//        $price = $original_price - $product_discount;   //  Product Discountable Price with Quantity
//        static::$total_price += $price;   //  Grand_Total with Discount
//        static::$original_total_price += $original_price; //  Grand_Total Without Discount

        return $total_discount;
    }
}
