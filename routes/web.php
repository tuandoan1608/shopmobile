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
Route::prefix('admin')->group(function () {
    Route::get('/','homeController@index')->name('home');
    route::get('login','loginController@index')->name('login');
    route::post('ad','loginController@log')->name('ad');
    route::get('register','loginController@register')->name('register');

    //router accessori
   route::prefix('phu-kien')->group(function(){
    route::get('danh-sach','accessoriesController@index');
   });
});
