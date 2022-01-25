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
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
            @endif
            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">الصورة الشخصية:</label>
                        <input class="form-control" type="file" accept="image/*" name="avatar" placeholder="الصورة الشخصية..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">الإسم:</label>
                        <input required class="form-control" type="text" name="fname" value="{{ old("fname") }}" placeholder="الإسم..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">النسب:</label>
                        <input required class="form-control" type="text" name="lname" value="{{ old("lname") }}" placeholder="النسب..." />
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
                        <label for="">المستوى الدراسي: {{ old("level") }}</label>
                        <select name="level" id="level" class="form-control form-select">
                            <option value="" disabled selected>المستوى الدراسي...</option>
                            <option {{ old('level') == "مدرسة ابتدائية" ? 'selected="true"' : 'مدرسة ابتدائية' }} value="مدرسة ابتدائية">مدرسة ابتدائية</option>
                            <option {{ old('level') == "المدرسة المتوسطة" ? 'selected="true"' : 'المدرسة المتوسطة' }} value="المدرسة المتوسطة">المدرسة المتوسطة</option>
                            <option {{ old('level') == "المدرسة الثانوية" ? 'selected="true"' : 'المدرسة الثانوية' }} value="المدرسة الثانوية">المدرسة الثانوية</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">رقم الهاتف الثاني:</label>
                        <input class="form-control" type="tel" name="gardian_number" value="{{ old("gardian_number") }}" placeholder="رفم هاتف الوصي..." />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">الحالة العائلية:</label>
                        <select name="family_situation" id="family_situation" class="form-control form-select">
                            <option value="" disabled selected>الحالة العائلية...</option>
                            <option {{ old('family_situation') == "مرتبط" ? 'selected="true"' : 'مرتبط' }} value="مرتبط">مرتبط</option>
                            <option {{ old('family_situation') == "غير مرتبط" ? 'selected="true"' : 'غير مرتبط' }} value="غير مرتبط">غير مرتبط</option>
                            <option {{ old('family_situation') == "مطلق" ? 'selected="true"' : 'مطلق' }} value="مطلق">مطلق</option>
                        </select>
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
                        <input required class="form-control" type="text" name="email" value="{{ old("email") }}" placeholder="البريد الإلكتروني..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">كلمة المرور:</label>
                        <input required class="form-control" type="password" name="password" placeholder="كلمة المرور..." />
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