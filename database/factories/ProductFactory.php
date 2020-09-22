<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => 'shampoo ' . random_int(1, 1000),
        'catalog_id' => 13,
        'price' => rand(1.99, 3.99) * 100,
        'image_name' => Str::random(10),
        'model' => 'model ' . random_int(1, 1000),
        'description' => $faker->text(300),
        'producer' => 'producer ' . random_int(1, 1000),
        'packaging' => random_int(100, 999) . ' ml',
        'ean_code' => random_int(10000000000000, 99999999999999)
    ];
});
