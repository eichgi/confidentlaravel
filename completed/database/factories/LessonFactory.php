<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'ordinal' => $faker->randomDigitNotNull,
        'product_id' => null,
    ];
});