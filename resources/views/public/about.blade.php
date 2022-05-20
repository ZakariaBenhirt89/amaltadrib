@extends('layouts.public')
@section('title','من نحن')

@section('content')
<main class="about">
    <div class="container">
        <div class="row align-items-center h-75">
            <div class="col-md-6 mx-auto py-5 px-2 text-center">
                <img src="{{ asset("images/logo.svg") }}" alt="" class="im img-responsive mb-3 d-md-none">
                <h1 class="h1"><strong>المنصة الرقمية أمل تدريب</strong></h1>
                <h2 class="h3 text-warning">مرحبا بكم في منصة أمل تدريب</h2>
                <p>هذه منصة خاصة بمتدربات جمعية امل لفنون الطبخ. تحتوي هذه المنصة على فيديوهات, بودكاستات, وملفات تهدف الى دعم المتدربات خلال التداريب التطبيقي</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route("public.contact-p") }}" class="btn btn-dark me-2 my-3">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
