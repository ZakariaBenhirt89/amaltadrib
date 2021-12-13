@extends('layouts.student')
@section('title',$video->title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            @isset($video)
                    <div class="col-md-12 mb-3">
                        <h1 class="h3">{{ $video->title}}</h1>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted small">{{ $video->chef->fname }} {{ $video->chef->lname }}</span>
                            <span class="text-muted small">{{ $video->durartion }}h</span>
                        </div>
                        <div class="shadow-md border border-warning rounded p-1 bg-warning">
                            <video width="100%" controls>
                                <source src="{{ route('videos',[$video->file]) }}" type="video/mp4">
                                متصفحك لا يدعم مشغل الفيديو
                            </video>
                        </div>
                    </div>
            @endisset
        </div>
    </div>

    <script>
        const videoId = "video-{{ $video->id }}";
        const video = document.querySelector('video');
        const requiredDuration = 50
        const api = "/"
        video.addEventListener('timeupdate', function() {
            const persentage = video.currentTime / video.duration * 100;
            if( persentage > requiredDuration && localStorage.getItem(videoId) === null ) {
                localStorage.setItem(videoId, true);
                notifyServer();
            }
        });

        function notifyServer(){
            const options = {
                method: 'POST',
                //Todo include id of video
            }
            fetch(api,options);
        }
    </script>
@endsection
