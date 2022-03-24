<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::insert([[
            'user_id' => 2,
            'order_date' => Carbon::now(),
            'order_amount' => 6000,
            'net_amount'=>6000,
            'shipping_date'=>Carbon::now(),
            'shipping_address_id'=>1,
            'billing_address_id'=>1,
            'order_status_id'=>1,
        ],[
            'user_id' => 2,
            'order_date' => Carbon::now(),
            'order_amount' => 5000,
            'net_amount'=>5000,
            'shipping_date'=>Carbon::now(),
            'shipping_address_id'=>1,
            'billing_address_id'=>1,
            'order_status_id'=>1,
        ]]);
    }
}
