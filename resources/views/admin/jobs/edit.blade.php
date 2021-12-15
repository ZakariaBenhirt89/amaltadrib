@extends('layouts.admin')
@section('title','أضف فرصة عمل')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">تعديل فرصة عمل</h2>
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
        <form action="{{ route('admin.jobs.update',$job->id) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="title">العنوان:</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ $job->title }}" placeholder="العنوان..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="salary">الراتب:</label>
                    <input required type="number" id="salary" name="salary" class="form-control" value="{{ $job->salary }}" placeholder="الراتب..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="position">الوضيفة:</label>
                    <input required type="text" id="position" name="position" class="form-control" value="{{ $job->position }}" placeholder="الوضيفة..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="provider">المزود:</label>
                    <input required type="text" id="provider" name="provider" class="form-control" value="{{ $job->provider }}" placeholder="المزود..." />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="location">الموقع:</label>
                    <input required type="text" id="location" name="location" class="form-control" value="{{ $job->location }}" placeholder="الموقع..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="supervisor">المشرف:</label>
                    <input required type="text" id="supervisor" name="supervisor" class="form-control" value="{{ $job->supervisor }}" placeholder="المشرف..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="supervisor_email">البريد الإلكتروني للمشرف:</label>
                    <input required type="email" id="supervisor_email" name="supervisor_email" class="form-control" value="{{ $job->supervisor_email }}" placeholder="البريد الإلكتروني للمشرف..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="supervisor_phone">رقم هاتف المشرف:</label>
                    <input required type="phone" id="supervisor_phone" name="supervisor_phone" class="form-control" value="{{ $job->supervisor_phone }}" placeholder="رقم هاتف المشرف..." />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="start">من:</label>
                    <input required type="time" id="start" name="start" class="form-control" value="{{ $job->start }}" placeholder="من..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="end">إلى:</label>
                    <input required type="time" id="end" name="end" class="form-control" value="{{ $job->end }}" placeholder="إلى..." />
                </div>
                <div class="form-group col-md-3">
                    <label for="contract_type">نوع العقد:</label>
                    <select required id="contract_type" name="contract_type" class="form-control form-select" value="{{ old("contract_type") }}">
                        <option value="" disabled>نوع العقد...</option>
                        <option value="عقد غير محدد المدة" {{ ($job->contract_type == "عقد غير محدد المدة") ? 'selected="true"' : '' }}>عقد غير محدد المدة</option>
                        <option value="عقد محدد المدة" {{ ($job->contract_type == "عقد محدد المدة") ? 'selected="true"' : '' }}>عقد محدد المدة</option>
                        <option value="عقد أنابك" {{ ($job->contract_type == "عقد أنابك") ? 'selected="true"' : '' }}>عقد ANAPEC</option>
                        <option value="بدون عقد" {{ ($job->contract_type == "بدون عقد") ? 'selected="true"' : '' }}>بدون عقد</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="student">المعني:</label>
                    <select required id="student" name="student" class="form-control form-select" value="{{ $job->student }}">
                        <option value="" disabled >المعني...</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ ($job->student == $student->id) ? 'selected="true"' : '' }}>{{ $student->id }} - {{$student->fname}}{{ $student->lname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="description">الوصف:</label>
                    <textarea required type="text" id="description" name="description" class="form-control" value="{{ $job->description }}" placeholder="الوصف..." cols="30" rows="10">{{ $job->description }}</textarea>
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
