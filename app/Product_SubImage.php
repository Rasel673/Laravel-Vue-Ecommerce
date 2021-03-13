<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_SubImage extends Model
{
    protected $fillable=[
        'product_id',
        'sub_image'
    ];
}
