<?php

namespace App\Services;

use App\Shop;

class ApiShopService
{
    public function getShops()
    {
        return Shop::query()->select(['id', 'name'])->get();
    }

    public function addShop($name)
    {
        $shop = new Shop();
        $shop->name = $name;
        $shop->save();
    }
}