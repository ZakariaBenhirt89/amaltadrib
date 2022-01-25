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
                        <th>رقم الدورة</th>
                        <th>إسم الدورة</th>
                        <th>الوصفات الأساسية</th>
                        <th>مدة الدورة</th>
                        <th>نتيجة الدورة</th>
                        <th>الوضعية</th>
                        <th>الخدمة</th>
                        <th>الطالب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($monitorings)
                          @foreach ($monitorings as $monitoring)
                            <tr>
                              <td>{{ $monitoring->code}}</td>
                              <td>{{ $monitoring->title}}</td>
                              <td>{{ $monitoring->basic_recipes}}</td>
                              <td>{{ $monitoring->duration}}</td>
                              <td>{{ $monitoring->result}}</td>
                              <td>
                                @if($monitoring->status === 0)
                                <span title="قيد التقدم" style="height: 10px;width:10px;" class="d-block rounded-circle text-white small bg-warning"></span>
                                  @elseif($monitoring->status === 1)
                                  <span title="اكتمل" style="height: 10px;width:10px;" class="d-block rounded-circle text-white small bg-success"></span>
                                  @elseif($monitoring->status === 2)
                                  <span title="غير مكتمل" style="height: 10px;width:10px;" class="d-block rounded-circle text-white small bg-danger"></span>
                                  @else
                                  <span title="غير معروفة" style="height: 10px;width:10px;" class="d-block rounded-circle text-white small bg-light border"></span>
                                @endif
                              </td>
                              <td>{{ $monitoring->service->name}}</td>
                              <td>{{ $monitoring->student->fname}} {{ $monitoring->student->lname}}</td>
                              <td>
                                <form class="d-inline-block" action="{{ route("admin.monitorings.delete",$monitoring->id) }}" method="post">
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
                        <th>المركز</th>
                        <th>الخدمة</th>
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
