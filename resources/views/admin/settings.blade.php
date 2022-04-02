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
      <form action="{{ route('admin.profile.update') }}" method="POST" style="display: flex;flex-direction:column;gap:10px" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-xl-1">
                <label for="avatar" style="cursor: pointer">
                    <img src="{{ route("admin-avatar",$settings->avatar) }}" alt="{{ $settings->username }}" id="avatar-prev" class="img img-responsive img-thumbnail mx-auto w-100">
                </label>
            </div>
            <input hidden type="file" id="avatar" name="avatar" accept="image/png, image/gif, image/jpeg" />
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="username">إسم الستخدم:</label>
                <input  value="{{ $settings->username }}" name="username" disabled placeholder="إسم الستخدم..." type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="email">البريد الإلكتروني:</label>
                <input  value="{{ $settings->email }}" name="email" disabled placeholder="البريد الإلكتروني..." type="email" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="password">كلمة المرور:</label>
                <input   name="password" placeholder="كلمة المرور..." type="password" class="form-control">
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
<script type="text/javascript">
    const avatar = document.querySelector("#avatar")
    avatar.addEventListener("change",function(e){
        document.querySelector("#avatar-prev").setAttribute("src",URL.createObjectURL(e.target.files[0]))
    })
</script>
@endsection
@section('js')
<script src="{{ asset('js/datatable.js') }}"></script>
@endsection
