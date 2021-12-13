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
    <form action="{{ route('admin.students.action_edit',[$student->id]) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
        @method('PUT')
        @csrf
        {{-- <input type="file" name="avatar" placeholder="avatar" value="{{ $student->avatar }}"/>
        <input type="text" name="fname" placeholder="fname" value="{{ $student->fname }}"/>
        <input type="text" name="lname" placeholder="lname" value="{{ $student->lname }}"/>
        <input type="text" name="phone" placeholder="phone" value="{{ $student->phone }}"/>
        <input type="date" name="birthday" placeholder="birthday" value="{{ $student->birthday }}"/>
        <input type="text" name="level" placeholder="level" value="{{ $student->level }}"/>
        <input type="text" name="gardian_number" placeholder="gardian_number" value="{{ $student->gardian_number }}"/>
        <input type="text" name="family_situation" placeholder="family_situation" value="{{ $student->family_situation }}"/>
        <input type="number" name="number_of_children" placeholder="number_of_children" value="{{ $student->number_of_children }}"/>
        <input type="text" name="cin_number" placeholder="cin_number" value="{{ $student->cin_number }}"/>
        <input type="text" name="adress" placeholder="adress" value="{{ $student->adress }}"/> --}}
        {{-- <input type="text" name="email" placeholder="email" value="{{ $student->email }}"/> --}}
        <input type="password" name="password" placeholder="password" />
        {{-- <input type="text" name="more_details" placeholder="more_details" value="{{ $student->more_details }}"/> --}}
        <input type="submit" value="Add">
    </form>
</body>
</html>
