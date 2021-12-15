<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([[
            'name' => 'Iphone 12',
            'purchase_price' => 50000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'sale_price' => 77900,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4.4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'Iphone 12 pro max',
            'purchase_price' => 100000,
            'sale_price' => 125900,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 3.3,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'OnePlus Nord',
            'purchase_price' => 20000,
            'sale_price' => 27999,
            'brand_id' => Brand::where('name', 'oneplus')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4.4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'HP 15s',
            'purchase_price' => 35000,
            'sale_price' => 60000,
            'brand_id' => Brand::where('name', 'hp')->first()->id,
            'category_id' => Category::where('name', 'laptop')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'Parallels Desktop 16',
            'purchase_price' => 150000,
            'sale_price' => 210000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'pc')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 1.1,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'Lenovo Tab M10',
            'purchase_price' => 14000,
            'sale_price' => 17500,
            'brand_id' => Brand::where('name', 'lenovo')->first()->id,
            'category_id' => Category::where('name', 'tablets')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 2.2,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'redmi note 8',
            'purchase_price' => 7000,
            'sale_price' => 10000,
            'brand_id' => Brand::where('name', 'mi')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4.4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'macbook',
            'purchase_price' => 40000,
            'sale_price' => 50000,
            'brand_id' => Brand::where('name', 'apple')->first()->id,
            'category_id' => Category::where('name', 'laptop')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'lenovo ideapad 3',
            'purchase_price' => 40000,
            'sale_price' => 50000,
            'brand_id' => Brand::where('name', 'lenovo')->first()->id,
            'category_id' => Category::where('name', 'laptop')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 4,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ], [
            'name' => 'OnePlus Nord 2 5G',
            'purchase_price' => 20000,
            'sale_price' => 27999,
            'brand_id' => Brand::where('name', 'oneplus')->first()->id,
            'category_id' => Category::where('name', 'phone')->first()->id,
            'product_type_id' => ProductType::where('name', 'electric')->first()->id,
            'quantity' => rand(50, 100),
            'avg_rating' => 2.2,
            'description' => "13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box"
        ]
        ]);
    }
}
