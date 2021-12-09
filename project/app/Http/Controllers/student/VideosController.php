<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{
        public function index()
        {
            $data = [
                "videos" => Video::get()
            ];
            return view('student.videos',$data);
        }
}
