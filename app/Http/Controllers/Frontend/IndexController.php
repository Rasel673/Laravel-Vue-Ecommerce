<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::where('status','1')->get();
        $products=Product::select('product_id','slug','product_name','product_photo','product_price')->where('status','1')->get();
        return response()->json([
            'categories'=>$categories,
            'products'=>$products
        ],200);
    }
}
