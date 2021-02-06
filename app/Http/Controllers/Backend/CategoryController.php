<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(3);
        return response()->json([
            'categories'=>$categories
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
            'status' => 'required',
        ]);

       Category::create([
           'name'=>$request->name,
           'slug'=>slugify($request->name),
           'status'=>$request->status
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $singleCategory=Category::where('slug',$slug)->first();
        return $singleCategory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required',
        ]);

       Category::where('slug',$slug)->update([
           'name'=>$request->name,
           'slug'=>slugify($request->name),
           'status'=>$request->status
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category=Category::where('slug',$slug)->first();
        $cat_id=$category->id;
        $product=Product::where('categories_id',$cat_id)->count();
        if($product!=0){
            $categorydelete=Category::where('slug',$slug)->delete();
            if($categorydelete){
                return response()->json(['Delete Success'],200);
            }else{
                return response()->json(['Delete failed'],404);
                
            }
         
        }else{
            return response()->json(['Delete Failed!! Product of this category exist'],500);
        }
      
    }
}
