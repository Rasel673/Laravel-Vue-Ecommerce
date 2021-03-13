<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    protected $fillable=[
        'product_id',
        'size_id'
    ];
}
