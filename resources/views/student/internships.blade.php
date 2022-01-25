@extends('layouts.student')
@section('title','فرص سطاج')
@section('content')
    <div class="container-fluid materials">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3">فرص سطاج</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2 shadow-md rounded border border-warning">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                                <th>من</th>
                                <th>إلى</th>
                                <th>إسم المقر</th>
                                <th>العنوان</th>
                            </thead>
                            <tbody>
                                @isset($internships)
                          @foreach ($internships as $internship)
                            <tr>
                              <td class="text-nowrap">{{ $internship->start}}</td>
                              <td class="text-nowrap">{{ $internship->end}}</td>
                              <td class="text-nowrap">{{ $internship->provider}}</td>
                              <td class="text-nowrap">{{ $internship->address}}</td>
                            </tr>
                          @endforeach
                        @endisset
                            </tbody>
                            <tfoot>
                                <th>من</th>
                                <th>إلى</th>
                                <th>إسم المقر</th>
                                <th>العنوان</th>
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