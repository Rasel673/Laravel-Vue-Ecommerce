<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable=[
        'size_name',
        'slug',
        'size_value'
    ];
}
