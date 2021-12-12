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
    <form action="{{ route('admin-videos') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <input type="text" name="title" placeholder="title" />
        <input type="hidden" name="durartion" value="167.89" />
        <input type="file" name="file" placeholder="file" />
        <input type="hidden" name="thumbnail" value="lorem" />
        <select type="date" name="chefs_id" placeholder="chefs_id" >
            @foreach($chefs as $chef)
            <option value="{{ $chef->id }}">{{ $chef->fname.' '.$chef->lname }}</option>
            @endforeach
        </select>
        <input type="submit" value="Add">
    </form>
</body>
</html>
