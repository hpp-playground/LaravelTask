<form name="shopsForm" action="{{ url('api/shops/'.$shop->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    店舗名称: <input type="text" name="name" value={{ old('name') }}><br />
    店舗画像: <input type='file' name='image' value="{{ old('image') }}"/><br />
    <button type='submit' name='action' value='send'>修正</button>
</form>