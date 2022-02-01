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
<body class="admin show-side-bar">
    <div class="sidebar shadow-sm bg-dark py-2" id="sideBar">
        <span class="close d-md-none" onclick="window.toggleSideBar()"><i class="fa fa-times-circle"></i></span>
        <nav>
            <ul>
                {{-- <li class="d-block"> --}}
                    <img src="{{ asset('images/logo-light.svg') }}" alt="" class="logo w-75 mx-auto mb-5 img img-responsive">
                    <img src="{{ asset('images/big-icon-light.svg') }}" alt="" class="icon w-75 img img-responsive mx-auto mb-5">
                {{-- </li> --}}
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="fa fa-home text-warning"></i><span>الصفحة الرئيسية</span>
                    </a>
                </li>
                <li class="title">
                    <span>عناصر أساسية</span>
                </li>
                <li>
                    <a href="{{ route('admin.students.all') }}">
                        <i class="fas fa-user-graduate text-warning"></i><span>المتدربين</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.chefs.all') }}">
                        <i class="fas fa-chalkboard-teacher text-warning"></i><span>مدربين</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.centers.all') }}">
                        <i class="fas fa-building text-warning"></i><span>مراكز</span>
                    </a>
                </li>
                <li class="title">
                    <span>مصادر</span>
                </li>
                <li>
                    <a href="{{ route('admin.videos.all') }}">
                        <i class="fa fa-play-circle text-warning"></i><span>فيديوهات</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.podcasts.all') }}">
                        <i class="fa fa-microphone-alt text-warning"></i><span>بودكاستات</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.materials.all') }}">
                        <i class="fa fa-folder-open text-warning"></i><span>ملفات تربوية</span>
                    </a>
                </li>
                <li class="title">
                    <span>فرص</span>
                </li>
                <li>
                    <a href="{{ route('admin.jobs.all') }}">
                        <i class="fas fa-user-tie text-warning"></i><span>عمل</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.internships.all') }}">
                        <i class="fas fa-handshake text-warning"></i><span>سطاج</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.monitorings.all') }}">
                        <i class="fa fa-sync text-warning"></i><span>دورات</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.services.all') }}">
                        <i class="fas fa-people-carry text-warning"></i><span>خدمات</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="content">
        <header class="shadow-sm bg-dark py-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-auto"><button onclick="window.toggleSideBar()" class="btn text-warning btn-lg"><i class="fas fa-bars"></i></button></div>
                    <div class="col"></div>
                    <div class="col-auto">
                        <a href="{{ route("admin.profile") }}"><img src="{{asset('images/admin/avatar.png')}}" alt="student avatar" height="40" class="img img-responsive img-circle rounded-circle border border-warning mx-3 m-1 border"></a>
                        <form class="d-inline-block" action="{{ route("admin.logout") }}" method="get">
                            @csrf
                            <button class="btn badge p-1 py-2 btn-danger btn-sm rounded">تسجيل الخروج</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="p-3">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>