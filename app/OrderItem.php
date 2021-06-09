<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderItem extends Model
{
    protected $fillable=[
       'order_id',
       'item_name',
       'item_price',
       'item_qty',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
