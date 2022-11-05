<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index2</title>
</head>
<body>
    <h1>Hello</h1>
    <p>{{$msg}}</p>
    <ul>
        @foreach($data as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
</body>
</html>