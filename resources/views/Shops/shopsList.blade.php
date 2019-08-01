<h1>店舗一覧</h1>
<table>
    <tr>
        <th>店舗名称</th>
    </tr>
    @foreach ($shopService->getShops() as $shop)
    <tr>
        <td><a href="{{ url()->current() }}/{{ $shop->id }}">{{ $shop->name }}</a></td>
        <td><img src="{{ $shop->imageUrl }}" width="200" /></td>
    </tr>
    @endforeach
</table>