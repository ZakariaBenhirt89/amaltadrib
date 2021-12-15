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
                                <th>المركز</th>
                                <th>الخدمة</th>
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
                                @endisset
                            </tbody>
                            <tfoot>
                                <th>العنوان</th>
                                <th>من</th>
                                <th>إلى</th>
                                <th>المكان</th>
                                <th>الخدمة</th>
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