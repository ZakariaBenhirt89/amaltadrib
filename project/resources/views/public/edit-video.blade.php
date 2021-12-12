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
    <form action="{{ route('admin-videos-action_edit',[$video->id]) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="title" value="{{ $video->title }}" />
        <label for="">Thumbnail</label>
        <input type="file" name="thumbnail" placeholder="file"/>
        <select type="date" name="chefs_id" placeholder="chefs_id" >
            @foreach($chefs as $chef)
            <option value="{{ $chef->id }}" {{ $chef->id == $video->chefs_id ? "selected" : "" }}> {{ $chef->fname.' '.$chef->lname }} </option>
            @endforeach
        </select>
        <input type="submit" value="Add">
    </form>
</body>
</html>
