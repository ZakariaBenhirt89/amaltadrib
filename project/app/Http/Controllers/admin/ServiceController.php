<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            "services" => Service::all()
        ];
        return view("admin.services.all",$data);
    }

    public function add()
    {
        return view("admin.services.add");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required"
        ]);
        try {
            Service::create([
                "name" => $request->input("title")
            ]);
            return redirect()->route("admin.services.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([__("message.an unexpected error, please try again")])->withInput();
        }
    }

    public function delete(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route("admin.services.all");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
