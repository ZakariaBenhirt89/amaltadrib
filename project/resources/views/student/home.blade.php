@extends('layouts.student')
@section('title','لوحة تحكم المستخدم')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>الفيدوهات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">
                      @isset($videos)
                          {{ $videos->count() }}
                      @else
                      0
                      @endisset  
                      </span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-play-circle"></i>
                      </div>
                    </div>
                    <div class="small text-muted"> أشرطة فيديو تدريبية</div>
                  </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>البودكاستات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">
                        @isset($podcasts)
                          {{ $podcasts->count() }}
                      @else
                      0
                      @endisset  </span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-microphone-alt"></i>
                      </div>
                    </div>
                    <div class="small text-muted"> بودكاست على منصة أمل تدرب</div>
                  </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="shadow-md rounded border-warning border p-3">
                    <div class=""><strong>الملفات</strong></div>
                    <div class="d-flex justify-content-between">
                      <div class="count"><span class="display-3 text-dark">@isset($materials)
                        {{ $materials->count() }}
                    @else
                    0
                    @endisset  </span></div>
                      <div class=" h1 display-3 text-warning">
                        <i class="fa fa-folder-open"></i>
                      </div>
                    </div>
                    <div class="small text-muted">ملفات التربوية</div>
                  </div>
            </div>
        </div>
        <div class="row my-3">
          <div class="col-md-12"><h2 class="h5 mb-3">فيديوهات أمل</h2></div>
            @isset($videos)
                @foreach ($videos as $video)
                    <div class="col-md-4 mb-3">
                        <div class="shadow-md border border-warning rounded p-1 bg-warning">
                            <a @if($video->watched) href="{{ route("student.video",$video->id)}}" @endif>
                                <div class="video-box @if(!$video->watched) disabled @endif rounded">
                                    <img src="{{asset('images/video-thumbnails.png')}}" alt="{{ $video->title }}" class="img-responsive img w-100">
                                    <div class="details">
                                        <h2 class="h5 text-white">{{ $video->title }}</h2>
                                        <div class="text-end d-block w-100">
                                            <span class="chef text-light small ms-auto">{{ $video->chef->fname }} {{ $video->chef->lname }}</span>,
                                            <span class="duration text-light small ms-auto">{{ $video->durartion }}h</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
          <div class="col-md-12 text-center text-md-start">
            <a href="{{ route("student.videos") }}" class="btn btn-warning">أظهر المزيد</a>
          </div>
        </div>
        <div class="row my-3">
          <div class="col-md-12"><h2 class="h5 mb-3">بودكاستات</h2></div>
          @isset($podcasts)
                @foreach ($podcasts as $podcast)
                    <div class="col-md-4 mb-3">
                        <div class="shadow-md bg-light rounded border-warning border px-2 py-3">
                            <a @if($podcast->watched) href="{{ route("student.podcast",$podcast->id)}}" @endif>
                                <div class="podcast-box @if(!$podcast->watched) disabled @endif rounded">
                                    <div class="details">
                                        <h2 class="h5 text-dark">{{ $podcast->title }}</h2>
                                    </div>
                                    <audio controls class="w-100">
                                        <source src="{{ $podcast->title }}" type="audio/wave">
                                            متصفحك لا يدعم مشغل الصوت.
                                    </audio>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
          <div class="col-md-12 text-center text-md-start">
            <a href="{{ route("student.podcasts") }}" class="btn btn-warning">أظهر المزيد</a>
          </div>
        </div>
        <div class="row my-3">
          <div class="col-md-12"><h2 class="h5 mb-3">ملفات تربوية</h2></div>
          @isset($materials)
                @foreach ($materials as $material)
                <div class="col-md-4 col-lg-3 col-sm-6 mb-3 text-center">
                    <div class="file shadow-lg p-3 rounded bg-white">
                      <div class="thumbnail">
                        <img width="120" src="{{asset('images/file-icons/'.$material->extention.'.png')}}" alt="file icon">
                        <span class="extention">.{{ $material->extention }}</span>
                      </div>
                      <div class="text-dark h5 title">{{ $material->title }}</div>
                      <div class="download">
                        <a href="{{ $material->file }}" download="{{ $material->title }}" class="btn btn-warning w-100"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                            <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"></path>
                          </svg>
                          تحميل الملف
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endisset
          <div class="col-md-12 text-center text-md-start">
            <a href="{{ route("student.files") }}" class="btn btn-warning">أظهر المزيد</a>
          </div>
        </div>
    </div>
@endsection