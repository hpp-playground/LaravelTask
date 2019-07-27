<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Services\ApiShopService;

class ApiShopController extends Controller
{
    public function getShops(ApiShopService $shopService)
    {
        return response()->json($shopService->getShops());
    }


    public function addShop(Request $request, ApiShopService $shopService)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $name = $request->json('name');
        $shopService->addShop($name);
    }

    
    public function getShop($shop_id)
    {
        if (!\DB::table('shops')->where('id', $shop_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $shop = \App\Shop::find($shop_id,['id','name']);
        return response()->json($shop);
    }

    public function updateShop(Request $request, $shop_id)
    {
        if (!\DB::table('shops')->where('id', $shop_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $request->validate([
            'name' => 'filled|max:100',
        ]);
        $shop = \App\Shop::find($shop_id);
        $shop->update($request->all());
        return response()->json($shop);
    }

    public function deleteShop(Request $request, $shop_id)
    {
        if (!\DB::table('shops')->where('id', $shop_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $shop = \App\Shop::find($shop_id);
        $shop->delete();
        return response()->json($shop);
    }
}
