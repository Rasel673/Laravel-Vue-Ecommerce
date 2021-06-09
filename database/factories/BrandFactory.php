<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'slug'=>$faker->unique()->word,
        'status'=>'1',
        'image'=>$faker->image('public/Brand_photo',270,350, null, false)
    ];
});
