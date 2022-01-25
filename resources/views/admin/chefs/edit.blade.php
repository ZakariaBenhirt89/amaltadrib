@extends('layouts.admin')
@section('title','تعديل المدرب')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3"> تعديل المدرب </h2>
      </div>
      <div class="col-md-12">
        <!---->
        <div class="p-2 shadow-md rounded border border-warning">

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
                @csrf @method('PUT')
                <div class="row">
                    <div class="form-group col-md">
                        <label for="avatar">الصورة الشخصية:</label>
                        <input name="avatar" id="avatar"  class="form-control"  placeholder="avatar" type="file">
                    </div>
                    <div class="form-group col-md">
                        <label for="fname">الإسم:</label>
                        <input name="fname" id="fname"  class="form-control"  placeholder="الإسم..." type="text" value="{{ $chef->fname }}">
                    </div>
                    <div class="form-group col-md">
                        <label for="lname">النسب:</label>
                        <input name="lname" id="lname"  class="form-control"  placeholder="النسب..." type="text" value="{{ $chef->lname }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="birthday">تاريخ الإزدياد:</label>
                        <input name="birthday"  class="form-control"  placeholder="birthday" type="date" value="{{ $chef->birthday }}">
                        <div class="form-control">
                            <label for="gender">نوع الجنس:</label>
                            <div class="row m-0">
                                <div class="form-check col-md-auto">
                                    <label for="mal" class="form-check-label ms-1" >ذكر</label>
                                    <input style="float: none;" name="gender" @if($chef->gender == "ذكر") checked="true" @endif id="mal" class="form-check-input"  value="ذكر" type="radio">
                                </div>
                                <div class="form-check col-md-auto">
                                    <label for="fmal" class="form-check-label ms-1" >أنثى</label>
                                    <input style="float: none;" id="fmal"  @if($chef->gender == "أنثى") checked="true" @endif name="gender" class="form-check-input"  value="أنثى" type="radio">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="">
                            <label for="adress">العنوان:</label>
                        <input name="adress" id="adress"  class="form-control"  placeholder="العنوان..." type="text" value="{{ $chef->adress }}">
                        </div>
                        <div class="">
                            <label for="status">الوضعية:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" @if( $chef->status == 1) selected="true" @endif>فعال</option>
                                <option value="0" @if( $chef->status == 0) selected="true" @endif>غير فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <label for="center">المركز:</label>
                        <select name="centers_id" id="center" class="form-control"  >
                            @foreach ($centers as $center)
                                <option value="{{ $center->id }}"> {{ $center->id.' - '.$center->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <input class="btn btn-info" type="submit" value="تعديل">
                    </div>
                </div>
            </form>
        </div>
    </body>
    </html>
</div>
</div>
</div>
@endsection
@section('js')
@endsection
