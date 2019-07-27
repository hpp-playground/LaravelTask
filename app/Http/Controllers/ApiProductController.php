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
        $request->validate($productService->addRule);
        $productService->addProduct($request->all()); //$request->all() = [title,description,price]
        return redirect(url()->previous());
    }


    public function getProduct($product_id, ApiProductService $productService)
    {
        if (!$this->isExist($product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        return response()->json($productService->getProduct($product_id));
    }


    public function updateProduct(Request $request, $product_id, ApiProductService $productService)
    {
        if (!$this->isExist($product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $request->validate($productService->updateRule);
        $productService->updateProduct($product_id, $request->all());
        return redirect(url()->previous());
    }


    public function deleteProduct(Request $request, $product_id, ApiProductService $productService)
    {
        if (!$this->isExist($product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $productService->deleteProduct($product_id);
        return redirect(url()->previous());
    }


    public function isExist($product_id)
    {
        return \DB::table('products')->where('id', $product_id)->exists();
    }

}
