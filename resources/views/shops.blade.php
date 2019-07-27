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
    @include('Shop.shopsList')
    @include('Shop.shopAddForm')
    <a href="{{ url('/') }}">TOPへ</a>
    <a href="{{ url('products') }}">商品一覧</a>
</body>
</html>