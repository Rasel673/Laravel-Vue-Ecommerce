<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

protected $fillable=[
    'product_id',
    'brand_id',
    'categories_id',
    'product_name',
    'product_price',
    'product_tags',
    'slug',
    'product_description',
    'product_code',
    'product_qty',
    'status',
    'product_photo',

];
}
