@extends('layouts.admin')
@section('title','تعديل المتدربين')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">تعديل المتدربين</h2>
      </div>
      <div class="col-md-12">
        <!---->
        @if($errors->any())
        <div class="col-8 mx-auto mb-5">
            <ul class="list-group">
                @foreach ($errors->all() as $item)
                <li class="list-group-item text-danger text-center">{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="p-2 shadow-md rounded border border-warning">
          <form action="{{ route('admin.students.update',[$student->id]) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="form-group col-md col-md-4">
                    <label for="">الصورة الشخصية:</label>
                    <input type="file" class="form-control" name="avatar" placeholder="avatar" value="{{ $student->avatar }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">الإسم:</label>
                    <input type="text"  class="form-control" name="fname" placeholder="fname" value="{{ $student->fname }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">النسب:</label>
                    <input type="text"  class="form-control" name="lname" placeholder="lname" value="{{ $student->lname }}"/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md col-md-4">
                    <label for="">الهاتف:</label>
                    <input type="text"  class="form-control" name="phone" placeholder="phone" value="{{ $student->phone }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">تاريخ الميلاد:</label>
                    <input type="date"  class="form-control" name="birthday" placeholder="birthday" value="{{ $student->birthday }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">المستوى الدراسي:</label>
                    <input type="text"  class="form-control" name="level" placeholder="level" value="{{ $student->level }}"/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md col-md-4">
                    <label for="">رقم هاتف الوصي:</label>
                    <input type="text"  class="form-control" name="gardian_number" placeholder="gardian_number" value="{{ $student->gardian_number }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">الحالة العائلية:</label>
                    <input type="text"  class="form-control" name="family_situation" placeholder="family_situation" value="{{ $student->family_situation }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">عدد الأبناء:</label>
                    <input type="number"  class="form-control" name="number_of_children" placeholder="number_of_children" value="{{ $student->number_of_children }}"/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="">رقم البطاقة الوطنية:</label>
                    <input type="text"  class="form-control" name="cin_number" placeholder="cin_number" value="{{ $student->cin_number }}"/>
                </div>
                <div class="form-group col-md-8">
                    <label for="">العنوان:</label>
                    <input type="text"  class="form-control" name="adress" placeholder="adress" value="{{ $student->adress }}"/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md">
                    <label for="">البريد الإلكتروني:</label>
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{ $student->email }}"/>
                </div>
                <div class="form-group col-md">
                    <label for="">كلمة المرور:</label>
                    <input type="password" class="form-control" name="password" placeholder="كلمة المرور..." />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md">
                  <label for="">المزيد من التفاصيل:</label>
                  <textarea rows="5" class="form-control" name="more_details" placeholder="more_details" value="">{{ $student->more_details }}</textarea>
              </div>
              </div>
              <div class="form-group col-md col-md-4">
                  <input type="submit" value="تعديل " class="btn btn-info">
              </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection
@section('js')
@endsection
