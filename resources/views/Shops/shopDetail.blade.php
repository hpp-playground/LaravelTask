@php
    $shop = $shopService->getShop($shop_id)
@endphp

@if (empty($shop))
    <h2>Not Found</h2>
@else
<ul>
    <img src="{{ $shop->imageUrl }}" width="400" />
    <li>{{ $shop->name }}</li>
</ul>

@include('Shops.shopUpdateForm')

<form name="shopsForm" action="{{ url('api/shops/'.$shop->id) }}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf
    <button type='submit' name='action' value='send'>削除</button>
</form>
@endif

<a href='/shops'>戻る</a>