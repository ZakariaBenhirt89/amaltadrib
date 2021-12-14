@extends('layouts.admin')
@section('title', 'المدربين')
@section('content')
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3">المدربين</h2>
            </div>
            <div class="col-md-12">
                <div class="p-2 shadow-md rounded border border-warning">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                                <th>الإسم</th>
                                <th>النسب</th>
                                <th>تاريخ الميلاد</th>
                                <th>الجنس</th>
                                <th>العنوان</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @isset($chefs)
                                    @foreach ($chefs as $chef)
                                        <tr>
                                            <td>{{ $chef->fname }}</td>
                                            <td>{{ $chef->lname }}</td>
                                            <td>{{ $chef->birthday }}</td>
                                            <td>{{ $chef->gender }}</td>
                                            <td>{{ $chef->adress }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.chefs.delete', [$chef->id]) }}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                                                </form>
                                                <a href="{{ route('admin.chefs.edit',$chef->id) }}" class="btn btn-info btn-sm"> تعديل </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                            <tfoot>
                                <th>الإسم</th>
                                <th>النسب</th>
                                <th>تاريخ الميلاد</th>
                                <th>الجنس</th>
                                <th>العنوان</th>
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
