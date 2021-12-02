<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statues = ['ordered', 'packed', 'shipped', 'delivered', 'return', 'return_approved', 'pickup', 'refund'];
        foreach ($statues as $status) {
            OrderStatus::insert([
                'name' => $status,
            ]);
        }
    }
}
