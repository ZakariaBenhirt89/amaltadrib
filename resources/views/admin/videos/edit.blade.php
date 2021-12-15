@extends('layouts.admin')
@section('title',' تعديل الفيديوهات')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3"> تعديل الفيديوهات </h2>
      </div>
      <div class="col-md-12">
        <!---->
        @if($errors->any())
        <div class="col-8 mx-auto mb-5">
            <ul class="list-group">
                @foreach ($errors->all() as $item)
                <li class="list-group-item text-danger text-center">{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.videos.update',[$video->id]) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <input type="text" class="form-control" name="title" placeholder="title" value="{{ $video->title }}" />
            <label for="">Thumbnail</label>
            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control" name="thumbnail" placeholder="file"/>
            <select type="date"  class="form-control" name="chefs_id" placeholder="chefs_id" >
                @foreach($chefs as $chef)
                <option value="{{ $chef->id }}" {{ $chef->id == $video->chefs_id ? "selected" : "" }}> {{ $chef->fname.' '.$chef->lname }} </option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-sm btn-info" value="Edit">
        </form>
    </body>
    </html>

</div>
</div>
</div>
@endsection
@section('js')
@endsection
