<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productImage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productRating(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductRating::class, 'product_id', 'id');
    }

    public function averageRatings()
    {
        return $this->hasMany(ProductRating::class, 'product_id', 'id')->average('rating');
    }

}
