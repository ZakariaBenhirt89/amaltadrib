@extends('layouts.admin')
@section('title','فرص عمل')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">فرص عمل</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>المزود</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>المشرف</th>
                        <th>البريد الإلكتروني للمشرف</th>
                        <th>هاتف المشرف</th>
                        <th>الأهداف</th>
                        <th>الإرشادات</th>
                        <th>حالة الطلب</th>
                        <th>الطالب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($internships)
                          @foreach ($internships as $internship)
                            <tr>
                              <td class="text-nowrap">{{ $internship->title}}</td>
                              <td>{{ $internship->provider}}</td>
                              <td>{{ $internship->start}}</td>
                              <td>{{ $internship->end}}</td>
                              <td>{{ $internship->supervisor}}</td>
                              <td>{{ $internship->supervisor_email}}</td>
                              <td>{{ $internship->supervisor_phone}}</td>
                              <td>{{ $internship->goals}}</td>
                              <td>{{ $internship->guidlines}}</td>
                              <td>
                                @if($internship->applied)
                                  <span class="badge bg-success">تم التقدم للوظيفة</span>
                                @else
                                  <span class="badge bg-dark text-white">لم يتم التقدم للوظيفة بعد</span>
                                @endif
                              </td>
                              <td class="text-nowrap">{{ $internship->student->fname}} {{ $internship->student->lname}}</td>
                              <td>
                                <form action="{{ route("admin.internships.delete",$internship->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                              </td>
                            </tr> 
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
                        <th>المزود</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>المشرف</th>
                        <th>البريد الإلكتروني للمشرف</th>
                        <th>هاتف المشرف</th>
                        <th>الأهداف</th>
                        <th>الإرشادات</th>
                        <th>حالة الطلب</th>
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