<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\WatchedPodcast;
use App\Helpers\AuthHelper;
class PodcastController extends Controller
{
    public function index(){
        // $data = [
        //     "podcasts" => Podcast::all()
        // ];
        // return view('student.podcasts',$data);
        $id = AuthHelper::loggedUser()->id;
        $podcasts = Podcast::all();
        $watched = WatchedPodcast::where('students_id',$id)->get();
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
            "podcasts" => $podcasts
        ];
        return view('student.podcasts',$data);
    }

    public function get(Podcast $podcasts)
    {
        $data = [
            "podcast" => $podcast
        ];
        return view('student.podcast',$data);
    }

    public function watched($id){
        WatchedPodcast::updateOrCreate([
            "podcasts_id" => $id,
            "students_id" => AuthHelper::loggedUser()->id
        ]);
        return true;
    }
}
