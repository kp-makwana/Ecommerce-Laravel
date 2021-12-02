<?php

namespace Database\Seeders;

use App\Models\OrderDetails;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetails::insert([
            'order_id'=>1,
            'product_id'=>1,
            'quantity'=>2,
            'discount'=>1000,
        ]);
    }
}
