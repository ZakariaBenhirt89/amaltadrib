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
                                <th>العنوان</th>
                                <th>من</th>
                                <th>إلى</th>
                                <th>المكان</th>
                                <th>الحالة</th>
                                <th>الخدمة</th>
                                <th>الوصف</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @isset($monitorings)
                                    @foreach ($monitorings as $monitoring)
                                        <tr>
                                            <td>{{ $monitoring->title }}</td>
                                            <td>{{ $monitoring->start }}</td>
                                            <td>{{ $monitoring->end }}</td>
                                            <td>{{ $monitoring->place }}</td>
                                            <td>
                                                @if ($monitoring->status == 0)
                                                    <span class="badge bg-info text-dark small p-1">بانتظار الموافقة</span>
                                                @elseif($monitoring->status == 1)
                                                    <span class="badge bg-success small p-1">في طور التدريب</span>
                                                @else
                                                    <span class="badge bg-dark small p-1">تم الانتهاء</span>
                                                @endif                                            
                                            </td>
                                            <td>{{ $monitoring->service->name }}</td>
                                            <td>{{ $monitoring->description }}</td>
                                            <td>
                                                @if ($monitoring->status == 0)
                                                <form action="{{ route("student.rotations.accept",$monitoring->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success text-white">موافقة</button>
                                                </form>
                                                @else
                                                <span></span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                            <tfoot>
                                <th>العنوان</th>
                                <th>من</th>
                                <th>إلى</th>
                                <th>المكان</th>
                                <th>الحالة</th>
                                <th>الخدمة</th>
                                <th>الوصف </th>
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