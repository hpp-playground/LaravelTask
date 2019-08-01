<?php

namespace App\Services;

use App\Product;
use App\Shop;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UtilityService
{
    public static function deleteKeyHavingNoValue($params)
    {
        foreach (array_keys($params) as $key) {
            if (empty($params[$key])) {
                unset($params[$key]);
            }
        }
        return $params;
    }

    public static function removeImageAppendImageUrl($params, $imageUrl)
    {
        unset($params['image']);
        $params += ['imageUrl' => $imageUrl];
        return $params;
    }

    public static function isExistInTable($table, $id)
    {
        return \DB::table($table)->where('id', $id)->exists();
    }
}
