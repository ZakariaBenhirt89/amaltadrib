@extends('layouts.student')
@section('title','بودكاستات')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @isset($podcasts)
                @foreach ($podcasts as $key=>$podcast)
                    <div class="col-md-4 mb-3">
                        <div class=" @if(!$podcast->watched) disabled-box @endif shadow-md bg-light rounded border-warning border px-2 py-3">
                            {{-- <a @if($podcast->watched) href="{{ route("student.podcast",$podcast->id)}}" @endif> --}}
                                <div class="podcast-box rounded">
                                    <div class="details">
                                        <h2 class="h5 text-dark">{{ $podcast->title }}</h2>
                                    </div>
                                    <audio @if(!$podcast->watched) disabled="true" style="pointer-events:none" @endif data-id="{{ $podcast->id }}" controls class="w-100">
                                        <source src="{{ route("resources.podcast",$podcast->file) }}">
                                            متصفحك لا يدعم مشغل الصوت.
                                    </audio>

                                </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
    <script>


        const audios = document.querySelectorAll("audio");
        audios.forEach(audio => {
            const audioId = "audio-"+audio.dataset.id;
            const requiredDuration = 1
            const api = "{{url('/student/podcast/watched/')}}/"+audio.dataset.id
            audio.addEventListener('timeupdate', function() {
                const persentage = audio.currentTime / audio.duration * 100;
                if( persentage > requiredDuration && localStorage.getItem(audioId) === null ) {
                    localStorage.setItem(audioId, true);
                    notifyServer(api);
                }
            });
        });

        function notifyServer(api){
            const options = {
                method: 'GET',
                //Todo include id of audio
            }
            console.log("sent");
            fetch(api,options);
        }
    </script>
    <style>
        .disabled-box{
            position: relative;
            overflow: hidden;
            cursor: not-allowed;
            user-select: none;
        }
        .disabled-box:after {
            content: "\f023";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            inset-block: 0px;
            inset-inline: 0px;
            background-color: #18113c80;
            z-index: 0;
            transition: .3s;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            font-size: 2rem;
        }
    </style>
@endsection
