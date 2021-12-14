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

        public function store(Request $request)
        {
            $request->validate([
                "title" => "required",
                "salary" => "required",
                "position" => "required",
                "provider" => "required",
                "location" => "required",
                "supervisor" => "required",
                "supervisor_email" => "required",
                "supervisor_phone" => "required",
                "start" => "required",
                "end" => "required",
                "contract_type" => "required",
                "description" => "required",
                "student" => "required"
            ]);
            try {
                Job::create([
                    "title" => $request->input("title"),
                    "salary" => $request->input("salary"),
                    "position" => $request->input("position"),
                    "provider" => $request->input("provider"),
                    "location" => $request->input("location"),
                    "supervisor" => $request->input("supervisor"),
                    "supervisor_email" => $request->input("supervisor_email"),
                    "supervisor_phone" => $request->input("supervisor_phone"),
                    "start" => $request->input("start"),
                    "end" => $request->input("end"),
                    "contract_type" => $request->input("contract_type"),
                    "description" => $request->input("description"),
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
