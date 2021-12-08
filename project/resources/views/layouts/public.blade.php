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
<body class="public">
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('public.home')}}">
                <img src="{{asset('images/logo.svg')}}" height="50" alt="logo">
            </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav px-0 mx-auto mb-2 mb-lg-0">
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.informations-bank')}}">بنك المعلومات</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.about')}}">من نحن</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.contact')}}">تواصل معنا</a>
                  </li>
                </ul>
                  <a class="btn btn-dark" href="{{ route("public.login") }}">تسجيل الدخول</a>
              </div>
            </div>
          </nav>
    </div>
    <main>
        @yield('content')
    </main>
    <footer></footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>