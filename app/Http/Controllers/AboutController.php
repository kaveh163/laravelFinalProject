<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Requests\createAboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about= About::all();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createAboutRequest $request)
    {
        $about= new About();
        $about->font = $request->font;
        $about->color= $request->color;
        $about->about= $request->about;
        $about->save();
        session()->flash('store','عملیات بارگذاری اطلاعات بدرستی انجام شد');
        return redirect()->route('about.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($about)
    {
        $about= About::findOrFail($about);
        return $about;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($about)
    {
        About::destroy($about);
        session()->flash('delete', 'عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('about.index');
    }
}
