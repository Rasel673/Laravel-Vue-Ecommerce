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

Route::get('/', function () {
    return view('frontend.layouts.interface');});

Auth::routes();
///backend routes============================================================================
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->name('path','*.');
/// Category Controller---------------------------
Route::resource('categories', 'Backend\CategoryController');
//brand route-----------------------------------
Route::resource('brands', 'Backend\BrandController');
//Product Controller---------------------------------
Route::resource('products', 'Backend\ProductController');
///Size Controller----------------------------
Route::resource('sizes', 'Backend\SizeController');
//Color Controller-----------------------
Route::resource('colors', 'Backend\ColorController');
///Slider route here------------------------------
Route::resource('sliders','Backend\SliderController');
///frontene routes====================================================
Route::get('index','Frontend\IndexController@index');
