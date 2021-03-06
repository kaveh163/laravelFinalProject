<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', 'IndexController@index')->name('show');

Auth::routes();

Route::middleware('auth')->prefix('administrator')->group(function(){
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::resource('/setting', 'SettingController');
    Route::resource('/slider', 'SliderController');
    Route::resource('/about','AboutController');
    Route::resource('/gallery','GalleryController');
    Route::resource('/contact', 'ContactController');
});
Route::post('/insertContact', 'ContactController@store')->name('contact.data');
