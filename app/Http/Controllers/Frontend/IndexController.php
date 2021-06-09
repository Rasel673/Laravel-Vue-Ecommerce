<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Slider;
use Auth;
use App\Order;
use App\OrderItem;

class IndexController extends Controller
{
    public function index()
    {
       
        $brands=Brand::where('status','1')->get();
        $categories=Category::where('status','1')->paginate(10);
        $sliders=Slider::where('status','1')->get();
        $products=Product::where('status','1')->where('product_qty','!=',0)->paginate(10);
        return response()->json([
            'categories'=>$categories,
            'brands'=>$brands,
            'products'=>$products,
            'sliders'=> $sliders
        ],200);
    }

    public function filter(Request $request){

       $data=$request->data;
       $field=$request->field;
       $products=Product::where($field, $data)->get();
       return $products;
       
    }

    public function priceRange(Request $request){
    $value=$request->value;
    return dd($request);
    }

    public function order(Request $request){
        $billingAddress=$request->billing;
        $shipppingAddress=$request->shipping;
        $status=$request->shipStatus;
        $ship='';
        if($status==false){
      $ship=json_encode($billingAddress);
        }else{
          $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:orders',
            'phone' => 'required|numeric|min:11|max:11',
            'address' => 'required',
        ]);

      $ship=json_encode($shipppingAddress);
        }

   $user=Auth::user();
     $user_id=$user->id;
///insert data in order table-------------------
$order=new Order();
$order->user_id=$user_id;
$order->shipping_address=$ship;
$order->status='pending';
$order->total=$request->total;
$order->payment_type='Cash on Delivery';
$order->charges=0.00;
$order->subtotal=$request->total+0.00;
$order->save();


///order items table insert---------------------------
        $order_item=new OrderItem();
        $carts=$request->carts;
        foreach($carts as $cart){
          $order_item->order_id=$order->id;
          $order_item->product_id=$cart['product']['product_id'];
          $order_item->item_name=$cart['product']['product_name'];
          $order_item->item_price=$cart['product']['product_price'];
          $order_item->item_qty=$cart['qty'];
          $order_item->save();
        }
         
        return response(['message'=>'Order Successfully inserted'],200);
    }
}
