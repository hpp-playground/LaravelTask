<?php

namespace App\Services;

use App\Product;

class ApiProductService
{
    public $addRule = [
        'title' => 'required|max:100',
        'description' => 'required|max:500',
        'price' => 'required|integer|min:0'
    ];

    public $updateRule = [
        'title' => 'filled|max:100',
        'description' => 'filled|max:500',
        'price' => 'filled|integer|min:0'
    ];

    public function getProducts()
    {
        return Product::query()->select(['id', 'title', 'description', 'price'])->get();
    }

    public function addProduct($product_params)
    {
        Product::create($product_params);
    }

    public function getProduct($product_id)
    {
      return Product::find($product_id,['id','title','description','price']);
    }

    public function updateProduct($product_id, $product_params)
    {
        $product = Product::find($product_id);
        $product->update($product_params);
    }

    public function deleteProduct($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
    }

}

