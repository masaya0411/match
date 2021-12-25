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
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products', 'ProductsController@store')->name('products.store');
    Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
    Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
    Route::put('/products/{id}', 'ProductsController@update')->name('products.update');
    Route::delete('/products/{id}', 'ProductsController@destroy')->name('products.destroy');
}); 

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage', 'UsersController@show')->name('mypage');
    Route::get('/mypage/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/mypage/{id}', 'UsersController@update')->name('users.update');
}); 

Route::group(['middleware' => 'auth'], function () {
    Route::post('/public_messages/{id}', 'PublicMessagesController@store')->name('public.store');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
