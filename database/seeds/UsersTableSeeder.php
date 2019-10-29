<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'jmac@confidentlaravel.com',
            'name' => 'Jason McCreary',
            'password' => Hash::make('mccreaja')
        ]);
    }
}
