<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name, //商品名に適したFakerが欲しい
        'description' => $faker->realText($maxNbChars = 50), //realText(500)は長すぎるのでひとまず50文字で設定
        'price' => $faker->numberBetween($min = 0, $max = 1000000),
    ];
});
