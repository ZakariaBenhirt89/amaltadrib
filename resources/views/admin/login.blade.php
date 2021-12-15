@extends('layouts.public')
@section('title','تسجيل الدخول')

@section('content')
<main class="admin-login">
    <div class="container">
        <div class="row align-items-center px-3">
            <div class="col-md-6 mx-auto py-5 px-5 mx-2 text-center text-md-end shadow-lg bg-dark border border-warning my-5 rounded">
                <h1 class="h3 text-center  text-warning mb-3">تسجيل الدخول</h1>
                <h2 class="h2 text-warning text-center text-white mb-3">مرحبا بكم في منصة أمل تدريب</h2>
                @if(session('success'))
                    <div class="alert alert-success text-center p-1 my-2">{{session('success')}}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger p-2">
                        @foreach ($errors->all() as $error)
                            <span class="d-block small">{{ $error }}</span>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('admin.login') }}" method="POST" class="text-md-start">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-start d-block  text-white" for="email">البريد الإلكتروني:</label>
                        <input id="email" name="email" type="email" placeholder="البريد الإلكتروني..." value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-start d-block  text-white" for="password">كلمة المرور:</label>
                        <input id="password" name="password" type="password" placeholder="كلمة المرور..." value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-start">
                        <input type="checkbox" name="remeber" id="remeber" class="form-check-input">
                        <label for="remeber" class="form-check-label  text-white">تذكرنى</label>
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