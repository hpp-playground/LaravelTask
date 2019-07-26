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


Route::get('shops/{shop_id}', function ($shop_id) {
    if (!DB::table('shops')->where('id', $shop_id)->exists()) {
        return response()->json([], Response::HTTP_NOT_FOUND);
    }
    $shop = \App\Shop::find($shop_id,['name']);
    return response()->json($shop);
});

Route::put('shops/{shop_id}', function (Request $request, $shop_id) {
    if (!DB::table('shops')->where('id', $shop_id)->exists()) {
        return response()->json([], Response::HTTP_NOT_FOUND);
    }
    $request->validate([
        'name' => 'filled|max:100',
    ]);
    $shop = \App\Shop::find($shop_id);
    $shop->update($request->all());
    return response()->json($shop);
});


Route::delete('shops/{shop_id}', function (Request $request, $shop_id) {
    if (!DB::table('shops')->where('id', $shop_id)->exists()) {
        return response()->json([], Response::HTTP_NOT_FOUND);
    }
    $shop = \App\Shop::find($shop_id);
    $shop->delete();
    return response()->json($shop);
});