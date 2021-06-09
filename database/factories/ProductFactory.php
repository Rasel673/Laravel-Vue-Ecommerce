<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Brand;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'brand_id'=>function () {
            return factory(App\Brand::class)->create()->id;
        },
        'categories_id'=>function () {
            return factory(App\Category::class)->create()->id;
        },
        'product_name'=> $faker->name,
        'product_price'=>$faker->numberBetween(100,9000),
        'product_tags'=>$faker->word,
        'slug'=>$faker->unique()->word,
        'product_description'=>$faker->sentence,
        'product_code'=>$faker->randomDigit,
        'product_qty'=>$faker->randomDigit,
        'status'=>'1',
        'product_photo'=>$faker->image('public/Product_photo',270,350, null, false),
    ];
});
