<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $offer = [];
        $price = $this->product->sale_price;
        if ($this->offer->count() > 0) {
            foreach ($this->offer as $offer) {
                if ($offer->offer_price) {
                    $price = $price - $offer->offer_price;
                }
                if ($offer->percentage) {
                    $flat = ($this->product->sale_price / 100) * $offer->percentage;
                    $price = $price - $flat;
                }
                if ($offer->flat_discount) {
                    $price = $price - $offer->flat_discount;
                }
            }
            $offer = $this->offer->map(function ($q) {
                return [
                    'name' => $q->offer_name,
                ];
            });
        }

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'product_name' => $this->product->name,
            'product_image' => ($this->product_image[0]) ? asset('storage/ProductImages/' . $this->product_image[0]->name) : asset('images/product.png'),
            'product_price' => round($this->product->sale_price),
            'product_count' => $this->quantity,
            'applied_offer' => $offer ? $offer : null,
            'discountable_price' => $price,
        ];
    }
}
