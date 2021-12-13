@extends('layouts.admin')
@section('title','ملفات تربوية')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">ملفات تربوية</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>النوع</th>
                        <th>الملف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($materials)
                          @foreach ($materials as $material)
                            <tr>
                              <td>{{ $material->title}}</td>
                              <td>{{ $material->extention}}</td>
                              <td><a href="{{ $material->file}}" download="true" class="btn btn-sm btn-dark">تحميل</a></td>
                              <td>
                                <form action="{{ route("admin.materials.delete",$material->id) }}" method="post">
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
                        <th>النوع</th>
                        <th>الملف</th>
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