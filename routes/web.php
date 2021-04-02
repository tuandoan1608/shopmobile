<?php

use App\Http\Controllers\categoryController;
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
    route::get('/auth/logout','loginController@getLogout');
    route::post('logins','loginController@login')->name('addlogin');
    route::get('register','loginController@register')->name('register');

    //router accessori
   route::prefix('phu-kien')->group(function(){
    route::get('danh-sach','accessoriesController@index');
   });
   route::prefix('dashboard')->group(function(){
    route::get('danh-sach','dashboardController@index')->name('dashboard');
   });
   route::prefix('attribute')->group(function(){
    route::get('danh-sach','attributeController@index')->name('astributeindex');
    Route::get('add', 'attributeController@create')->name('astributeadd');
    Route::post('add', 'attributeController@store')->name('astributestore');
   });
  
   Route::resource('category', 'categoryController');
   Route::resource('producttype', 'producttypeController');
});
