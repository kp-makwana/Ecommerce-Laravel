<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "sale_price"=> $this->sale_price,
            "brand_name"=> $this->BrandName,
            "category_name"=> $this->CategoryName,
            "product_type"=> $this->ProductType,
            "number_of_rating"=> $this->NoOfRating,
            "avg_rating"=> $this->avg_rating,
            "description"=> $this->description,
            "product_image"=>asset('storage/ProductImages/'.$this->Image),
        ];
    }
}
