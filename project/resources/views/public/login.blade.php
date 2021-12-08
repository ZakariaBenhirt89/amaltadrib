@extends('layouts.public')
@section('title','تسجيل الدخول')

@section('content')
<main class="login">
    <div class="container">
        <div class="row align-items-center px-3">
            <div class="col-md-6 mx-auto py-5 px-5 mx-2 text-center text-md-end bg-white shadow-lg border border-warning my-5 rounded">
                <h1 class="h3 text-center mb-3">تسجيل الدخول</h1>
                <h2 class="h2 text-warning text-center mb-3">مرحبا بكم في منصة أمل تدريب</h2>
                @if(session('success'))
                    <div class="alert alert-success text-center p-1 my-2">{{session('success')}}</div>
                @endif
                <form action="{{ route('public.login') }}" method="POST" class="text-md-start">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-end d-block" for="email_or_phone">البريد الإلكتروني أو رقم الهاتف:</label>
                        <input id="email_or_phone" name="email_or_phone" type="email_or_phone" placeholder="البريد الإلكتروني أو رقم الهاتف..." value="{{old('email_or_phone')}}" class="form-control @error('email_or_phone') is-invalid @enderror">
                        @error('email_or_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-end d-block" for="password">كلمة المرور:</label>
                        <input id="password" name="password" type="password" placeholder="كلمة المرور..." value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-warning d-block w-100">تسجيل الدخول</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
    @endsection