<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    function index()
    {
        $videos = Video::all();
        return view('admin.videos',compact('videos'));
    }
    function create(){
        $chefs = \App\Models\Chef::all();
        return view('public.new-video',compact('chefs'));
    }
    function store(Request $request){
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

    public function delete(Video $video)
    {
        try {
            $video->delete();
            return redirect()->route("admin.videos.all");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
