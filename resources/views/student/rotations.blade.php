@extends('layouts.student')
@section('title','دوراتي')
@section('content')
    <div class="container-fluid materials">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3">دوراتي</h2>
            </div>
        </div>
        <div class="row">
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
                            </thead>
                            <tbody>
                                {{-- @isset($monitorings)
                                    @foreach ($monitorings as $monitoring)
                                        <tr>
                                            <td>{{ $monitoring->title }}</td>
                                            <td>{{ $monitoring->start }}</td>
                                            <td>{{ $monitoring->end }}</td>
                                            <td>{{ $monitoring->place }}</td>
                                            <td>{{ $monitoring->service->name }}</td>
                                            <td>
                                                @if ($monitoring->status == 0)
                                                    <span type="submit" class="badge badge-sm bg-success text-white">...</span>
                                                    <span type="submit" class="badge badge-sm bg-danger text-white">...</span>
                                                    <span type="submit" class="badge badge-sm bg-warning text-white">...</span>
                                                @else
                                                <span></span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset --}}
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
                            </tr>
                          @endforeach
                        @endisset
                            </tbody>
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