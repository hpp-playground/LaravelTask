<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiShopController extends Controller
{
    public function getShops()
    {
        return response()->json(\App\Shop::query()->select(['id', 'name'])->get());
    }

    public function postShops(Request $request)
    {
        if (!$request->json('name')) {
            return response()->json([], \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $shop = new \App\Shop();
        $shop->name = $request->json('name');
        $shop->save();
    }
}
