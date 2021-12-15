@extends('layouts.admin')
@section('title','دورات')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">دورات</h2>
            <a href="{{ route("admin.monitorings.add") }}" class="btn btn-dark shadow-md mb-3">أظف دورة</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>المكان</th>
                        <th>الحالة</th>
                        <th>الخدمة</th>
                        <th>الوصف</th>
                        <th>الطالب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($monitorings)
                          @foreach ($monitorings as $monitoring)
                            <tr>
                              <td class="text-nowrap">{{ $monitoring->title}}</td>
                              <td class="text-nowrap">{{ $monitoring->start}}</td>
                              <td class="text-nowrap">{{ $monitoring->end}}</td>
                              <td class="text-nowrap">{{ $monitoring->place}}</td>
                              <td>
                                @if($monitoring->applied)
                                <span class="badge bg-success">تم التقدم للدورة</span>
                                @else
                                <span class="badge bg-dark text-white">لم يتم التقدم للدورة بعد</span>
                                @endif
                              </td>
                              <td class="text-nowrap">{{ $monitoring->service->name}}</td>
                              <td class="text-nowrap">{{ $monitoring->description}}</td>
                              <td class="text-nowrap">{{ $monitoring->student->fname}} {{ $monitoring->student->lname}}</td>
                              <td>
                                <form action="{{ route("admin.monitorings.delete",$monitoring->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.monitorings.edit',$monitoring->id) }}" class="btn btn-sm btn-info"> تعديل </a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>المكان</th>
                        <th>الحالة</th>
                        <th>الخدمة</th>
                        <th>الوصف</th>
                        <th>الطالب</th>
                        <th></th>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
    <script src="{{ asset('js/datatable.js') }}"></script>
@endsection
