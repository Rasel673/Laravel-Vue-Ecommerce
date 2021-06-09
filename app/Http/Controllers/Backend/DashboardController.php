<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Color;
use App\Order;
use App\Product;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.layouts.admin');
    }

    public function dashboard(){
        $categories=Category::count();
        $brands=Brand::count();
        $products=Product::count();
        $orders=Order::count();
        $users=User::count();
        $pending=Order::where('status','pending')->count();
        return response()->json([
            'categories'=>$categories,
            'brands'=>$brands,
            'products'=>$products,
            'orders'=> $orders,
            'users'=> $users,
            'pending'=>$pending
        ],200);
    }
}
