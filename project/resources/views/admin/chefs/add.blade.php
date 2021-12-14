@extends('layouts.admin')
@section('title','أضف مدرب')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أضف مدرب</h2>
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
        <form action="{{ route('admin.chefs.store') }}" enctype="multipart/form-data" method="POST" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">الصورة الشخصية:</label>
                    <input name="avatar" placeholder="الصورة الشخصية" class="form-control" type="file">
                </div>
                <div class="form-group col-md-4">
                    <label for="">الإسم:</label>
                    <input required name="fname" placeholder="الإسم..." value="{{ old("الإسم") }}" class="form-control" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label for="">النسب:</label>
                    <input required name="lname" placeholder="النسب..." value="{{ old("lname") }}" class="form-control" type="text">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">تاريخ الميلاد:</label>
                <input name="birthday" placeholder="تاريخ الميلاد..." value="{{ old("birthday") }}" type="date" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">الجنس:</label>
                    <div class="from-check form-control">
                        <label class="form-check-label mb-0" for="male" >ذكر</label>
                        <input name="gender" value="ذكر" id="male" {{ old('gender') == "ذكر" ? 'checked="true"' : '' }} type="radio" class="form-check-input" checked>
                        <label class="form-check-label mb-0" for="fmale" >أنثى</label>
                        <input name="gender" value="أنثى" id="fmale" {{ old('gender') == "أنثى" ? 'checked="true"' : '' }} type="radio" class="form-check-input">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">العنوان:</label>
                    <input name="adress" value="{{ old("adress") }}" placeholder="العنوان..." type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">المركز:</label>
                    <select required name="centers_id" class="form-control" >
                        <option value="" disabled selected>المركز...</option>
                        @foreach ($centers as $center)
                            <option {{ old('centers_id') == $center->id ? 'selected="true"' : '' }} value="{{ $center->id }}"> {{ $center->id.' - '.$center->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
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