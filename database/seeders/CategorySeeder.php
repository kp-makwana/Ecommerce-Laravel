<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = ['Laptop', 'Phone', 'PC', 'Fan', 'Mobile-Accessories', 'Smart Wearable Tech', 'Health Care Appliances', 'Desktop PCs', 'Tablets', 'Speakers', 'Camera'];
        foreach ($category as $data) {
            DB::table('categories')->insert([
                'name' => $data,
            ]);
        }
    }
}
