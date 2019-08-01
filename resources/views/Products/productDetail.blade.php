@php
    $product = $productService->getProduct($product_id)
@endphp

@if (empty($product))
    <h2>Not Found</h2>
@else
<ul>
    <img src="{{ $product->imageUrl }}" width="400" />
    <li>{{ $product->title }}</li>
    <li>{{ $product->description }}</li>
    <li>{{ $product->price }}円</li>
</ul>

@include('Products.productUpdateForm')

<form name="productsForm" action="{{ url('api/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf
    <button type='submit' name='action' value='send'>削除</button>
</form>
@endif

<a href='/products'>戻る</a>

