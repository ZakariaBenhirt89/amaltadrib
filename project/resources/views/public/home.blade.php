@extends('layouts.public')
@section('title','home page')

@section('content')
    <div class="container home">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h2">المنصة الرقمية أمل تدريب</h1>
                <h2 class="h3 text-warning">مرحبا بكم في منصة أمل تدريب</h2>
                <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.</p>
                <div class="d-flex">
                    <a href="{{ route("student.login") }}" class="btn btn-dark me-2 my-3">تسجيل الدخول</a>
                    <a href="{{ route("public.contact") }}" class="btn btn-warning me-2 my-3">الانضمام للمنصة</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('images/big-icon.svg')}}" alt="" class="img img-responsive big-icon">
            </div>
        </div>
    </div>
@endsection