<?php

namespace App\Services;

use App\Product;
use App\Shop;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StorageService
{
    public static function saveImageReturnUrl($image)
    {
        $contents = file_get_contents($image->getRealPath());
        $disk = Storage::disk('s3');
        //S3に保存する際,$imageの内容に基づいてhash値を生成
        //衝突防止のためファイル名の先頭にyyyy-mm-dd hh:mm:ss形式の時間データをつけておく
        $imageName = Carbon::now().$image->hashName();
        $disk->put($imageName, $contents,'public');
        $imageUrl = $disk->url($imageName);
        //DBにURLを保存するために,S3ストレージ上のURLを返す
        return $imageUrl;
    }

    public static function deleteImage($imageUrl)
    {
        $disk = Storage::disk('s3');
        $imageNameEncoded = pathinfo($imageUrl)['basename'];
        //pathinfoで得られるファイル名はURLエンコードされているのでデコード
        $imageName = urldecode($imageNameEncoded);
        $disk->delete($imageName);
    }

}
