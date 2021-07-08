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

    public function ratingClass($product_rate): string
    {
        if ($product_rate === "N/A") {
            return "info";
        } else {
            if (3 <= $product_rate) {
                return "success";
            } elseif (2 <= $product_rate) {
                return "warning";
            }
            else{
                return "danger";
            }
        }
    }
}
