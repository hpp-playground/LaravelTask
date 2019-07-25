<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
