<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @inject('shopService', 'App\Services\ApiShopService')
    <h1>店舗詳細</h1>
    @include('Shops.shopDetail', ['shop_id' => $shop_id])
</body>
</html>