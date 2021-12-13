<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;
class InternshipController extends Controller
{
    public function index(){
        $data = [
            "internships" => Internship::all()
        ];
        return view("admin.internships",$data);
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
