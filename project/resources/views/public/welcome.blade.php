<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('adminlogin') }}" method="POST">
        <h1>
            admin login
        </h1>
    @csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="submit">
    </form>
    <form action="{{ route('studentlogin') }}" method="POST">
        <h1>
            student login
        </h1>
    @csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="submit">
    </form>
</body>
</html>
