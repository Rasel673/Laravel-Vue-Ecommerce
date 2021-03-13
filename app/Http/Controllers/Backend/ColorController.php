<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use App\Product_color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=color::paginate(3);
        return response()->json([
            'colors'=>$colors
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors=color::all();
        return $colors;
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
            'color_name' => 'required|unique:colors',
            'color_value' => 'required',
        ]);

       color::create([
           'color_name'=>$request->color_name,
           'slug'=>slugify($request->color_name),
           'color_value'=>$request->color_value
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
        $singlecolor=color::where('slug',$slug)->first();
        return $singlecolor;
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
            'color_name' => 'required',
            'color_value' => 'required',
        ]);


       color::where('slug',$slug)->update([
        'color_name'=>$request->color_name,
        'slug'=>slugify($request->color_name),
        'color_value'=>$request->color_value
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
        $color=color::where('slug',$slug)->first();
        $color_id=$color->color_id;
        $product=Product_color::where('color_id',$color_id)->count();
        if($product==0){
            $colordelete=color::where('slug',$slug)->delete();
            if($colordelete){
                return response()->json(['Delete Success'],200);
            }else{
                return response()->json(['Delete failed'],500);
                
            }
         
        }else{
            return response()->json(['Delete Failed!! Color of this color exist'],400);
        }
      
    }
}
