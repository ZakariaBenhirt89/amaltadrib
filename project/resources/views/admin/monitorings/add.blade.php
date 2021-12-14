@extends('layouts.admin')
@section('title','أظف دورة')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أظف دورة</h2>
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
        <form action="{{ route('admin.monitorings.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="title">العنوان:</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ old("title") }}" placeholder="العنوان..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="place">المكان:</label>
                    <input required type="text" id="place" name="place" class="form-control" value="{{ old("place") }}" placeholder="المكان..." />
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
                <div class="form-group col-md-6">
                    <label for="service">الخدمة:</label>
                    <select required id="service" name="service" class="form-control form-select" value="{{ old("service") }}">
                        <option value="" disabled selected>المعني...</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ (old("service") == $service->id) ? 'selected="true"' : '' }}>{{ $service->id }} - {{$service->name}}</option>
                        @endforeach
                    </select>
                    <label for="student">المعني:</label>
                    <select required id="student" name="student" class="form-control form-select" value="{{ old("student") }}">
                        <option value="" disabled selected>المعني...</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ (old("student") == $student->id) ? 'selected="true"' : '' }}>{{ $student->id }} - {{$student->fname}}{{ $student->lname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">الوصف:</label>
                    <textarea required type="text" id="description" name="description" class="form-control" value="{{ old("description") }}" placeholder="الوصف..." cols="30" rows="10">{{ old("description") }}</textarea>
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