<?php

namespace App\Services;

use App\Product;

class ApiProductService
{
    public function getProducts()
    {
        return Product::query()->select(['id', 'title', 'description', 'price'])->get();
    }

    public function addProduct($title, $description, $price)
    {
        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->save();
    }

}

