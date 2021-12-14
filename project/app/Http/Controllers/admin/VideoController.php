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
        return view('admin.videos.all',compact('videos'));
    }
    function add(){
        $chefs = \App\Models\Chef::all();
        return view('admin.videos.add',compact('chefs'));
    }
    function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'durartion' => 'numeric|required',
            'file' => 'mimes:mp4,mov,ogg|required',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            // '_thumbnail' => 'nullable|regex:/(data:image\/[^;]+;base64[^"]+)/',
            'chefs_id' => 'exists:chefs,id|required',
        ]);
        $videoPath = $request->file('file')->store('resources/videos');
        $thumbnailDirectory = 'resources/videos/thumbnails';
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
        return redirect()->route('admin.videos.all');
    }
    function edit(Video $video){
        $chefs = \App\Models\Chef::all();
        return view('admin.videos.edit',compact('chefs','video'));
    }

    function update(Video $video,Request $request){
        $this->validate($request,[
            'title' => 'required',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'chefs_id' => 'required|exists:chefs,id|required',
        ]);
        $thumbnail  = isset($request->thumbnail) ? basename($request->file('thumbnail')->store('videos/thumbnails')) : $video->thumbnail;
        $video->update([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'chefs_id' => $request->chefs_id,
        ]);
        return redirect()->route('admin.videos.all');
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
