<?php

namespace App\Helpers;

use App\Models\ProductRating;

class BladeServices
{
    public function rating($product_Id): string
    {
        $product_rating = ProductRating::where('product_id', $product_Id)->get();
        $value = "N/A";
        if (count($product_rating) > 0) {
            $rating = [];
            $total = count($product_rating);
            foreach ($product_rating as $rate) {
                array_push($rating, $rate->rating);
            }
            $value = number_format((array_sum($rating) / $total), 1);
        }
        return $value;

    }
}
