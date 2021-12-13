<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
class MaterialController extends Controller
{

    public function index()
    {
        $data = [
            "materials" => Material::all()
        ];
        return view("admin.materials",$data);
    }

    public function delete(Material $material)
    {
        try {
            $material->delete();
            return redirect()->route("admin.materials.all");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
