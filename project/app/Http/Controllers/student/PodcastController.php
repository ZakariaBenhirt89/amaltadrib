<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
class PodcastController extends Controller
{
    public function index(){
        $data = [
            "podcasts" => Podcast::all()
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
}
