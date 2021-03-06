<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitoring;
use App\Helpers\AuthHelper;
class RotationController extends Controller
{
    public function index()
    {
        $studentId = AuthHelper::loggedUser()->id;
        $data = [
            "monitorings" => Monitoring::where('students_id',$studentId)->with(['student'])->get()
        ];
        return view("student.rotations",$data);
    }
}
