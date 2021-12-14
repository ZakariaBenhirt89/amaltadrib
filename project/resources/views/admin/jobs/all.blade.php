@extends('layouts.admin')
@section('title','فرص عمل')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">فرص عمل</h2>
            <a href="{{ route("admin.jobs.add") }}" class="btn btn-dark shadow-md mb-3">أضف فرصة عمل</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>الراتب</th>
                        <th>منصب الوظيفة</th>
                        <th>المزود</th>
                        <th>الموقع</th>
                        <th>المشرف</th>
                        <th>البريد الإلكتروني للمشرف</th>
                        <th>هاتف المشرف</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>نوع العقد</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>الطلاب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($jobs)
                          @foreach ($jobs as $job)
                            <tr>
                              <td class="text-nowrap">{{ $job->title}}</td>
                              <td class="text-nowrap">{{ $job->salary}}dh</td>
                              <td class="text-nowrap">{{ $job->position}}</td>
                              <td class="text-nowrap">{{ $job->provider}}</td>
                              <td class="text-nowrap" style="min-width:170px;">{{ $job->location}}</td>
                              <td class="text-nowrap">{{ $job->supervisor}}</td>
                              <td class="text-nowrap"><a href="mailto:{{ $job->supervisor_email}}" class="btn btn-info btn-sm">{{ $job->supervisor_email}}</a></td>
                              <td class="text-nowrap"><a href="mailto:{{ $job->supervisor_phone}}" class="btn btn-dark btn-sm">{{ $job->supervisor_phone}}</a></td>
                              <td class="text-nowrap">{{ $job->start}}</td>
                              <td class="text-nowrap">{{ $job->end}}</td>
                              <td class="text-nowrap">{{ $job->contract_type}}</td>
                              <td><span class="text-truncate d-block" title="{{ $job->description}}" style="max-width: 300px;">{{ $job->description}}</span></td>
                              <td>
                                @if($job->applied)
                                  <span class="badge bg-success">تم التقدم للوظيفة</span>
                                @else
                                  <span class="badge bg-dark text-white">لم يتم التقدم للوظيفة بعد</span>
                                @endif
                              </td>
                              <td>{{ $job->student}}</td>
                              <td>
                                <form action="{{ route("admin.jobs.delete",$job->id) }}" method="post">
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
                        <th>الراتب</th>
                        <th>منصب الوظيفة</th>
                        <th>المزود</th>
                        <th>الموقع</th>
                        <th>المشرف</th>
                        <th>البريد الإلكتروني للمشرف</th>
                        <th>هاتف المشرف</th>
                        <th>يبدأ في</th>
                        <th>ينتهي عند</th>
                        <th>نوع العقد</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>الطلاب</th>
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