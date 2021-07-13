<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([[
            'name' => 'Iphone 12',
            'purchase_price' => 50000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'sale_price' => 77900,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>4.4
        ], [
            'name' => 'Iphone 12 pro max',
            'purchase_price' => 100000,
            'sale_price' => 125900,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>3.3
        ], [
            'name' => 'OnePlus Nord',
            'purchase_price' => 20000,
            'sale_price' => 27999,
            'brand_id' => Brand::where('name', 'oneplus')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>2.2
        ], [
            'name' => 'HP 15s',
            'purchase_price' => 35000,
            'sale_price' => 60000,
            'brand_id' => Brand::where('name', 'hp')->first()->id,
            'category_id' => Category::where('name', 'laptop')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>4
        ], [
            'name' => 'Parallels Desktop 16',
            'purchase_price' => 150000,
            'sale_price' => 210000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'pc')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>1.1
        ], [
            'name' => 'Lenovo Tab M10',
            'purchase_price' => 14000,
            'sale_price' => 17500,
            'brand_id' => Brand::where('name', 'lenovo')->first()->id,
            'category_id' => Category::where('name', 'tablets')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
        ], [
            'name' => 'redmi note 8',
            'purchase_price' => 7500,
            'sale_price' => 10000,
            'brand_id' => Brand::where('name', 'mi')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>3.5
        ], [
            'name' => 'Apple mac book pro',
            'purchase_price' => 150000,
            'sale_price' => 222000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'laptop')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating'=>1.1
        ]
        ]);
    }
}
