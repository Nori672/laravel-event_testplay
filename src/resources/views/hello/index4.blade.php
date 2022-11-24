<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>index4(データベース関連)</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <form action="{{ route('event')}}" method="get">
        <input type="text" name="id" id="id">
        <input type="submit" value="送信">
    </form>
    <p>{{$msg}}</p>
    <ol>
        @foreach($data as $item)
        <li>{{ $item->name }}[{{ $item->email }},{{ $item->id }}] age: {{ $item->age }}</li>
        @endforeach
    </ol>
</body>
</html>