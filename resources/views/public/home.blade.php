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
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="{{ route("public.login-p") }}" class="btn btn-dark me-2 my-3">تسجيل الدخول</a>
                    <a href="{{ route("public.contact-p") }}" class="btn btn-warning me-2 my-3">الانضمام للمنصة</a>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <img src="{{asset('images/big-icon.svg')}}" alt="" class="img img-responsive big-icon me-auto d-block">
            </div>
        </div>
    </div>
</main>
@endsection