<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @inject('productService', 'App\Services\ApiProductService')
    @inject('shopService', 'App\Services\ApiShopService')
    @component('Product.productsList', ['products' => $productService->getProducts()])@endcomponent
    @component('Shop.shopsList', ['shops' => $shopService->getShops()])@endcomponent
</body>
</html>