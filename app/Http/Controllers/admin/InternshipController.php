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
    public function edit(Internship $internship)
    {
        $data = [
            "students" => Student::all(),
            "internship"=> $internship
        ];
        return view("admin.internships.edit",$data);
    }

    public function update(Internship $internship,Request $request)
    {
        $request->validate([
            "start" => "required",
            "end" => "required",
            "provider" => "required",
            "address" => "required",
            "student" => "required"
        ]);

        try {
            Internship::where("id",$internship->id)->update([
                "start" => $request->input("start"),
                "end" => $request->input("end"),
                "provider" => $request->input("provider"),
                "address" => $request->input("address"),
                "students_id" => $request->input("student")
                
            ]);
            return redirect()->route("admin.internships.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([__("message.an unexpected error, please try again")])->withInput();
        }
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
            Internship::create([
                "start" => $request->input("start"),
                "end" => $request->input("end"),
                "provider" => $request->input("provider"),
                "address" => $request->input("address"),
                "students_id" => $request->input("student")
            ]);
            return redirect()->route("admin.internships.all");
        } catch (Exception $th) {
            $th.getMessage();
            // return redirect()->back()->withErrors([__("message.an unexpected error, please try again")])->withInput();
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
