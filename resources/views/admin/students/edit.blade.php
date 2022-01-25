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
                    <input required type="text"  class="form-control" name="fname" placeholder="fname" value="{{ $student->fname }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">النسب:</label>
                    <input required type="text"  class="form-control" name="lname" placeholder="lname" value="{{ $student->lname }}"/>
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
                    <label for="">رقم الهاتف الثاني:</label>
                    <input type="text"  class="form-control" name="gardian_number" placeholder="gardian_number" value="{{ $student->gardian_number }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">الحالة العائلية:</label>
                    <input type="text"  class="form-control" name="family_situation" placeholder="family_situation" value="{{ $student->family_situation }}"/>
                </div>
                <div class="form-group col-md col-md-4">
                    <label for="">عدد الأبناء:</label>
                    <select name="number_of_children" id="number_of_children"  class="form-control form-select">
                      <option value="" selected disabled>عدد الأبناء...</option>
                      <option value="0" @if($student->number_of_children === 0) selected="true"@endif>0</option>
                      <option value="1" @if($student->number_of_children === 1) selected="true"@endif>1</option>
                      <option value="2" @if($student->number_of_children === 2) selected="true"@endif>2</option>
                      <option value="3" @if($student->number_of_children === 3) selected="true"@endif>3</option>
                      <option value="4" @if($student->number_of_children === 4) selected="true"@endif>4</option>
                      <option value="5" @if($student->number_of_children === 5) selected="true"@endif>5</option>
                  </select>
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
                    <input required type="text" class="form-control" name="email" placeholder="email" value="{{ $student->email }}"/>
                </div>
                <div class="form-group col-md">
                    <label for="">كلمة المرور:</label>
                    <input required type="password" class="form-control" name="password" placeholder="كلمة المرور..." />
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
