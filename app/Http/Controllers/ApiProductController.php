<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
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

    public function getProduct($product_id)
    {
        if (!\DB::table('products')->where('id', $product_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $product = \App\Product::find($product_id,['title','description','price']);
        return response()->json($product);
    }

    public function updateProduct(Request $request, $product_id)
    {
        if (!\DB::table('products')->where('id', $product_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $request->validate([
            'title' => 'filled|max:100',
            'description' => 'filled|max:500',
            'price' => 'filled|integer|min:0'
        ]);
        $product = \App\Product::find($product_id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function deleteProduct(Request $request, $product_id)
    {
        if (!\DB::table('products')->where('id', $product_id)->exists()) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $product = \App\Product::find($product_id);
        $product->delete();
        return response()->json($product);
    }

}
