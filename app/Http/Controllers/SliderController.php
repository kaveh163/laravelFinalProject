<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSliderRequest;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{


    public function index()
    {
        //
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
        return redirect()->route('slider.create');


    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
