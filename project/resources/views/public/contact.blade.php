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
                @if(session('success'))
                    <div class="alert alert-success text-center p-1 my-2">{{session('success')}}</div>
                @endif
                <form action="{{ route('public.contact') }}" method="POST" class="text-md-start">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-end d-block" for="name">الإسم:</label>
                        <input id="name" type="name" name="name" placeholder="الإسم الكامل..." value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-end d-block" for="email_or_phone">البريد الإلكتروني أو رقم الهاتف:</label>
                        <input id="email_or_phone" name="email_or_phone" type="email_or_phone" placeholder="البريد الإلكتروني أو رقم الهاتف..." value="{{old('email_or_phone')}}" class="form-control @error('email_or_phone') is-invalid @enderror">
                        @error('email_or_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-end d-block" for="message">الرسالة:</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="الرسالة...">{{old('message')}}</textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-warning d-block w-100">أرسل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection