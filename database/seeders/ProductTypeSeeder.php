<?php

namespace Database\Seeders;

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
            DB::table('product_types')->insert([
                'name' => $data,
            ]);
        }
    }
}
