<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'name' => 'Start Testing',
            'ordinal' => 1
        ]);

        DB::table('lessons')->insert([
            'name' => 'Testing Application Code',
            'ordinal' => 2,
            'product_id' => 1
        ]);

        DB::table('lessons')->insert([
            'name' => 'Testing Integrations',
            'ordinal' => 3,
            'product_id' => 1
        ]);

        DB::table('lessons')->insert([
            'name' => 'Testing Additional Classes',
            'ordinal' => 4,
            'product_id' => 1
        ]);

        DB::table('lessons')->insert([
            'name' => 'Testing Tactics',
            'ordinal' => 5,
            'product_id' => 2
        ]);

        DB::table('lessons')->insert([
            'name' => 'Group Q&A Calls',
            'ordinal' => 6,
            'product_id' => 2
        ]);
    }
}
