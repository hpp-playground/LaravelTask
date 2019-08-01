<?php

namespace App\Services;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApiProductService
{
    public $addRule = [
        'title' => 'required|max:100',
        'description' => 'required|max:500',
        'price' => 'required|integer|min:0',
        'image' => 'required|image|max:10240',
    ];

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
        $imageUrl = $this->saveImageReturnUrl($product_params['image']);
        unset($product_params['image']);
        $product_params += ['imageUrl' => $imageUrl];
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
        $product_params = $this->deleteKeyHasNothing($product_params);
        //画像保存はKey:imageが存在している時だけにしたい
        if (array_key_exists('image', $product_params)) {
            $imageUrl = $this->saveImageReturnUrl($product_params['image']);
            unset($product_params['image']);
            $product_params += ['imageUrl' => $imageUrl];
        }
        $product->update($product_params);
    }

    public function deleteProduct($product_id)
    {
        $product = Product::find($product_id);
        $imageUrl = $product->imageUrl;
        $product->delete();
        $this->deleteImage($imageUrl);
    }

    public function saveImageReturnUrl($image)
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

    public function deleteImage($imageUrl)
    {
        $disk = Storage::disk('s3');
        $imageNameEncoded = pathinfo($imageUrl)['basename'];
        //pathinfoで得られるファイル名はURLエンコードされているのでデコード
        $imageName = urldecode($imageNameEncoded);
        $disk->delete($imageName);
    }

    public function deleteKeyHasNothing($product_params)
    {
        foreach (array_keys($product_params) as $key) {
            if (empty($product_params[$key])) {
                unset($product_params[$key]);
            }
        }
        return $product_params;
    }

}

