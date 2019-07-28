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
    return view('root');
});

Route::get('/products', function () {
    return view('products');
});
Route::get('/shops', function () {
    return view('shops');
});

Route::get('/products/{product_id}', function ($product_id) {
    return view('product', compact('product_id'));
});
Route::get('/shops/{shop_id}', function ($shop_id) {
    return view('shop', compact('shop_id'));
});
