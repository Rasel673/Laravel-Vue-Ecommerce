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

public function product_color()
{
    return $this->hasOne('App\Product_Color','product_id');
}
public function product_size()
{
    return $this->hasOne('App\Product_Size','product_id');
}
public function category()
{
    return $this->belongsTo('App\Category','categories_id','');
}
public function brand()
{
    return $this->belongsTo('App\Brand','brand_id','');
}
}
