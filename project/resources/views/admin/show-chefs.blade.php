<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ json_encode($chefs) }}
    @foreach ($chefs as $chef)
        <div>
            <h1>{{ $chef->fname }}</h1>
            <h1>{{ $chef->lname }}</h1>
            <h1>{{ $chef->birthday }}</h1>
            <h1>{{ $chef->gender }}</h1>
            <p>{{ $chef->adress }}</p>
            <form method="POST" action="{{ route('admin-chefs-action_delete',[$chef->id]) }}">
                @csrf
                @method("DELETE")
                <input type="submit" value="DELETE">
            </form>
        </div>
    @endforeach
</body>
</html>
