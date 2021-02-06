<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Product;

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(3);
        return response()->json([
            'products'=>$products
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get active category
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

        // $Sizes=$request->product_size;
        // if($Sizes!=null)
        // foreach($Sizes as $size)


        // return $Sizes;

        // exit();
        $this->validate($request,[
            'brand_id' => 'required',
            'categories_id' => 'required',
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_tags' => 'required',
            'product_description' => 'required',
            'product_code' => 'required|unique:products',
            'product_qty' => 'required',
            'status' => 'required',
            'product_photo' => 'required',
        ],[

            'brand_id.required' => 'A Brand is required',
            'categories_id.required' => 'A Category is required',
            'product_name.required' => 'A product name is required',
            'product_price.required' => 'A product price is required',
            'product_tags.required' => 'A product tags  is required',
            'product_description.required' => 'A description is required',
            'product_code.required' => 'A product code  required',
            'product_qty.required' => 'A product quantuty  required',
            'status.required' => 'A product status  required',
            'product_photo.required' => 'A product photo  required'
        ]
    );
         $slug=slugify($request->product_name);
        $photoname=imageConvert($request->product_photo);
        $img =Image::make($request->input('product_photo'))->save(base_path('public/Product_photo/'.$photoname),50);
        if($img){

           $add=Product::insertGetId([
                'brand_id'=>$request->brand_id,
                'categories_id'=>$request->categories_id,
                'product_name'=>$request->product_name,
                'product_price'=>$request->product_price,
                'product_tags'=>$request->product_tags,
                'slug'=> $slug,
                'product_description'=>$request->product_description,
                'product_code'=>$request->product_code,
                'product_qty'=>$request->product_qty,
                'status'=>$request->status,
                'product_photo'=>$photoname,
                // 'product_img_two'=>$photoname,
                // 'product_img_three'=>$photoname,
                // 'product_size'=>$request->product_size,
                // 'product_color'=>$request->product_color
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
        $singleProduct=Product::where('slug',$slug)->first();
        return $singleProduct;
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
            'brand_id' => 'required',
            'categories_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_tags' => 'required',
            'product_description' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'status' => 'required',
            'product_photo' => 'required',
        ],[

            'brand_id.required' => 'A Brand is required',
            'categories_id.required' => 'A Category is required',
            'product_name.required' => 'A product name is required',
            'product_price.required' => 'A product price is required',
            'product_tags.required' => 'A product tags  is required',
            'product_description.required' => 'A description is required',
            'product_code.required' => 'A product code  required',
            'product_qty.required' => 'A product quantuty  required',
            'status.required' => 'A product status  required',
            'product_photo.required' => 'A product photo  required'
        ]
    );

$imageStatus=$request->imgStatus;
$photoname=$request->product_photo;      
if($imageStatus!=null){
    $photoname=imageConvert($request->product_photo);
    $img =Image::make($request->input('product_photo'))->save(base_path('public/Product_photo/'.$photoname),50);
    $dltimg=Product::where('slug',$slug)->select('products.product_photo')->first();
    $deleteImg=unlink(base_path('public/Product_photo/'.$dltimg->product_photo));
}
Product::where('slug',$slug)->update([
    'brand_id'=>$request->brand_id,
    'categories_id'=>$request->categories_id,
    'product_name'=>$request->product_name,
    'product_price'=>$request->product_price,
    'product_tags'=>$request->product_tags,
    'slug'=> $slug,
    'product_description'=>$request->product_description,
    'product_code'=>$request->product_code,
    'product_qty'=>$request->product_qty,
    'status'=>$request->status,
    'product_photo'=>$photoname,
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
        $dltimg=Product::where('slug',$slug)->select('products.product_photo')->first();
        $deleteImg=unlink(base_path('public/Product_photo/'.$dltimg->product_photo));
        if($deleteImg){
            $delete=Product::where('slug',$slug)->delete();
            return response()->json(['Delete Success'],200);
        }else{
            return response()->json(['Delete Failed'],500);
        }
      
    }
}
