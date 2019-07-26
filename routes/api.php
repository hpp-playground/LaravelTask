<?php

use Illuminate\Http\Request;

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


Route::get('products/{product_id}', function ($product_id) {
    $product = \App\Product::find($product_id,['title','description','price']);
    return response()->json($product);
});

Route::put('products/{product_id}', function (Request $request, $product_id) {
    $product = \App\Product::find($product_id);
    $product->update($request->all());
    return response()->json($product);
});

Route::delete('products/{product_id}', function (Request $request, $product_id) {
    $product = \App\Product::find($product_id);
    $product->delete();
    return response()->json($product);
});


//shops endpoint
Route::get('shops', 'ApiShopController@getShops');
Route::post('shops', 'ApiShopController@addShop');

Route::get('shops/{shop_id}', function () {});
Route::put('shops/{shop_id}', function () {});
Route::delete('shops/{shop_id}', function () {});