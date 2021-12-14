<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Podcast;
use App\Models\Material;
use App\Models\WatchedVideo;
use App\Helpers\AuthHelper;
class HomeController extends Controller
{
    public function index()
    {
        $id = AuthHelper::loggedUser()->id;
        $videos = Video::all();
        $watched = WatchedVideo::where('students_id',$id)->get();
        if($videos->count() == 1){
            $videos[0]->watched = true;
        }else{
            foreach($videos as $key=>$video){
                $videos[$key]->watched=false;
                foreach ($watched as $w) {
                    if($video->id == $w->videos_id){
                        $videos[$key]->watched=true;
                    }
                }
            }
        }
        $data = [
            "videos" => $videos,
            "podcasts" => Podcast::all(),
            "materials" => Material::all()
        ];
        return view('student.home',$data);
    }
}
