<form name="productsForm" action="{{ url('api/products') }}" method="POST">
    {{ csrf_field() }}
    商品タイトル: <input type="text" name="title" value={{ old('title') }}><br />
    商品説明: <input type="text" name="description" value={{ old('description') }}><br />
    価格: <input type="text" name="price" value={{ old('price') }}>
    <button type='submit' name='action' value='send'>追加</button>
</form>