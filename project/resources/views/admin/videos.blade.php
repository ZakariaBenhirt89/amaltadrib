@extends('layouts.admin')
@section('title','فيديوهات')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">فيديوهات</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th>المدرب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($videos)
                          @foreach ($videos as $video)
                            <tr>
                              <td><img src="{{ $video->thumbnail }}" width="30" height="30" class="mx-3" alt="">{{ $video->title }}</td>
                              <td>{{ $video->durartion }}</td>
                              <td><a target="_blank" href="{{ $video->file }}" class="btn btn-primary btn-sm">عرض</a></td>
                              <td>{{ $video->chef->fname }} {{ $video->chef->lname }}</td>
                              <td>
                                <form action="{{ route("admin.videos.delete",$video->id) }}" method="post">
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
                        <th>المدرب</th>
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