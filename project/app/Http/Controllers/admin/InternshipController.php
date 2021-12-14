<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Student;
class InternshipController extends Controller
{
    public function index(){
        $data = [
            "internships" => Internship::all()
        ];
        return view("admin.internships.all",$data);
    }

    public function add()
    {
        $data = [
            "students" => Student::all()
        ];
        return view("admin.internships.add",$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "provider" => "required",
            "start" => "required",
            "end" => "required",
            "supervisor" => "required",
            "supervisor_email" => "required",
            "supervisor_phone" => "required",
            "student" => "required",
            "goals" => "required",
            "guidlines" => "required"
        ]);

        try {
            Internship::create([
                "title" => $request->input("title"),
                "provider" => $request->input("provider"),
                "start" => $request->input("start"),
                "end" => $request->input("end"),
                "supervisor" => $request->input("supervisor"),
                "supervisor_email" => $request->input("supervisor_email"),
                "supervisor_phone" => $request->input("supervisor_phone"),
                "students_id" => $request->input("student"),
                "goals" => $request->input("goals"),
                "guidlines" => $request->input("guidlines")
            ]);
            return redirect()->route("admin.internships.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([$th->getMessage(),__("message.an unexpected error, please try again")])->withInput();
        }
    }
    public function delete(Internship $internship){
        try {
            $internship->delete();
            return redirect()->route("admin.internships");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
