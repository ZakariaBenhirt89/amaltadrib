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
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            '_thumbnail' => 'nullable|regex:/(data:image\/[^;]+;base64[^"]+)/',
            'chefs_id' => 'exists:chefs,id|required',
        ]);
        $videoPath = $request->file('file')->store('videos');
        $thumbnailDirectory = 'videos/thumbnails';
        $thumbnailPath = null;
        // dd([!$request->has('thumbnail') && !$request->has('_thumbnail'),$request->has('thumbnail') ,$request->has('_thumbnail')]);
        if(!isset($request->thumbnail) && !isset($request->_thumbnail)){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'thumbnail' => ['thumbnail field is required'],
            ]);
            return throw $error;
        }
        if($request->hasFile('thumbnail')){
            $thumbnailPath = $request->file('thumbnail')->store($thumbnailDirectory);
        }else if($request->has('_thumbnail')){
            $videoExtension = $request->file('file')->extension();
            $thumbnailFile = file_get_contents($request->input('_thumbnail'));
            $thumbnailName = $thumbnailDirectory."/".basename($videoPath,'.'.$videoExtension).'.jpg';
            Storage::disk('local')->put( $thumbnailName,$thumbnailFile );
            $thumbnailPath = $thumbnailName;
        }
        Video::create([
            'title' => $request->title,
            'durartion' => $request->durartion,
            'file' => basename($videoPath),
            'thumbnail' => basename($thumbnailPath),
            'chefs_id' => $request->chefs_id,
        ]);
        return redirect()->route('admin-videos');
    }
    function showEditVideos(Video $video){
        $chefs = \App\Models\Chef::all();
        return view('public.edit-video',compact('chefs','video'));
    }

    function editVideo(Video $video,Request $request){
        $this->validate($request,[
            'title' => 'required',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'chefs_id' => 'exists:chefs,id|required',
        ]);
        $thumbnail  = isset($request->thumbnail) ? basename($request->file('thumbnail')->store('videos/thumbnails')) : $video->thumbnail;
        $video->update([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'chefs_id' => $request->chefs_id,
        ]);
        return redirect()->route('admin-videos');
    }
    function deleteVideo(Video $video){
        $video->delete();
        return redirect()->route('admin-videos');
    }
}
