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
    <form action="{{ route('admin-students') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <input type="file" name="avatar" placeholder="avatar" />
        <input type="text" name="fname" placeholder="fname" />
        <input type="text" name="lname" placeholder="lname" />
        <input type="text" name="phone" placeholder="phone" />
        <input type="date" name="birthday" placeholder="birthday" />
        <input type="text" name="level" placeholder="level" />
        <input type="text" name="gardian_number" placeholder="gardian_number" />
        <input type="text" name="family_situation" placeholder="family_situation" />
        <input type="number" name="number_of_children" placeholder="number_of_children" />
        <input type="text" name="cin_number" placeholder="cin_number" />
        <input type="text" name="adress" placeholder="adress" />
        <input type="text" name="email" placeholder="email" />
        <input type="password" name="password" placeholder="password" />
        <input type="text" name="more_details" placeholder="more_details" />
        <input type="submit" value="Add">
    </form>
</body>
</html>
