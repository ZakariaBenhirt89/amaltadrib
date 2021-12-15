@extends('layouts.student')
@section('title','لوحة تحكم المستخدم')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @isset($videos)
                @foreach ($videos as $video)
                    <div class="col-md-4 mb-3">
                        <div class="shadow-md border border-warning rounded p-1 bg-warning">
                            <a @if($video->watched) href="{{ route("student.video",$video->id)}}" @endif>
                                <div class="video-box @if(!$video->watched) disabled @endif rounded">
                                    <img src="{{route("resources.video.thumbnail",$video->thumbnail)}}" alt="{{ $video->title }}" alt="{{ $video->title }}" class="img-responsive img w-100">
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
        </div>
    </div>
@endsection