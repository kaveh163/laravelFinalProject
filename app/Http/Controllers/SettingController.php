<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequestSetting;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting= Setting::paginate(3);
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestSetting $request)
    {
        $setting= new Setting();
        $setting->title = $request->title;
        $setting->author= $request->author;
        $setting->keywords = $request->keywords;
        $setting->description= $request->description;
        $setting->save();
        return redirect()->route('setting.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($setting)
    {
        $setting= Setting::findOrFail($setting);
        return $setting;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($setting)
    {
        Setting::destroy($setting);
        return redirect()->route('setting.index');
    }
}
