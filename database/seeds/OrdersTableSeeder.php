<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'product_id' => \App\Product::FULL,
            'stripe_id' => 'initialjmacaccount',
            'total' => 0
        ]);
    }
}
