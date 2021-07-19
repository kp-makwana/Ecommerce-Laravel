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

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function offer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
