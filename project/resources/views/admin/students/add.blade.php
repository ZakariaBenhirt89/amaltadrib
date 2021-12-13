@extends('layouts.admin')
@section('title','أضف متدرب')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أضف متدرب</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">الصورة الشخصية:</label>
                        <input class="form-control" type="file" accept="image/*" name="avatar" placeholder="الصورة الشخصية..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">الإسم:</label>
                        <input class="form-control" type="text" name="fname" value="{{ old("fname") }}" placeholder="الإسم..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">النسب:</label>
                        <input class="form-control" type="text" name="lname" value="{{ old("lname") }}" placeholder="النسب..." />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">الهاتف:</label>
                        <input class="form-control" type="tel" name="phone" value="{{ old("phone") }}" placeholder="الهاتف..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">تاريخ الميلاد:</label>
                        <input class="form-control" type="date" name="birthday" value="{{ old("birthday") }}" placeholder="تاريخ الميلاد..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">المستوى الدراسي:</label>
                        <select name="level" id="level" class="form-control form-select">
                            <option value="" disabled selected>المستوى الدراسي...</option>
                            <option @if(old("level" == "مرتبط")) selected @endif value="مرتبط">مرتبط</option>
                            <option @if(old("level" == "غير مرتبطة")) selected @endif value="غير مرتبطة">غير مرتبطة</option>
                            <option @if(old("level" == "مطلق")) selected @endif value="مطلق">مطلق</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">رفم هاتف الوصي:</label>
                        <input class="form-control" type="tel" name="gardian_number" value="{{ old("gardian_number") }}" placeholder="رفم هاتف الوصي..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">الحالة العائلية:</label>
                        <input class="form-control" type="number" name="family_situation" value="{{ old("family_situation") }}" placeholder="الحالة العائلية..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">عدد الأبناء:</label>
                        <input class="form-control" type="number" name="number_of_children" value="{{ old("number_of_children") }}" placeholder="عدد الأبناء..." />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">رقم البطاقة الوطنية:</label>
                        <input class="form-control" type="text" name="cin_number" value="{{ old("cin_number") }}" placeholder="رقم البطاقة الوطنية..." />
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">العنوان:</label>
                        <input class="form-control" type="text" name="adress" value="{{ old("adress") }}" placeholder="العنوان..." />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">المزيد من التفاصيل:</label>
                        <input class="form-control" type="text" name="more_details" placeholder="المزيد من التفاصيل..." />
                    </div>                
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">البريد الإلكتروني:</label>
                        <input class="form-control" type="text" name="email" value="{{ old("email") }}" placeholder="البريد الإلكتروني..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">كلمة المرور:</label>
                        <input class="form-control" type="password" name="password" placeholder="كلمة المرور..." />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input class="btn btn-dark" type="submit" value="أضف">
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
    <script src="{{ asset('js/datatable.js') }}"></script>
@endsection