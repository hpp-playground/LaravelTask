<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Services\ApiShopService;
use App\Services\UtilityService;

class ApiShopController extends Controller
{
    public function getShops(ApiShopService $shopService)
    {
        return response()->json($shopService->getShops());
    }


    public function addShop(Request $request, ApiShopService $shopService)
    {
        $request->validate($shopService->addRule);
        $shopService->addShop($request->all());
        return redirect(url()->previous());
    }


    public function getShop($shop_id, ApiShopService $shopService)
    {
        if (!UtilityService::isExistInTable('shops',$shop_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        return response()->json($shopService->getShop($shop_id));
    }


    public function updateShop(Request $request, $shop_id, ApiShopService $shopService)
    {
        if (!UtilityService::isExistInTable('shops',$shop_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $request->validate($shopService->updateRule);
        $shopService->updateShop($shop_id, $request->all());
        return redirect(url()->previous());
    }


    public function deleteShop(Request $request, $shop_id, ApiShopService $shopService)
    {
        if (!UtilityService::isExistInTable('shops',$shop_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $shopService->deleteShop($shop_id);
        return redirect('/shops');
    }
}
