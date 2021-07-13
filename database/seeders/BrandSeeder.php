<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = ['mi', 'apple', 'oneplus', 'samsung', 'lg', 'hp', 'lenovo', 'dell'];
        foreach ($category as $data) {
            DB::table('brands')->insert([
                'name' => $data,
            ]);
        }
    }
}
