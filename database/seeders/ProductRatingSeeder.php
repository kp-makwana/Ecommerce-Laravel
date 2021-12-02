<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $product = ['redmi note 8', 'OnePlus 8T', 'Samsung M30', 'HP 15s', 'Boat RackZ', 'Armani'];
//        foreach ($product as $data) {
//            DB::table('products')->insert([
//                'name' => $data,
//                'purchase_price' => Arr::random([4000, 5000, 6000]),
//                'sale_price' => Arr::random([6000, 7000, 8000]),
//                'category_id' => Category::all()->random()->id,
//                'product_type_id' => ProductType::all()->random()->id,
//                'quantity' => rand(50, 100),
//            ]);
//        }
    }
}
