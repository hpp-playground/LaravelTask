<form name="shopsForm" action="{{ url('api/shops') }}" method="POST">
    {{ csrf_field() }}
    店舗名称: <input type="text" name="name" value={{ old('name') }}><br />
    <button type='submit' name='action' value='send'>追加</button>
</form>