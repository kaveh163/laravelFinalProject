<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSliderRequest;
use App\Http\Requests\updateSliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{


    public function index()
    {
        $slider= Slider::paginate(4);
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createSliderRequest $request)
    {
        $slider = new Slider();
        $slider->alt=$request->alt;
        $slider->caption=$request->caption;
        $file = $request->file('image');
        if(!empty($file)){
            $image=$file->getClientOriginalName();
            $pathImage="images/slider/".$image;
            if(file_exists($pathImage)){
                $image=bin2hex(random_bytes(10)).$image;
            }
            $file->move('images/slider',$image);
            $slider->image = $image;
        }
        $slider->save();
        session()->flash('store', 'عملیات بارگذاری اطلاعات با موفقیت انجام شد');
        return redirect()->route('slider.create');


    }

    /**
     * Display the specified resource.
     */
    public function show($slider)
    {
        $slider=Slider::findOrFail($slider);
        return $slider;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slider)
    {
        $slider=Slider::findOrFail($slider);
        return view('admin.slider. edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateSliderRequest $request, $slider)
    {
        $slider= Slider::findOrFail($slider);
        $slider->alt=$request->alt;
        $slider->caption=$request->caption;
        $file=$request->file('image');
        if(empty($file)){
            $image = $slider->image;
            $slider->image=$image;
        } else {
            $imageRecent=$slider->image;
            $pathDelete="images/slider/".$imageRecent;
            unlink($pathDelete);
            $imageNow= $file->getClientOriginalName();
            $path="images/slider/".$imageNow;
            if(file_exists($path)){
                $imageNow=bin2hex(random_bytes(10)).$imageNow;
            }
            $file->move('images/slider', $imageNow);
            $slider->image=$imageNow;
        }
        $slider->save();
        session()->flash("update","عملیات بروزرسانی با موفقیت انجام شد");
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sliderId)
    {
        $slider=Slider::findOrFail($sliderId);
        $pathDelete= 'images/slider/'.$slider->image;
        unlink($pathDelete);
        Slider::destroy($sliderId);
        session()->flash('delete','عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('slider.index');
    }
}
