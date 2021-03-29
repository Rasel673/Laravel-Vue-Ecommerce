<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Slider;

class SliderController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::paginate(3);
        return response()->json([
            'slider'=>$sliders
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
        $sliders=Slider::where('status',1)->get();
        return $sliders;
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
            'title' => 'required|unique:sliders',
            'status' => 'required',
            'image' => 'required',
        ]);

        $photoname=imageConvert($request->image);
        $img =Image::make($request->input('image'))->save(base_path('public/Slider_photo/'.$photoname),50);
        if($img){
            Slider::create([
                'title'=>$request->title,
                'slug'=>slugify($request->title),
                'description'=>$request->description,
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
        $singleSlider=Slider::where('slug',$slug)->first();
        return $singleSlider;
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
            'title' => 'required',
            'slug'=>'required',
            'status' => 'required',
            'image' => 'required',
        ]);

$imageStatus=$request->imgStatus;
$photoname=$request->image;      
if($imageStatus!=null){
    $photoname=imageConvert($request->image);
    $img =Image::make($request->input('image'))->save(base_path('public/Slider_photo/'.$photoname),50);
    $dltimg=Slider::where('slug',$slug)->select('sliders.image')->first();
    $deleteImg=unlink(base_path('public/Slider_photo/'.$dltimg->image));
}
       Slider::where('slug',$slug)->update([
        'title'=>$request->title,
        'slug'=>slugify($request->title),
        'description'=>$request->description,
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
        $dltimg=Slider::where('slug',$slug)->select('sliders.image')->first(); 
        $deleteImg=unlink(base_path('public/Slider_photo/'.$dltimg->image));
        if($deleteImg){
            $delete=Slider::where('slug',$slug)->delete();
            return response()->json(['Delete Success'],200);
        }else{
            return response()->json(['Delete Failed'],404);
        }
      
    }
}
