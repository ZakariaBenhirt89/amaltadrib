<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\WatchedVideo;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    function index(){
        $students = Student::all();
        return view('admin.students.all',['students'=>$students]);
    }
    function add(){
        return view('admin.students.add');
    }
    function edit(Student $student){
        return view('admin.students.edit',['student'=>$student]);
    }
    function store(Request $request){
        // dd($request);
        $request->validate([
            "avatar"=>"mimes:jpg,jpeg,png",
            "fname"=>"required",
            "lname"=>"required",
            "phone"=>"",
            "birthday"=>"",
            "level"=>"",
            "gardian_number"=>"",
            "family_situation"=>"",
            "number_of_children"=>"",
            "cin_number"=>"",
            "adress"=>"",
            "email"=>"required|unique:students",
            "password"=>"required|min:6",
            "more_details"=>"",
        ]);
        $studentData = $request->except('avatar');
        if($request->hasFile('avatar')){
            $imageName = $request->file('avatar')->store('students/avatars');
            $studentData['avatar'] = basename($imageName);
        }
        $studentData['password'] = Hash::make($studentData['password']);
        $student = Student::create($studentData);
        $video = Video::orderBy('id','ASC')->first();
        if($video){
            WatchedVideo::updateOrCreate([
                "videos_id" => $video->id,
                "students_id" => $student->id
            ]);
        }
        return redirect()->route('admin.students.all');
    }
    function update(Student $student,Request $request){
        // dd($request);
        $request->validate([
            "avatar"=>"mimes:jpg,jpeg,png",
            "fname"=>"required",
            "lname"=>"required",
            "phone"=>"",
            "birthday"=>"",
            "level"=>"",
            "gardian_number"=>"",
            "family_situation"=>"",
            "number_of_children"=>"",
            "cin_number"=>"",
            "adress"=>"",
            "email"=>"required|unique:students,email,".$student->id,
            "password"=>"required|min:6",
            "more_details"=>"",
        ]);
        $studentData = [
            "fname"=>$request->fname,
            "lname"=>$request->lname,
            "phone"=>$request->phone,
            "level"=>$request->level,
            "gardian_number"=>$request->gardian_number,
            "family_situation"=>$request->family_situation,
            "number_of_children"=>$request->number_of_children,
            "cin_number"=>$request->cin_number,
            "adress"=>$request->adress,
            "email"=>$request->email,
            "more_details"=>$request->more_details,
        ];
        if($request->hasFile('avatar')){
            $imageName = $request->file('avatar')->store('students/avatars');
            $studentData['avatar'] = basename($imageName);
        }
        if(isset($request->password)){
            $studentData['password'] = Hash::make($request->password);
        }
        if(isset($request->birthday)){
            $studentData['birthday'] = $request->birthday;
        }
        // $imageName = $request->file('avatar')->store('students/avatars');
        Student::where('id',$student->id)->update($studentData);
        return redirect()->route('admin.students.all');
    }
    function delete(Student $student){
        $student->delete();
        return redirect()->route('admin.students.all');
    }
}
