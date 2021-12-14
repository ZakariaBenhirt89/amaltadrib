@extends('layouts.admin')
@section('title','______')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">تعديل المتدربين</h2>
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
        <input name="name" class="form-control" placeholder="name" type="text" value="{{ $center->name }}">
        <input name="adress" class="form-control" placeholder="adress" type="text" value="{{ $center->adress }}">
        <input name="phone" class="form-control" placeholder="phone" type="text" value="{{ $center->phone }}">
        <input type="submit" class="btn btn-sm btn-info" value="Edit">
    </form>
</div>
</div>
</div>
@endsection
@section('js')
@endsection
