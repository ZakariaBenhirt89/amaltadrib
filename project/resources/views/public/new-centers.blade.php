<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    <pre>
        {{ json_encode($errors->all()) }}
    </pre>
    @endif
    <form action="{{ route('admin-centers') }}" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <input name="name" placeholder="name" type="text">
        <input name="adress" placeholder="adress" type="text">
        <input name="phone" placeholder="phone" type="text">
        <input type="submit" value="Add">
    </form>
</body>
</html>
