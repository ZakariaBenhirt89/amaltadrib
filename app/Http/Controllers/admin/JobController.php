<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Student;
class JobController extends Controller
{
        public function index()
        {
            $data = [
                "jobs" => Job::all()
            ];
            return view("admin.jobs.all",$data);
        }

        public function add()
        {
            $data = [
                "students" => Student::all()
            ];
            return view("admin.jobs.add",$data);
        }
        public function edit(Job $job)
        {
            $data = [
                "students" => Student::all(),
                "job"=>$job
            ];
            return view("admin.jobs.edit",$data);
        }

        public function store(Request $request)
        {
            $request->validate([
                "start" => "required",
                "end" => "required",
                "provider" => "required",
                "address" => "required",
                "student" => "required"
            ]);
            try {
                Job::create([
                    "start" => $request->input("start"),
                    "end" => $request->input("end"),
                    "provider" => $request->input("provider"),
                    "address" => $request->input("address"),
                    "students_id" => $request->input("student")
                ]);
                return redirect()->route("admin.jobs.all");
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors([$th->getMessage(),__("message.an unexpected error, please try again")])->withInput();
            }
        }
        public function update(Job $job,Request $request)
        {
            $request->validate([
                "start" => "required",
                "end" => "required",
                "provider" => "required",
                "address" => "required",
                "student" => "required"
            ]);
            try {
                Job::where("id",$job->id)->update([
                    "start" => $request->input("start"),
                    "end" => $request->input("end"),
                    "provider" => $request->input("provider"),
                    "address" => $request->input("address"),
                    "students_id" => $request->input("student")
                ]);
                return redirect()->route("admin.jobs.all");
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors([$th->getMessage(),__("message.an unexpected error, please try again")])->withInput();
            }
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
