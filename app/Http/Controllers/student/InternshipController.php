<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AuthHelper;
use App\Models\Internship;
class InternshipController extends Controller
{
    public function index()
    {
        $id = AuthHelper::loggedUser()->id;
        $data = [
            "internships" => Internship::where("students_id",$id)->get()
        ];
        return view("student.internships",$data);
    }
    public function apply(Internship $internship)
    {
        $internship->applied = true;
        $internship->save();
        return redirect()->route('student.internships');
    }
}
