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
    <form action="{{ route('admin-chefs_action-edit',[$chef->id]) }}" enctype="multipart/form-data" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        @method('PUT')
        <input name="avatar" placeholder="avatar" type="file">
        <input name="fname" placeholder="fname" type="text" value="{{ $chef->fname }}">
        <input name="lname" placeholder="lname" type="text" value="{{ $chef->lname }}">
        <input name="birthday" placeholder="birthday" type="date" value="{{ $chef->birthday }}">
        <label >male</label>
        <input name="gender" value="Male" type="radio" checked>
        <label >female</label>
        <input name="gender" value="Female" type="radio">
        <input name="adress" placeholder="adress" type="text" value="{{ $chef->adress }}">
        <select name="centers_id" >
            @foreach ($centers as $center)
                <option value="{{ $center->id }}"> {{ $center->id.' - '.$center->name }} </option>
            @endforeach
        </select>
        <input type="submit" value="Edit">
    </form>
</body>
</html>
