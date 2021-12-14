@extends('layouts.admin')
@section('title','المراكز')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
          <h2 class="h3 mb-3">المراكز</h2>
          <a href="{{ route("admin.centers.add") }}" class="btn btn-dark shadow-md mb-3">أظف مركز</a>
        </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>الإسم</th>
                        <th>العنوان</th>
                        <th>الهاتف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($centers)
                            @foreach ($centers as $center)
                                <tr>
                                    <td>{{ $center->name }}</td>
                                    <td>{{ $center->adress }}</td>
                                    <td><a href="tel:{{ $center->phone }}" class="btn btn-info btn-sm" >{{ $center->phone }}</a></td>
                                    <td>
                                        <form action="{{ route('admin.centers.delete',[$center->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-danger" value="حذف">
                                        </form>
                                        <a href="{{ route('admin.centers.edit',$center->id) }}" class="btn btn-sm btn-info"> تعديل </ض>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>الإسم</th>
                        <th>العنوان</th>
                        <th>الهاتف</th>
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
