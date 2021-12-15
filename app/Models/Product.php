<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    public $sortable = [
        'id',
        'name',
        'sale_price',
        'avg_rating',
        'quantity',
        'updated_at',
    ];

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
        return ProductRating::where('product_id', $this->id)->average('rating');
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function offers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function getProductTypeAttribute()
    {
        $product_type = ProductType::find($this->product_type_id);
        return $product_type->name;
    }

    public function getNoOfRatingAttribute()
    {
        return ProductRating::count();
    }

    public function getImageAttribute()
    {
        $image = ProductImage::where('product_id', $this->id)->first();
        return $image['name'];
    }

}
