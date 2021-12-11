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
                                <th>العنوان</th>
                                <th>المزود</th>
                                <th>تبدأ في</th>
                                <th>ينتهي عند</th>
                                <th>المشرف</th>
                                <th>البريد الإلكتروني للمشرف</th>
                                <th>هاتف المشرف</th>
                                <th>الأهداف</th>
                                <th>إرشادات</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @isset($internships)
                                    @foreach ($internships as $internship)
                                        <tr>
                                            <td>{{ $internship->title }}</td>
                                            <td>{{ $internship->salary }}</td>
                                            <td>{{ $internship->position }}</td>
                                            <td>{{ $internship->provider }}</td>
                                            <td>{{ $internship->location }}</td>
                                            <td>{{ $internship->supervisor }}</td>
                                            <td>{{ $internship->supervisor_email }}</td>
                                            <td>{{ $internship->supervisor_phone }}</td>
                                            <td>{{ $internship->start }}</td>
                                            <td>{{ $internship->end }}</td>
                                            <td>{{ $internship->contract_type }}</td>
                                            <td>{{ $internship->description }}</td>
                                            <td>
                                                @if ($internship->applied == 0)
                                                    <form action="{{ route('student.internship.apply',$internship->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success text-white">تقديم طلب</button>
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
                                <th>المزود</th>
                                <th>تبدأ في</th>
                                <th>ينتهي عند</th>
                                <th>المشرف</th>
                                <th>البريد الإلكتروني للمشرف</th>
                                <th>هاتف المشرف</th>
                                <th>الأهداف</th>
                                <th>إرشادات</th>
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