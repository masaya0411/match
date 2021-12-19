<?php

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
    return view('top');
});
Route::get('/privacy', function() {
    return view('privacy');
});
Route::get('/terms', function() {
    return view('terms');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage', 'UsersController@show')->name('mypage');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products', 'ProductsController@store')->name('products.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
