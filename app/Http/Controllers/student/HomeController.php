<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Podcast;
use App\Models\Material;
use App\Models\WatchedVideo;
use App\Models\WatchedPodcast;
use App\Helpers\AuthHelper;
class HomeController extends Controller
{
    public function index()
    {
        $id = AuthHelper::loggedUser()->id;
        $videos = Video::limit(6)->get();
        $watched = WatchedVideo::where('students_id',$id)->get();
            foreach($videos as $key=>$video){
                $videos[0]->watched = true;
                $videos[$key]->watched=false;
                foreach ($watched as $w) {
                    if($video->id == $w->videos_id){
                        $videos[$key]->watched=true;
                    }else if($key > 0 && $videos[$key-1]->id == $w->videos_id){
                        $videos[$key]->watched=true;
                    }
                }
            }
        $podcasts = Podcast::limit(6)->get();
        $watched = Watchedpodcast::where('students_id',$id)->get();
            foreach($podcasts as $key=>$podcast){
                $podcasts[0]->watched = true;
                $podcasts[$key]->watched=false;
                foreach ($watched as $w) {
                    if($podcast->id == $w->podcasts_id){
                        $podcasts[$key]->watched=true;
                    }else if($key > 0 && $podcasts[$key-1]->id == $w->podcasts_id){
                        $podcasts[$key]->watched=true;
                    }
                }
            }
        $data = [
            "videos" => $videos,
            "podcasts" => $podcasts,
            "materials" => Material::limit(6)->get()
        ];
        return view('student.home',$data);
    }
}
