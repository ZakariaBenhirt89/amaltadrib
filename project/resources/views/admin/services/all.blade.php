@extends('layouts.admin')
@section('title','الخدمات')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">الخدمات</h2>
            <a href="{{ route("admin.services.add") }}" class="btn btn-dark shadow-md mb-3">أظف خدمة</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>الإسم</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($services)
                          @foreach ($services as $service)
                            <tr>
                              <td class="text-nowrap">{{ $service->name}}</td>
                              <td>
                                <form action="{{ route("admin.services.delete",$service->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('admin.services.edit',$service->id) }}" class="btn btn-sm btn-info"> تعديل </a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>الإسم</th>
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
