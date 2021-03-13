<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Color extends Model
{
    protected $fillable=[
        'product_id',
        'color_id'
    ];
}
