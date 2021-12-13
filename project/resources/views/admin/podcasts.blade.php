@extends('layouts.admin')
@section('title','بودكاستات')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">بودكاستات</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($podcasts)
                          @foreach ($podcasts as $podcast)
                            <tr>
                              <td>{{ $podcast->title }}</td>
                              <td>{{ $podcast->duration }}</td>
                              <td>
                                <audio controls>
                                  <source src="{{ $podcast->file }}" type="audio/mp4">
                                </audio>
                              </td>
                              <td>
                                <form action="{{ route("admin.podcasts.delete",$podcast->id) }}" method="post">
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
                        <th>المدة الزمنية</th>
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