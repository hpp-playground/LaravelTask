<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Services\ApiProductService;
use App\Services\UtilityService;

class ApiProductController extends Controller
{
    public function getProducts(ApiProductService $productService)
    {
        return response()->json($productService->getProducts());
    }


    public function addProduct(Request $request, ApiProductService $productService)
    {
        $request->validate($productService->addRule);
        $productService->addProduct($request->all()); //$request->all() = [title,description,price,image]
        //redirectを返さないとクライアントの画面が真っ白になる(POSTでsubmitするとviewを返さないといけない)
        return redirect(url()->previous());
    }


    public function getProduct($product_id, ApiProductService $productService)
    {
        if (!UtilityService::isExistInTable('products',$product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        return response()->json($productService->getProduct($product_id));
    }


    public function updateProduct(Request $request, $product_id, ApiProductService $productService)
    {
        if (!UtilityService::isExistInTable('products',$product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $request->validate($productService->updateRule);
        $productService->updateProduct($product_id, $request->all());
        return redirect(url()->previous());
    }


    public function deleteProduct(Request $request, $product_id, ApiProductService $productService)
    {
        if (!UtilityService::isExistInTable('products',$product_id)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }
        $productService->deleteProduct($product_id);
        return redirect('/products');
    }

}
