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
Route::get('products', function () {
    return response()->json(\App\Product::query()->select(['id', 'title', 'description', 'price'])->get());
});

Route::post('products', function (\Illuminate\Http\Request $request) {
    $product = new \App\Product();
    $product->title = $request->json('title');
    $product->description = $request->json('description');
    $product->price = $request->json('price');
    $product->save();
});


Route::get('products/{product_id}', function () {});
Route::put('products/{product_id}', function () {});
Route::delete('products/{product_id}', function () {});


//shops endpoint
Route::get('shops', function () {
    return response()->json(\App\Shop::query()->select(['id', 'name'])->get());
});

Route::post('shops', function (\Illuminate\Http\Request $request) {
    $shop = new \App\Shop();
    $shop->name = $request->json('name');
    $shop->save();
});

Route::get('shops/{shop_id}', function () {});
Route::put('shops/{shop_id}', function () {});
Route::delete('shops/{shop_id}', function () {});