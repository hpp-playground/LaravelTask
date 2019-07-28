@php
    $shop = $shopService->getShop($shop_id)
@endphp

<ul>
    <li>{{ $shop->name }}</li>
</ul>