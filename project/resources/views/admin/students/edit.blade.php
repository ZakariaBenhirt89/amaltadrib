@extends('layouts.admin')
@section('title','تعديل المتدربين')
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
        <form action="{{ route('admin.students.update',[$student->id]) }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @method('PUT')
            @csrf
            <input type="file" class="form-control" name="avatar" placeholder="avatar" value="{{ $student->avatar }}"/>
            <input type="text"  class="form-control" name="fname" placeholder="fname" value="{{ $student->fname }}"/>
            <input type="text"  class="form-control" name="lname" placeholder="lname" value="{{ $student->lname }}"/>
            <input type="text"  class="form-control" name="phone" placeholder="phone" value="{{ $student->phone }}"/>
            <input type="date"  class="form-control" name="birthday" placeholder="birthday" value="{{ $student->birthday }}"/>
            <input type="text"  class="form-control" name="level" placeholder="level" value="{{ $student->level }}"/>
            <input type="text"  class="form-control" name="gardian_number" placeholder="gardian_number" value="{{ $student->gardian_number }}"/>
            <input type="text"  class="form-control" name="family_situation" placeholder="family_situation" value="{{ $student->family_situation }}"/>
            <input type="number"  class="form-control" name="number_of_children" placeholder="number_of_children" value="{{ $student->number_of_children }}"/>
            <input type="text"  class="form-control" name="cin_number" placeholder="cin_number" value="{{ $student->cin_number }}"/>
            <input type="text"  class="form-control" name="adress" placeholder="adress" value="{{ $student->adress }}"/>
            <input type="text" class="form-control" name="email" placeholder="email" value="{{ $student->email }}"/>
            <input type="password" class="form-control" name="password" placeholder="password" />
            <textarea rows="5" class="form-control" name="more_details" placeholder="more_details" value="">
                {{ $student->more_details }}
            </textarea>
            <input type="submit" value="Add" class="btn btn-info">
        </form>
    </div>
  </div>
</div>
@endsection
@section('js')
@endsection
