<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{--  $students : Contains list of all student in Database --}}
    <pre>
        {{ json_encode($students) }}
    </pre>
    @foreach ($students as $student)
    <div>
        <h1>{{ $student->fname }}</h1>
        <h1>{{ $student->lname }}</h1>
        <p>{{ $student->email }}</p>
        <p>{{ $student->phone }}</p>
        <p>{{ $student->address }}</p>
        <form action="{{ route('admin.students.action_delete',[$student->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="DELETE">
        </form>
    </div>
    @endforeach
</body>
</html>
