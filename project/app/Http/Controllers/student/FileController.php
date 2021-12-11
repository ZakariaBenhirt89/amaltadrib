<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
class FileController extends Controller
{
    public function index(){
        $data = [
            "materials" => Material::all()
        ];
        return view('student.materials',$data);
    }

    public function get(Material $material)
    {
        $data = [
            "material" => $material
        ];
        return view('student.material',$data);
    }
}
