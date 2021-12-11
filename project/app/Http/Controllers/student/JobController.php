<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AuthHelper;
use App\Models\Job;
class JobController extends Controller
{
    public function index()
    {
        $id = AuthHelper::loggedUser()->id;
        $data = [
            "jobs" => Job::where('students_id',$id)->get()
        ];
        return view('student.job',$data);
    }
    
    public function apply(Job $job)
    {
        $job->applied = true;
        $job->save();
        return redirect()->route('student.jobs');
    }
}
