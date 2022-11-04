<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Hello</h1>
    <p>{{$msg}}</p>
    <table>
        <tr>
            <th></th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <ul>
        @foreach($data as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
    <a href="{{ route('download') }}">ダウンロード</a>
    <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="">
        <input type="submit" value="送信">
    </form>
</body>
</html>