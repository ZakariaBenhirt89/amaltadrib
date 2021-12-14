@extends('layouts.admin')
@section('title','______')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3"> تعديل المدربين </h2>
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
    <form class="col-12" action="{{ route('admin.chefs.update',[$chef->id]) }}" enctype="multipart/form-data" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        @method('PUT')
        <input name="avatar"  class="form-control"  placeholder="avatar" type="file">
        <input name="fname"  class="form-control"  placeholder="fname" type="text" value="{{ $chef->fname }}">
        <input name="lname"  class="form-control"  placeholder="lname" type="text" value="{{ $chef->lname }}">
        <input name="birthday"  class="form-control"  placeholder="birthday" type="date" value="{{ $chef->birthday }}">
        <label >دكر</label>
        <input name="gender"  class="col-6 form-check-input"  value="دكر" type="radio" checked>
        <label >أنثى</label>
        <input name="gender"  class="col-6 form-check-input"  value="أنثى" type="radio">
        <input name="adress"  class="form-control"  placeholder="adress" type="text" value="{{ $chef->adress }}">
        <select name="centers_id"  class="form-control"  >
            @foreach ($centers as $center)
                <option value="{{ $center->id }}"> {{ $center->id.' - '.$center->name }} </option>
                @endforeach
            </select>
            <input class="btn btn-info" type="submit" value="Edit">
        </form>
    </body>
    </html>
</div>
</div>
</div>
@endsection
@section('js')
@endsection
