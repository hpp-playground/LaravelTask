<?php

use Illuminate\Http\Request;
use \Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//products endpoint
Route::get('products', 'ApiProductController@getProducts');
Route::post('products', 'ApiProductController@addProduct');
Route::get('products/{product_id}', 'ApiProductController@getProduct');
Route::put('products/{product_id}', 'ApiProductController@updateProduct');
Route::delete('products/{product_id}', 'ApiProductController@deleteProduct');

//shops endpoint
Route::get('shops', 'ApiShopController@getShops');
Route::post('shops', 'ApiShopController@addShop');
Route::get('shops/{shop_id}', 'ApiShopController@getShop');
Route::put('shops/{shop_id}', 'ApiShopController@updateShop');
Route::delete('shops/{shop_id}', 'ApiShopController@deleteShop');