<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ json_encode($videos) }}
    <br>
    @foreach ($videos as $video)
        <h1>{{ $video->title }}</h1>
        <p>{{ $video->durartion }}</p>
        <form action="{{ route('admin.videos.action_delete',[$video->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form>
        <hr>
    @endforeach
</body>
</html>
