<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\WatchedVideo;

class VideosController extends Controller
{
        public function index()
        {
            $id = 1;
            $videos = Video::all();
            $watched = WatchedVideo::where('students_id',$id)->get();
            foreach($videos as $key=>$video){
                $videos[$key]->watched=false;
                foreach ($watched as $w) {
                    if($video->id == $w->videos_id){
                        $videos[$key]->watched=true;
                    }
                }
            }
            $data = [
                "videos" => $videos
            ];
            return view('student.videos',$data);
        }

        public function get(Video $video)
        {
            $data = [
                "video" => $video
            ];
            return view('student.video',$data);
        }
}
