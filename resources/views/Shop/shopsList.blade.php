<h1>店舗一覧</h1>
<table>
    <tr>
        <th>店舗名称</th>
    </tr>
    @foreach ($shops as $shop)
    <tr>
        <td>{{ $shop->name }}</td>
    </tr>
    @endforeach
</table>