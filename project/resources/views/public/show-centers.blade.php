<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ json_encode($centers) }}
    @foreach ($centers as $center)
        <div>
            <h1>{{ $center->name }}</h1>
            <p>{{ $center->adress }}</p>
            <p>{{ $center->phone }}</p>
            <form action="{{ route('admin-centers-action_delete',[$center->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete">
            </form>
        </div>
    @endforeach
</body>
</html>
