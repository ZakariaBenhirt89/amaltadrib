@extends('layouts.public')
@section('title','تواصل معنا')

@section('content')
<main class="contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto py-5 px-2 text-center text-md-end">
                <h1 class="h2 text-center">تواصل معنا</h1>
                <h2 class="h1 text-warning text-center">مرحبا بكم في منصة أمل تدريب</h2>
                <small class="small text-muted text-center d-block">نحن مستعدون دائمًا للتواصل</small>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="name">الإسم:</label>
                        <input type="text" id="name" placeholder="الإسم الكامل..." class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email_or_phone">البريد الإلكتروني أو رقم الهاتف:</label>
                        <input type="text" id="email_or_phone" placeholder="البريد الإلكتروني أو رقم الهاتف..." class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">الرسالة:</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="الرسالة..."></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-warning d-block w-100">أرسل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection