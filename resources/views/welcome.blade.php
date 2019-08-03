<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">

    <title>react test</title>
</head>

<body style="overscroll-behavior: none; box-sizing:border-box;">
    <div id="app">
        <div class="container">
            <div id="root"></div>
        </div>
    </div>

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
