@extends('layouts.admin')
@section('title','المتدربين')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">المتدربين</h2>
            <a href="{{ route("admin.students.add") }}" class="btn btn-dark shadow-md mb-3">أظف متدرب</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>الإسم</th>
                        <th>الهاتف</th>
                        <th>تاريخ الميلاد</th>
                        <th>المستوى الدراسي</th>
                        <th>رقم الهاتف الثاني</th>
                        <th>الوضع العائلي</th>
                        <th>عدد الاطفال</th>
                        <th>رقم البطاقة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                        <th>مزيد من التفاصيل</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($students)
                          @foreach ($students as $student)
                          <tr>
                              <td class="text-nowrap"><img src="{{ route("student-avatar",$student->avatar) }}" width="30" height="30" class="d-inline-block rounded-circle" alt=""> {{ $student->fname }} {{ $student->lname }}</td>
                              <td class="text-nowrap">@if($student->phone)<a dir="ltr" href="tel:{{ $student->phone }}" class="btn btn-sm btn-dark">{{ $student->phone }}</a>@endif</td>
                              <td>{{ $student->birthday }}</td>
                              <td class="text-nowrap">{{ $student->level }}</td>
                              <td class="text-nowrap">@if($student->gardian_number)<a dir="ltr" href="tel:{{ $student->gardian_number}}" class="btn btn-sm btn-dark">{{ $student->gardian_number}}</a>@endif</td>
                              <td>{{ $student->family_situation }}</td>
                              <td>{{ $student->number_of_children }}</td>
                              <td>{{ $student->cin_number }}</td>
                              <td class="text-nowrap">{{ $student->adress }}</td>
                              <td>@if($student->email)<a href="mailto:{{ $student->email }}" class="btn btn-sm btn-info">{{ $student->email }}</a>@endif</td>
                              <td><small title="{{ $student->more_details }}" class="text-truncate d-block" title style="max-width: 150px;">{{ $student->more_details }}</small></td>
                              <td class="d-flex flex-row justify-centent-center align-items-center">
                                  <form class="h-100 w-100 d-flex flex-row justify-centent-center align-items-center m-1" action="{{ route("admin.students.delete",$student->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger mb-0">حذف</button>
                                </form>
                                <a href="{{ route("admin.students.edit",[$student->id]) }}" class="btn btn-sm btn-info m-1">تعديل</a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>الإسم</th>
                        <th>الهاتف</th>
                        <th>تاريخ الميلاد</th>
                        <th>المستوى الدراسي</th>
                        <th>رقم الهاتف الثاني</th>
                        <th>الوضع العائلي</th>
                        <th>عدد الاطفال</th>
                        <th>رقم البطاقة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                        <th>مزيد من التفاصيل</th>
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
