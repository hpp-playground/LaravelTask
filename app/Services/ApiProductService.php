<?php

namespace App\Services;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Services\StorageService;
use App\Services\UtilityService;

class ApiProductService
{
    //商品を追加するときにnull値は認めない
    public $addRule = [
        'title' => 'required|max:100',
        'description' => 'required|max:500',
        'price' => 'required|integer|min:0',
        'image' => 'required|image|max:10240',
    ];

    //更新時はnull部分は変化なし,値が入っていればその値に更新する
    public $updateRule = [
        'title' => 'nullable|max:100',
        'description' => 'nullable|max:500',
        'price' => 'nullable|integer|min:0',
        'image' => 'nullable|image|max:10240',
    ];

    public function getProducts()
    {
        return Product::query()->select(['id', 'title', 'description', 'price','imageUrl'])->get();
    }

    public function addProduct($product_params)
    {
        $imageUrl = StorageService::saveImageReturnUrl($product_params['image']);
        $product_params = UtilityService::removeImageAppendImageUrl($product_params, $imageUrl);
        //createに連想配列を投げるとそのKeyのカラムに値を保存してくれる
        //元の$product_paramsは[title,description,price,image]なのでそれをカラム定義に合わせて削除・結合
        Product::create($product_params);
    }

    public function getProduct($product_id)
    {
      return Product::find($product_id,['id','title','description','price','imageUrl']);
    }

    public function updateProduct($product_id, $product_params)
    {
        //$request内の存在する更新値がtitleしかない場合,$request->all()=['title'=>$title]という状態になっている
        $product = Product::find($product_id);
        $product_params = UtilityService::deleteKeyHavingNoValue($product_params);
        //画像保存はKey:imageが存在している時だけ
        if (array_key_exists('image', $product_params)) {
            //imageを更新するなら元からある画像を削除して新しい画像を保存する
            StorageService::deleteImage($product->imageUrl);
            $imageUrl = StorageService::saveImageReturnUrl($product_params['image']);
            $product_params = UtilityService::removeImageAppendImageUrl($product_params);
        }
        $product->update($product_params);
    }

    public function deleteProduct($product_id)
    {
        $product = Product::find($product_id);
        $imageUrl = $product->imageUrl;
        $product->delete();
        StorageService::deleteImage($imageUrl);
    }
}

