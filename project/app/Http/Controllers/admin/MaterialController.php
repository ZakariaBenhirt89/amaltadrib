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
        return view("admin.materials.all",$data);
    }

    public function add()
    {
        return view("admin.materials.add");
    }
    public function edit(Material $material)
    {
        return view("admin.materials.edit",['material'=>$material]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "file" => "required"
        ]);
        try {
            $matarialData = [
                "title" => $request->input("title"),
                "extention" => $request->file('file')->getClientOriginalExtension()
            ];
            $filePath = $request->file('file')->store('resources/materials');
            $matarialData['file'] = basename($filePath);
            Material::create([
                "title" => $matarialData["title"],
                "file" => $matarialData["file"],
                "extention" => $matarialData["extention"]
            ]);
            return redirect()->route("admin.materials.all");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function update(Material $material,Request $request)
    {
        $request->validate([
            "title" => "required",
            "file" => "nullable"
        ]);
        try {
            $matarialData = [
                "title" => $request->input("title"),
            ];
            if($request->hasFile('file')){
                $filePath = $request->file('file')->store('resources/materials');
                $matarialData['extention'] = $request->file('file')->getClientOriginalExtension();
                $matarialData['file'] = basename($filePath);
            }
            Material::where("id",$material->id)->update($matarialData);
            return redirect()->route("admin.materials.all");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
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
