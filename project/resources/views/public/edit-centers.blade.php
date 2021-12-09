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
    <form action="{{ route('admin-centers-action_edit',[$center->id]) }}" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        @method('PUT')
        <input name="name" placeholder="name" type="text" value="{{ $center->name }}">
        <input name="adress" placeholder="adress" type="text" value="{{ $center->adress }}">
        <input name="phone" placeholder="phone" type="text" value="{{ $center->phone }}">
        <input type="submit" value="Edit">
    </form>
</body>
</html>
