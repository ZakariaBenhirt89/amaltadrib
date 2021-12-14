<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Student;
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
            "phone"=>"required",
            "birthday"=>"date",
            "level"=>"",
            "gardian_number"=>"required",
            "family_situation"=>"",
            "number_of_children"=>"integer",
            "cin_number"=>"required",
            "adress"=>"required",
            "email"=>"required|unique:students",
            "password"=>"required|min:6",
            "more_details"=>"",
        ]);
        $studentData = $request->except('avatar');
        if($request->hasFile('avatar')){
            // $imageName = Storage::disk('local')->put('students/avatars', $request->avatar);
            $imageName = $request->file('avatar')->store('students/avatars');
            // dd([$imageName,basename($imageName)]);
            $studentData['avatar'] = basename($imageName);
        }
        $studentData['password'] = Hash::make($studentData['password']);
        Student::create($studentData);
        return redirect()->route('admin.students.all');
    }
    function update(Student $student,Request $request){
        // dd($request);
        $request->validate([
            // "avatar"=>"mimes:jpg,jpeg,png",
            // "fname"=>"",
            // "lname"=>"",
            // "phone"=>"",
            // "birthday"=>"date",
            // "level"=>"",
            // "gardian_number"=>"",
            // "family_situation"=>"",
            // "number_of_children"=>"integer",
            // "cin_number"=>"",
            // "adress"=>"",
            // "email"=>"unique:students",
            "password"=>"required|string|min:6",
            // "more_details"=>"",
        ]);
        $studentData = ['password'=>$request->password];
        $studentData['password'] = Hash::make($studentData['password']);
        Student::where('id',$student->id)->update($studentData);
        return redirect()->route('admin.students.all');
    }
    function delete(Student $student){
        $student->delete();
        return redirect()->route('admin.students.all');
    }
}
