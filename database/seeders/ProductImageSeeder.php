<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::insert([
            [
                'product_id' => Product::where('name', 'Iphone 12')->first()->id,
                'name' => 'iphone_12_1.jpg',
                'original_name' => 'iphone_12_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Iphone 12')->first()->id,
                'name' => 'iphone_12_2.jpg',
                'original_name' => 'iphone_12_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Iphone 12 pro max')->first()->id,
                'name' => 'iphone_12_pro_max_1.jpg',
                'original_name' => 'iphone_12_pro_max_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Iphone 12 pro max')->first()->id,
                'name' => 'iphone_12_pro_max_2.jpg',
                'original_name' => 'iphone_12_pro_max_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Iphone 12 pro max')->first()->id,
                'name' => 'iphone_12_pro_max_3.jpg',
                'original_name' => 'iphone_12_pro_max_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Iphone 12 pro max')->first()->id,
                'name' => 'iphone_12_pro_max_4.jpg',
                'original_name' => 'iphone_12_pro_max_4.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'OnePlus Nord')->first()->id,
                'name' => 'oneplus_nord_1.jpg',
                'original_name' => 'oneplus_nord_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'OnePlus Nord')->first()->id,
                'name' => 'oneplus_nord_2.jpg',
                'original_name' => 'oneplus_nord_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'OnePlus Nord')->first()->id,
                'name' => 'oneplus_nord_3.jpg',
                'original_name' => 'oneplus_nord_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'OnePlus Nord')->first()->id,
                'name' => 'oneplus_nord_4.jpg',
                'original_name' => 'oneplus_nord_4.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'HP 15s')->first()->id,
                'name' => 'hp_15s_1.webp',
                'original_name' => 'hp_15s_1.webp',
                'mime_type' => 'image/webp',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'HP 15s')->first()->id,
                'name' => 'hp_15s_2.webp',
                'original_name' => 'hp_15s_2.webp',
                'mime_type' => 'image/webp',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'HP 15s')->first()->id,
                'name' => 'hp_15s_3.webp',
                'original_name' => 'hp_15s_3.webp',
                'mime_type' => 'image/webp',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Parallels Desktop 16')->first()->id,
                'name' => 'parallels_desktop_16_1.jpg',
                'original_name' => 'parallels_desktop_16_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Parallels Desktop 16')->first()->id,
                'name' => 'parallels_desktop_16_2.jpg',
                'original_name' => 'parallels_desktop_16_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Parallels Desktop 16')->first()->id,
                'name' => 'parallels_desktop_16_3.jpg',
                'original_name' => 'parallels_desktop_16_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Lenovo Tab M10')->first()->id,
                'name' => 'lenovo_tab_m10_1.jpg',
                'original_name' => 'lenovo_tab_m10_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Lenovo Tab M10')->first()->id,
                'name' => 'lenovo_tab_m10_2.jpg',
                'original_name' => 'lenovo_tab_m10_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'Lenovo Tab M10')->first()->id,
                'name' => 'lenovo_tab_m10_3.jpg',
                'original_name' => 'lenovo_tab_m10_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'redmi note 8')->first()->id,
                'name' => 'redmi_note_8_1.png',
                'original_name' => 'redmi_note_8_1.png',
                'mime_type' => 'image/png',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'redmi note 8')->first()->id,
                'name' => 'redmi_note_8_2.png',
                'original_name' => 'redmi_note_8_2.png',
                'mime_type' => 'image/png',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'redmi note 8')->first()->id,
                'name' => 'redmi_note_8_3.png',
                'original_name' => 'redmi_note_8_3.png',
                'mime_type' => 'image/png',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'macbook')->first()->id,
                'name' => 'macbook_1.jpg',
                'original_name' => 'macbook_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'macbook')->first()->id,
                'name' => 'macbook_2.jpg',
                'original_name' => 'macbook_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'macbook')->first()->id,
                'name' => 'macbook_3.jpg',
                'original_name' => 'macbook_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'lenovo ideapad 3')->first()->id,
                'name' => 'ideapad_3_1.jpg',
                'original_name' => 'ideapad_3_1.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'lenovo ideapad 3')->first()->id,
                'name' => 'ideapad_3_2.jpg',
                'original_name' => 'ideapad_3_2.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'lenovo ideapad 3')->first()->id,
                'name' => 'ideapad_3_3.jpg',
                'original_name' => 'ideapad_3_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ], [
                'product_id' => Product::where('name', 'lenovo ideapad 3')->first()->id,
                'name' => 'ideapad_3_4.jpg',
                'original_name' => 'ideapad_3_3.jpg',
                'mime_type' => 'image/jpeg',
                'size' => 120,
            ]
        ]);
    }
}

