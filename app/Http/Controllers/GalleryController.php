<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\createGalleryRequest;
use App\Http\Requests\updateGalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery= Gallery::paginate(3);
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createGalleryRequest $request)
    {
        $gallery= new Gallery();
        $file = $request->file('image');
        if (!empty($file)){
            $image = $file->getClientOriginalName();
            $pathImage= 'images/gallery/'.$image;
            if(file_exists($pathImage)){
               $image= bin2hex(random_bytes(10)).$image;
            }
            $file->move('images/gallery', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        session()->flash('store','عملیات بارگذاری اطلاعات با موفقیت انجام شد');
        return redirect()->route('gallery.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        return $gallery;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateGalleryRequest $request, $gallery)
    {
        $gallery = Gallery::findOrFail($gallery);
        $file = $request->file('image');
        if(empty($file)){
            $image= $gallery->image;
            $gallery->image= $image;
        } else {
            $imageDelete = $gallery->image;
            $pathDelete = 'images/gallery/'.$imageDelete;
            unlink($pathDelete);
            $image = $file->getClientOriginalName();
            $pathImage= 'images/gallery/'.$image;
            if(file_exists($pathImage)){
                $image = bin2hex(random_bytes(10)).$image;
            }
            $file->move('images/gallery', $image);
            $gallery->image = $image;
        }
        $gallery->save();
        session()->flash('update', 'عملیات بروزرسانی با موفقیت انجام شد');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
        $deleteImage = 'images/gallery/'.$gallery->image;
        unlink($deleteImage);
        Gallery::destroy($galleryId);
        session()->flash('delete', 'عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('gallery.index');

    }
}
