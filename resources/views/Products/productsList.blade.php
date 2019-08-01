<h1>商品一覧</h1>
<table>
    <tr>
        <th>商品タイトル</th>
        <th>商品説明</th>
        <th>価格</th>
    </tr>
    @foreach ($productService->getProducts() as $product)
    <tr>
        <td><a href="{{ url()->current() }}/{{ $product->id }}">{{ $product->title }}</a></td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}円</td>
        <td><img src="{{ $product->imageUrl }}" width="200" /></td>
    </tr>
    @endforeach
</table>
