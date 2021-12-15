@extends('layouts.student')
@section('title','فرص العمل')
@section('content')
    <div class="container-fluid materials">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3">فرص العمل</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-2 shadow-md rounded border border-warning">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                                <th>العنوان</th>
                                <th>الراتب</th>
                                <th>المنصب</th>
                                <th>المزود</th>
                                <th>الموقع</th>
                                <th>المشرف</th>
                                <th>البريد الإلكتروني للمشرف</th>
                                <th>هاتف المشرف</th>
                                <th>من</th>
                                <th>إلى</th>
                                <th>نوع العقد</th>
                                <th>الوصف</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @isset($jobs)
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->salary }}</td>
                                            <td>{{ $job->position }}</td>
                                            <td>{{ $job->provider }}</td>
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->supervisor }}</td>
                                            <td>{{ $job->supervisor_email }}</td>
                                            <td>{{ $job->supervisor_phone }}</td>
                                            <td>{{ $job->start }}</td>
                                            <td>{{ $job->end }}</td>
                                            <td>{{ $job->contract_type }}</td>
                                            <td>{{ $job->description }}</td>
                                            <td>
                                                @if ($job->applied == 0)
                                                    <form action="{{ route('student.job.apply',$job->id) }}" method="post">
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
                                <th>الراتب</th>
                                <th>المنصب</th>
                                <th>المزود</th>
                                <th>الموقع</th>
                                <th>المشرف</th>
                                <th>البريد الإلكتروني للمشرف</th>
                                <th>هاتف المشرف</th>
                                <th>من</th>
                                <th>إلى</th>
                                <th>نوع العقد</th>
                                <th>الوصف</th>
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