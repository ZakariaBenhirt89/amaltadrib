@extends('layouts.admin')
@section('title','تعديل دورة')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">تعديل دورة</h2>
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
        <form action="{{ route('admin.monitorings.update',$monitoring->id) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="code">رقم الدورة:</label>
                    <input required type="number" id="code" name="code" class="form-control" value="{{ $monitoring->code }}" placeholder="رقم الدورة..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="title">إسم الدورة:</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ $monitoring->title }}" placeholder="إسم الدورة..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="basic_recipes">الوصفات الأساسية	:</label>
                    <input required type="text" id="basic_recipes" name="basic_recipes" class="form-control" value="{{ $monitoring->basic_recipes }}" placeholder="الوصفات الأساسية..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="duration">مدة الدورة:</label>
                    <input required type="text" id="duration" name="duration" class="form-control" value="{{ $monitoring->duration }}" placeholder="مدة الدورة..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="result">نتيجة الدورة:</label>
                    <input required type="text" id="result" name="result" class="form-control" value="{{ $monitoring->result }}" placeholder="نتيجة الدورة..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="status">الوضعية:</label>
                    <select required id="status" name="status" class="form-control form-select" value="{{ $monitoring->status }}">
                        <option value="" disabled selected>الوضعية...</option>
                        <option value="0" {{ ($monitoring->status === 0) ? 'selected="true"' : '' }}>قيد التقدم</option>
                        <option value="1" {{ ($monitoring->status === 1) ? 'selected="true"' : '' }}>اكتمل</option>
                        <option value="2" {{ ($monitoring->status === 2) ? 'selected="true"' : '' }}>غير مكتمل</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="service">الخدمة:</label>
                    <select required id="service" name="service" class="form-control form-select">
                        <option value="" disabled selected>الخدمة...</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ ($monitoring->service->id == $service->id) ? 'selected="true"' : '' }}>{{ $service->id }} - {{$service->name}}</option>
                        @endforeach
                    </select>
                    <label for="student">المعني:</label>
                    <select required id="student" name="student" class="form-control form-select">
                        <option value="" disabled selected>المعني...</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ ($monitoring->student->id == $student->id) ? 'selected="true"' : '' }}>{{ $student->id }} - {{$student->fname}}{{ $student->lname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn w-25 btn-dark" value="حفظ">
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
