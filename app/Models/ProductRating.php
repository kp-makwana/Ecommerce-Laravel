<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    public const RATING = [
        '4+' => '4 & Above',
        '3+' => '3 & Above',
        '2+' => '2 & Above',
        '1+' => '1 & Above',
        '4-5' => '4 to 5',
        '3-4' => '3 to 4',
        '2-3' => '2 to 3',
        '1-2' => '1 to 2',
    ];

    use HasFactory;

    protected $table = "product_ratings";

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
