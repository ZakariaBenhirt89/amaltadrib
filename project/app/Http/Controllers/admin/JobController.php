<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
        public function index()
        {
            $data = [
                "jobs" => Job::all()
            ];
            return view("admin.jobs",$data);
        }
        public function delete(Job $job)
        {
            try {
                $job->delete();
                return redirect()->route("admin.jobs");
            } catch (\Throwable $th) {
                return redirect()->back();
            }
        }
}
