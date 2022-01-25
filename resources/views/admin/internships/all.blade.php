@extends('layouts.admin')
@section('title','سطاج')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="h3 mb-3">سطاج</h2>
            <a href="{{ route("admin.internships.add") }}" class="btn btn-dark shadow-md mb-3">أظف سطاج</a>
          </div>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>من</th>
                        <th>إلى</th>
                        <th>إسم المقر</th>
                        <th>العنوان</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($internships)
                          @foreach ($internships as $internship)
                            <tr>
                              <td class="text-nowrap">{{ $internship->start}}</td>
                              <td class="text-nowrap">{{ $internship->end}}</td>
                              <td class="text-nowrap">{{ $internship->provider}}</td>
                              <td class="text-nowrap">{{ $internship->address}}</td>
                              <td>
                                <form class="m-0 d-inline-block" action="{{ route("admin.internships.delete",$internship->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.internships.edit',$internship->id) }}"> تعديل </a>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>من</th>
                        <th>إلى</th>
                        <th>إسم المقر</th>
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
