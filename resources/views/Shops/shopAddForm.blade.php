<form name="shopsForm" action="{{ url('api/shops') }}" method="POST" enctype="multipart/form-data">
    @csrf
    店舗名称: <input type="text" name="name" value={{ old('name') }}><br />
    店舗画像: <input type='file' name='image' value="{{ old('image') }}"/><br />
    <button type='submit' name='action' value='send'>追加</button>
</form>