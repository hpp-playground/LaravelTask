<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @inject('productService', 'App\Services\ApiProductService')
    <h1>商品詳細</h1>
    @include('Products.productDetail', ['product_id' => $product_id])
</body>
</html>