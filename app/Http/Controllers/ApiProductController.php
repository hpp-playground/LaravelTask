<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function getProducts()
    {
        return response()->json(\App\Product::query()->select(['id', 'title', 'description', 'price'])->get());
    }


    public function postProducts(Request $request)
    {
        if (!($request->json('title') && $request->json('description') && $request->json('price'))) {
            return response()->json([], \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $product = new \App\Product();
        $product->title = $request->json('title');
        $product->description = $request->json('description');
        $product->price = $request->json('price');
        $product->save();
    }

}
