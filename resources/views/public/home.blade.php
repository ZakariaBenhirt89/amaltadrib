@extends('layouts.public')
@section('title','home page')

@section('content')
<main class="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 py-5 px-2 text-center text-md-end">
                <img src="{{ asset("images/logo.svg") }}" alt="" class="im img-responsive mb-3 d-md-none">
                <h1 class="h1"><strong>المنصة الرقمية أمل تدريب</strong></h1>
                <h2 class="h3 text-warning">مرحبا بكم في منصة أمل تدريب</h2>
                <p>هذه منصة خاصة بمتدربات جمعية امل لفنون الطبخ. تحتوي هذه المنصة على فيديوهات, بودكاستات, وملفات تهدف الى دعم المتدربات خلال التداريب التطبيقي</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="{{ route("public.login-p") }}" class="btn btn-dark me-2 my-3">تسجيل الدخول</a>
            </div>

            <div class="col-md-6 d-none d-md-block">

            </div>
        </div>

    </div>
        <div class="hover01 column">
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393024/Amal_25_hirj46.jpg" height="200" width="300" />
            </div>
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393024/Amal_4_hzz8ke.jpg" height="200" width="300" />
            </div>
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393024/Amal_21_eu8m8r.jpg" height="200" width="300" />
            </div>
        </div>
        <div class="hover01 column" >
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393024/Amal_12_h3yvvs.jpg" height="200" width="300" />
            </div>
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393025/Amal_31_iyrorw.jpg" height="200" width="300" />
            </div>
            <div class="pic">
                <img src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1653393025/Amal_48_repouu.jpg" height="200" width="300" />
            </div>
        </div>

        <hr>

    </div>
</main>


@endsection
