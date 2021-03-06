@extends('layouts.admin')
@section('title','ملفات تربوية')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">ملفات تربوية</h2>
            <a href="{{ route("admin.materials.add") }}" class="btn btn-dark shadow-md mb-3">أظف ملف</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>الملف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($materials)
                          @foreach ($materials as $material)
                            <tr>
                              <td>{{ $material->title}}</td>
                              <td><a href="{{ route("resources.material",$material->file)}}" download="{{ $material->title}}" class="btn btn-sm btn-dark">تحميل</a></td>
                              <td>
                                <form action="{{ route("admin.materials.delete",$material->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.materials.edit',$material->id) }}"> تعديل </a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
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
