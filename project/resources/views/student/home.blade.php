@extends('layouts.student')
@section('title','لوحة تحكم المستخدم')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>الفيدوهات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">2</span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-play-circle"></i>
                      </div>
                    </div>
                    <div class="small text-muted"> الفيدوهات التي تم إتمامها حتى الآن</div>
                  </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>البودكاستات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">2</span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-microphone-alt"></i>
                      </div>
                    </div>
                    <div class="small text-muted"> البودكاستات التي تم الإستماع إليها حتى الآن</div>
                  </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>الملفات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">2</span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-folder-open"></i>
                      </div>
                    </div>
                    <div class="small text-muted">مجموع الملفات التربوية التي تم تحميلها حتى الآن</div>
                  </div>
            </div>
        </div>
    </div>
@endsection