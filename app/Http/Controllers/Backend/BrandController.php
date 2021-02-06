<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Brand;
use App\Product;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::paginate(3);
        return response()->json([
            'brands'=>$brands
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get active brands only--------
        $brands=Brand::where('status',1)->get();
        return $brands;
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
            'product_id' => 'required|unique:categories',
            'status' => 'required',
            'image' => 'required',
        ]);

        $photoname=imageConvert($request->image);
        $img =Image::make($request->input('image'))->save(base_path('public/Brand_photo/'.$photoname),50);
        if($img){
            Brand::create([
                'name'=>$request->name,
                'slug'=>slugify($request->name),
                'status'=>$request->status,
                'image'=>$photoname
            ]);
        }
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
        $singleBrand=Brand::where('slug',$slug)->first();
        return $singleBrand;
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
            'image'=>'required'
        ]);

$imageStatus=$request->imgStatus;
$photoname=$request->image;      
if($imageStatus!=null){
    $photoname=imageConvert($request->image);
    $img =Image::make($request->input('image'))->save(base_path('public/Brand_photo/'.$photoname),50);
    $dltimg=Brand::where('slug',$slug)->select('brands.image')->first();
    $deleteImg=unlink(base_path('public/Brand_photo/'.$dltimg->image));
}
       Brand::where('slug',$slug)->update([
           'name'=>$request->name,
           'slug'=>slugify($request->name),
           'status'=>$request->status,
           'image'=>$photoname
       ]);
       return response()->json(['Update Success'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $brand=Brand::where('slug',$slug)->first();
        $brand_id=$brand->id;
        $product=Product::where('brand_id',$brand_id)->count();
        if($product!=0){
        $dltimg=Brand::where('slug',$slug)->select('brands.image')->first(); 
        $deleteImg=unlink(base_path('public/Brand_photo/'.$dltimg->image));
        if($deleteImg){
            $delete=Brand::where('slug',$slug)->delete();
            return response()->json(['Delete Success'],200);
        }else{
            return response()->json(['Delete Failed'],404);
        }
    }else{
        return response()->json(['Delete Failed!! Product of this Brand exist'],500);
    }
      
    }
}
