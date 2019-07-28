@php
    $product = $productService->getProduct($product_id)
@endphp

<ul>
    <li>{{ $product->title }}</li>
    <li>{{ $product->description }}</li>
    <li>{{ $product->price }}円</li>
</ul>