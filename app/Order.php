<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
Use App\OrderItem;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'shipping_address',
        'status',
        'total',
        'payment_type',
        'charges',
        'subtotal',
       
    ];

    public function user(){
     return $this->belongsTo('App\User','user_id');
    }

    public function orderItem(){
          return $this->hasMany(OrderItem::class);
    }

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    protected $with=['user','orderItem'];
}
