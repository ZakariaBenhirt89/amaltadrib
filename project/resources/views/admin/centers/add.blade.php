@extends('layouts.admin')
@section('title','أضف مركز')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
<div class="col-md-12">
    <h2 class="h3 mb-3">أضف مركز</h2>
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
      <form action="{{ route('admin.centers.store') }}" method="POST" style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">الإسم:</label>
                <input required value="{{ old("name") }}" name="name" placeholder="الإسم..." type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">العنوان:</label>
                <input required value="{{ old("adress") }}" name="adress" placeholder="العنوان..." type="text" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">الهاتف:</label>
                <input required value="{{ old("phone") }}" name="phone" placeholder="الهاتف..." type="tel" class="form-control">
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