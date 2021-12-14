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
    public function delete(Internship $internship){
        try {
            $internship->delete();
            return redirect()->route("admin.internships");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
