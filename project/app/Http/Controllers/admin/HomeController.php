<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Chef;
use App\Models\Video;
use App\Models\Job;
use App\Models\Podcast;
use App\Models\Material;
use App\Models\Service;
use App\Models\Internship;
class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "students" => Student::all(),
            "chefs" => Chef::all(),
            "videos" => Video::all(),
            "jobs" => Job::all(),
            "podcasts" => Podcast::all(),
            "materials" => Material::all(),
            "services" => Service::all(),
            "internships" => Internship::all(),
        ];
        return view("admin.home",$data);
    }
}
