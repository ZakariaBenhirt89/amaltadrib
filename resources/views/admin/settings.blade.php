@extends('layouts.admin')
@section('title','إعدادات الحساب')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
<div class="col-md-12">
    <h2 class="h3 mb-3">إعدادات الحساب</h2>
</div>
<div class="col-md-12">
  <div class="p-2 shadow-md rounded border border-warning">
      @if ($errors->any())
          <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
          </div>
      @endif
      <form action="{{ route('admin.profile.update') }}" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-xl-1">
                <img src="{{ asset('images/admin/avatar.png') }}" alt="{{ $settings->username }}" class="img img-responsive img-thumbnail mx-auto w-100">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="username">إسم الستخدم:</label>
                <input required value="{{ $settings->username }}" name="username" disabled placeholder="إسم الستخدم..." type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="email">البريد الإلكتروني:</label>
                <input required value="{{ $settings->email }}" name="email" disabled placeholder="البريد الإلكتروني..." type="email" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="password">كلمة المرور:</label>
                <input required  name="password" placeholder="كلمة المرور..." type="password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-dark" value="حفظ">
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/datatable.js') }}"></script>
@endsection