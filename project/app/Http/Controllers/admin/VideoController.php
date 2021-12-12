<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    function showVideos()
    {
        $videos = Video::all();
        return view('public.show-videos',compact('videos'));
    }
    function showAddVideos(){
        $chefs = \App\Models\Chef::all();
        return view('public.new-video',compact('chefs'));
    }
    function addVideos(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'durartion' => 'numeric|required',
            'file' => 'mimes:mp4,mov,ogg|required',
            'thumbnail' => 'required',
            'chefs_id' => 'exists:chefs,id|required',
        ]);
        $filePath = $request->file('file')->store('videos');

        // from base64 to image
        $thumbnail = $request->thumbnail;
        $thumbnail = str_replace('data:image/png;base64,', '', $thumbnail);
        $thumbnail = str_replace(' ', '+', $thumbnail);
        $thumbnail = base64_decode($thumbnail);
        $thumbnailPath = Storage::disk('public')->put('thumbnail.png', $thumbnail);


        // $thumbnailFile = base64_decode($request->thumbnail);
        // $thumbnailPath = Storage::disk('local')->put('videos/thumbnails.jpg',$thumbnailFile);
        dd([$filePath,basename($filePath),$thumbnailPath]);
    }
}
