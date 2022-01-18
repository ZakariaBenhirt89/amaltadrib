@extends('layouts.admin')
@section('title','______')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">تعديل المركز</h2>
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
    <form action="{{ route('admin.centers.update',[$center->id]) }}" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md">
                <input name="name" class="form-control" placeholder="name" type="text" value="{{ $center->name }}">
            </div>
            <div class="form-group col-md">
                <input name="adress" class="form-control" placeholder="adress" type="text" value="{{ $center->adress }}">
            </div>
            <div class="form-group col-md">
                <input name="phone" class="form-control" placeholder="phone" type="text" value="{{ $center->phone }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="submit" class="btn btn-sm btn-info" value="حفظ">
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
@section('js')
@endsection
