@extends('layouts.admin')
@section('title','أظف سطاج')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أظف سطاج</h2>
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
        <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="title">العنوان:</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ old("title") }}" placeholder="العنوان..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="provider">المزود:</label>
                    <input required type="text" id="provider" name="provider" class="form-control" value="{{ old("provider") }}" placeholder="المزود..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="start">من:</label>
                    <input required type="time" id="start" name="start" class="form-control" value="{{ old("start") }}" placeholder="من..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="end">إلى:</label>
                    <input required type="time" id="end" name="end" class="form-control" value="{{ old("end") }}" placeholder="إلى..." />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="supervisor">المشرف:</label>
                    <input required type="text" id="supervisor" name="supervisor" class="form-control" value="{{ old("supervisor") }}" placeholder="المشرف..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="supervisor_email">البريد الإلكتروني للمشرف:</label>
                    <input required type="email" id="supervisor_email" name="supervisor_email" class="form-control" value="{{ old("supervisor_email") }}" placeholder="البريد الإلكتروني للمشرف..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="supervisor_phone">رقم هاتف المشرف:</label>
                    <input required type="phone" id="supervisor_phone" name="supervisor_phone" class="form-control" value="{{ old("supervisor_phone") }}" placeholder="رقم هاتف المشرف..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="student">المعني:</label>
                    <select required id="student" name="student" class="form-control form-select" value="{{ old("student") }}">
                        <option value="" disabled selected>المعني...</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ (old("student") == $student->id) ? 'selected="true"' : '' }}>{{ $student->id }} - {{$student->fname}}{{ $student->lname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="goals">الإهداف:</label>
                    <textarea required type="text" id="goals" name="goals" class="form-control" value="{{ old("goals") }}" placeholder="الإهداف..." cols="30" rows="10">{{ old("description") }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="instructions">الإرشادات:</label>
                    <textarea required type="text" id="instructions" name="instructions" class="form-control" value="{{ old("instructions") }}" placeholder="الإرشادات..." cols="30" rows="10">{{ old("description") }}</textarea>
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
@endsection