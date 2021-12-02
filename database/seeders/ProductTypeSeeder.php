<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['electric','sports', 'book', 'health', 'grocery'];
        foreach ($category as $data) {
            ProductType::insert([
                'name' => $data,
            ]);
        }
    }
}
