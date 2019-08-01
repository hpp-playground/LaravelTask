<form name="productsForm" action="{{ url('api/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    商品タイトル: <input type="text" name="title" value="{{ old('title') }}" /><br />
    商品説明: <input type="text" name="description" value="{{ old('description') }}" /><br />
    価格: <input type="text" name="price" value="{{ old('price') }}" /><br />
    商品画像: <input type='file' name='image' value="{{ old('image') }}"/><br />
    <button type='submit' name='action' value='send'>修正</button>
</form>
