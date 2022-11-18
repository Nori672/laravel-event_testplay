<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>index3(データベース関連)</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{$msg}}</p>
    <ol>
        @foreach($data as $item)
        <li>{{ $item->name }}[{{ $item->email }},{{ $item->id }}] age: {{ $item->age }}</li>
        <p>アクセサ↓</p>
        <li>{{ $item->name_id }}</li>
        @endforeach
    </ol>
    <div>
        <input type="number" name="number" id="number" value="1">
        <button onclick="doAction()">click</button>
    </div>
    <ul>
        <li id="name"></li>
        <li id="mail"></li>
        <li id="age"></li>
    </ul>
</body>
<script>
    function doAction()
    {
        var id = document.querySelector('#number').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','/hello3_4/json/'+id ,true);
        xhr.responseType = 'json';
        xhr.onload = function(e){
            if (this.status == 200) {
                var result = this.response;
                document.querySelector('#name').textContent = result.name;
                document.querySelector('#mail').textContent = result.email;
                document.querySelector('#age').textContent = result.age;
            }
        };
        xhr.send();
    }
</script>
</html>