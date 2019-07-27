<?php

namespace App\Services;

use App\Shop;

class ApiShopService
{
    public $addRule = [
        'name' => 'required|max:100',
    ];

    public $updateRule = [
        'name' => 'filled|max:100',
    ];


    public function getShops()
    {
        return Shop::query()->select(['id', 'name'])->get();
    }

    public function addShop($shop_params)
    {
        Shop::create($shop_params);
    }

    public function getShop($shop_id)
    {
        return Shop::find($shop_id,['id','name']);
    }

    public function updateShop($shop_id, $shop_params)
    {
        $shop = Shop::find($shop_id);
        $shop->update($shop_params);
    }

    public function deleteShop($shop_id)
    {
        $shop = Shop::find($shop_id);
        $shop->delete();
    }
}