<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'product_id' => function () {
            return factory(App\Product::class)->state('starter')->create()->id;
        },
        'transaction_id' => $faker->word,
        'coupon_id' => function () {
            return factory(App\Coupon::class)->create()->id;
        },
        'total' => $faker->randomFloat(2, 1, 100),
    ];
});
