@extends('layouts.student')
@section('title','بودكاستات')
@section('content')
    <div class="container-fluid">
        <div class="row">
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
                                        <source src="{{ $podcast->file }}" type="audio/wave">
                                            متصفحك لا يدعم مشغل الصوت.
                                    </audio>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection