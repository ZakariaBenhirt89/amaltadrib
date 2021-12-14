<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitoring;
use App\Models\Student;
use App\Models\Service;
class MonitoringController extends Controller
{
    public function index()
    {
        $data = [
            "monitorings" => Monitoring::all()
        ];
        return view("admin.monitorings.all",$data);
    }

    public function add()
    {
        $data = [
            "students" => Student::all(),
            "services" => Service::all()
        ];
        return view("admin.monitorings.add",$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "place" => "required",
            "start" => "required",
            "end" => "required",
            "service" => "required",
            "student" => "required",
            "description" => "required"
        ]);
        try {
            Monitoring::create([
                "title" => $request->input('title'),
                "place" => $request->input('place'),
                "start" => $request->input('start'),
                "end" => $request->input('end'),
                "services_id" => $request->input('service'),
                "students_id" => $request->input('student'),
                "description" => $request->input('description'),
            ]);
            return redirect()->route("admin.monitorings.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([$th->getMessage(),__("message.")])->withInput();
        }
    }

    public function delete(Monitoring $monitoring)
    {
        try {
            $monitoring->delete();
            return redirect()->route("admin.monitorings.all");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
