@extends('layouts.admin')
@section('title', 'تعديل ملف')
@section('content')
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3">تعديل ملف</h2>
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
                    <form action="{{ route('admin.materials.update',$material->id) }}" method="POST" enctype="multipart/form-data"
                        style="display: flex;flex-direction:column;gap:10px">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title">العنوان</label>
                                <input type="text" id="title" name="title" value="{{ $material->title }}" class="form-control"
                                    value="{{ old('title') }}" placeholder="العنوان..." />
                                <input type="hidden" name="durartion" value="56" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">الملف:</label>
                                <input type="file" name="file" class="form-control" value="{{ old('file') }}"
                                    placeholder="ملف الصوت..." />
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
@endsection
