<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Starter',
            'price' => 89,
            'ordinal' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Master',
            'price' => 149,
            'ordinal' => 2
        ]);
    }
}
