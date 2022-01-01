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

// TOPページ表示
Route::get('/', 'TopController');
// プライバシー画面表示
Route::get('/privacy', function() {
    return view('privacy');
});
// 利用規約画面表示
Route::get('/terms', function() {
    return view('terms');
});

// 案件一覧・登録・編集・削除・検索
Route::group(['middleware' => 'auth'], function () {
    Route::get('/products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products', 'ProductsController@store')->name('products.store');
    Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
    Route::put('/products/{id}', 'ProductsController@update')->name('products.update');
    Route::delete('/products/{id}', 'ProductsController@destroy')->name('products.destroy');
}); 
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
Route::get('search', 'ProductsController@search')->name('products.search');

// マイページ表示、プロフィール編集・退会
Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage', 'UsersController@index')->name('mypage');
    Route::get('/user/{id}', 'UsersController@show')->name('users.show');
    Route::get('/mypage/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/mypage/{id}', 'UsersController@update')->name('users.update');
    Route::get('/mypage/register', 'UsersController@register_index')->name('users.register');
    Route::get('/mypage/apply', 'UsersController@apply_index')->name('users.apply');
    Route::get('/mypage/like', 'UsersController@like_index')->name('users.like');
    Route::get('/withdrawal', 'UsersController@delete_confirm')->name('users.delete_confirm');
    Route::delete('/withdrawal/{id}', 'UsersController@destroy')->name('users.destroy');
    Route::post('/email', 'ChangeEmailController@sendChangeEmailLink')->name('users.email');
    Route::get("reset/{token}", "ChangeEmailController@reset");
}); 

// パブリックメッセージ一覧表示・登録
Route::group(['middleware' => 'auth'], function () {
    Route::get('/public_messages', 'PublicMessagesController@index')->name('public.index');
    Route::post('/public_messages/{id}', 'PublicMessagesController@store')->name('public.store');
}); 

// 応募時にDMボードを新規作成
Route::group(['middleware' => 'auth'], function () {
    Route::post('/bords/{u_id}/{p_id}', 'BordsController@store')->name('bord.store');
}); 

// DM一覧表示・詳細・新規登録
Route::group(['middleware' => 'auth'], function () {
    Route::get('/direct_messages', 'DirectMessagesController@index')->name('direct.index');
    Route::get('/direct_messages/{id}', 'DirectMessagesController@show')->name('direct.show');
    Route::post('/direct_messages/{bord_id}/{partner_id}', 'DirectMessagesController@store')->name('direct.store');
}); 

// お気に入り機能
    Route::get('/products/{id}/likes', 'LikesController@store');
    Route::get('/products/{id}/unlikes', 'LikesController@destroy');
    Route::get('/products/{id}/haslikes', 'LikesController@haslike');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
