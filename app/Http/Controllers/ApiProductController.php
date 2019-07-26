<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiProductService;

class ApiProductController extends Controller
{
    public function getProducts(ApiProductService $productService)
    {
        return response()->json($productService->getProducts());
    }

    public function addProduct(Request $request, ApiProductService $productService)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'price' => 'required|integer|min:0'
        ]);
        $title          = $request->json('title');
        $description    = $request->json('description');
        $price          = $request->json('price');
        $productService->addProduct($title, $description, $price);
    }

}
