<?php

namespace App\Helpers;

use App\Models\ProductRating;
use Carbon\Carbon;

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
        if ($product_rate == null) {
            return "info";
        } else {
            if (4 <= $product_rate) {
                return "success";
            } elseif (3 <= $product_rate) {
                return "warning";
            } else {
                return "danger";
            }
        }
    }

    public function dateFormat($date): array
    {
        $data['date'] = date('d-M-Y', strtotime($date));
        $data['time'] = date(("h:i"), strtotime($date));
        return $data;
    }

    public function date_time($date): string
    {
        return date(date('Y-m-d', strtotime($date))) . 'T' . date(date('h:m', strtotime($date)));
    }

    public function lastActivity($since): string
    {
        $dt = Carbon::createFromDate($since);

        if ($dt->isToday()) {
            $time = $dt->diffInMinutes(Carbon::now());
            if(30 > $time){
                return sprintf("%s Minutes Ago", $time);
            }
          return sprintf("Today at %s", $dt->isoFormat('h:mm A'));
        } else if ($dt->isYesterday()) {
            return sprintf("Yesterday at %s", $dt->isoFormat('h:mm A'));
        } else if ($dt->isAfter(Carbon::now()->subWeek())) {
            return sprintf("%s at %s", $dt->isoFormat('dddd'), $dt->isoFormat('h:mm A'));
        } else if ($dt->isSameYear(Carbon::now())) {
            return sprintf("%s at %s", $dt->isoFormat('D MMM'), $dt->isoFormat('h:mm A'));
        }
        return $dt->isoFormat('D MMM Y');

    }

    public function randomColor(): string
    {
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        return '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    }

}
