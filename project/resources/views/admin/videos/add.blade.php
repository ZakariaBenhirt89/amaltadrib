@extends('layouts.admin')
@section('title','أضف فيديو')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أضف فيديو</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
            @endif
        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">العنوان</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="العنوان..." />
                    <input type="hidden" name="durartion" value="167.89" />
                </div>
                <div class="form-group col-md-6">
                    <label for="">المدرب:</label>
                    <select type="date" name="chefs_id" class="form-control form-select" >
                        <option value="" selected disabled>المدرب...</option>
                        @foreach($chefs as $chef)
                        <option value="{{ $chef->id }}">{{ $chef->fname.' '.$chef->lname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">الفيديو:</label>
                    <input type="file" name="file" class="form-control" placeholder="الفيديو..." />
                </div>
                <div class="form-group col-md-6">
                    <label for="">صورة مصغرة:</label>
                    <input type="file" class="form-control" name="thumbnail" value="lorem" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-dark" value="حفظ">
                </div>
            </div>
        </form>
</div>
</div>
</div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/datatable.js') }}"></script>
@endsection