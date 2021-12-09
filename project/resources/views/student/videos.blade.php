@extends('layouts.student')
@section('title','لوحة تحكم المستخدم')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @isset($videos)
                @foreach ($videos as $video)
                    <div class="col-md-4 mb-3">
                        <div class="shadow-md border border-warning rounded p-1 bg-warning">
                            <div class="video-box rounded">
                                <img src="{{asset('images/video-thumbnails.png')}}" alt="{{ $video->title }}" class="img-responsive img w-100">
                                <div class="details">
                                    <h2 class="h5 text-white">{{ $video->title }}</h2>
                                    <div class="text-end d-block w-100">
                                        <span class="chef text-light small ms-auto">{{ $video->chefs_id }}</span>,
                                        <span class="duration text-light small ms-auto">{{ $video->durartion }}h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection