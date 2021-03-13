<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Size;
use App\Product_Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=Size::paginate(3);
        return response()->json([
            'sizes'=>$sizes
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Sizes=Size::all();
        return $Sizes;
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
            'size_name' => 'required|unique:Sizes',
            'size_value' => 'required',
        ]);

       Size::create([
           'size_name'=>$request->size_name,
           'slug'=>slugify($request->size_name),
           'size_value'=>$request->size_value
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
        $singleSize=Size::where('slug',$slug)->first();
        return $singleSize;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        $this->validate($request,[
            'size_name' => 'required',
            'size_value' => 'required',
        ]);


       Size::where('slug',$slug)->update([
        'size_name'=>$request->size_name,
        'slug'=>slugify($request->size_name),
        'size_value'=>$request->size_value
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
        $Size=Size::where('slug',$slug)->first();
        $Size_id=$Size->size_id;
        $product=Product_Size::where('size_id',$Size_id)->count();
        if($product==0){
            $Sizedelete=Size::where('slug',$slug)->delete();
            if($Sizedelete){
                return response()->json(['Delete Success'],200);
            }else{
                return response()->json(['Delete failed'],500);
            }
        }else{
            return response()->json(['Delete Failed!! Size of this Size exist'],400);
        }
    }
}
