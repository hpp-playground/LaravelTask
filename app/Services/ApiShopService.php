<?php

namespace App\Services;

use App\Shop;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApiShopService
{
    public $addRule = [
        'name' => 'required|max:100',
        'image' => 'required|image|max:10240'
    ];

    public $updateRule = [
        'name' => 'nullable|max:100',
        'image' => 'nullable|image|max:10240'
    ];


    public function getShops()
    {
        return Shop::query()->select(['id', 'name','imageUrl'])->get();
    }

    public function addShop($shop_params)
    {
        $imageUrl = $this->saveImageReturnUrl($shop_params['image']);
        unset($shop_params['image']);
        $shop_params += ['imageUrl' => $imageUrl];
        Shop::create($shop_params);
    }

    public function getShop($shop_id)
    {
        return Shop::find($shop_id,['id','name','imageUrl']);
    }

    public function updateShop($shop_id, $shop_params)
    {
        $shop = Shop::find($shop_id);
        $shop_params = $this->deleteKeyHasNothing($shop_params);
        if (array_key_exists('image', $shop_params)) {
            $imageUrl = $this->saveImageReturnUrl($shop_params['image']);
            unset($shop_params['image']);
            $shop_params += ['imageUrl' => $imageUrl];
        }
        $shop->update($shop_params);
    }

    public function deleteShop($shop_id)
    {
        $shop = Shop::find($shop_id);
        $imageUrl = $shop->imageUrl;
        $shop->delete();
        $this->deleteImage($imageUrl);
    }

    public function saveImageReturnUrl($image)
    {
        $contents = file_get_contents($image->getRealPath());
        $disk = Storage::disk('s3');
        $imageName = Carbon::now().$image->hashName();
        $disk->put($imageName, $contents,'public');
        $imageUrl = $disk->url($imageName);
        return $imageUrl;
    }


    public function deleteImage($imageUrl)
    {
        $disk = Storage::disk('s3');
        $imageNameEncoded = pathinfo($imageUrl)['basename'];
        $imageName = urldecode($imageNameEncoded);
        $disk->delete($imageName);
    }

    public function deleteKeyHasNothing($shop_params)
    {
        foreach (array_keys($shop_params) as $key) {
            if (empty($shop_params[$key])) {
                unset($shop_params[$key]);
            }
        }
        return $shop_params;
    }
}