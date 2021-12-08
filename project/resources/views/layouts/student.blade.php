<!DOCTYPE html/>
<html lang="{{Config::get('app.locale')}}" @if(Config::get('app.locale') == 'ar') dir="rtl" @endif >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @yield('content')
</body>
</html>