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
                <img src="{{asset('images/big-icon.svg')}}" alt="" class="img img-responsive big-icon me-auto d-block">
            </div>
        </div>
    </div>
        <hr>
        <p><small>جمعية امل هي جمعية غير ربحية تعمل على تمكين وتعزيز قدرات النساء في وضعية صعبة لعيش حياة كريمة, مستقلة وولوج سوق الشغل</small> <b>جميع الحقوق محفوظة حقوق التأليف والنشر.
                المنتج
                مخصص
                لجمعية أمل</b>  &copy;	</p>
    </div>
</main>
@endsection
