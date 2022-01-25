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
    public function edit(Monitoring $monitoring)
    {
        $data = [
            "students" => Student::all(),
            "services" => Service::all(),
            "monitoring"=> $monitoring
        ];
        return view("admin.monitorings.edit",$data);
    }

    public function update(Monitoring $monitoring,Request $request)
    {
        $request->validate([
            "code" => "required",
            "title" => "required",
            "basic_recipes" => "required",
            "duration" => "required",
            "result" => "",
            "status" => "required",
            "service" => "required",
            "student" => "required",
        ]);
        try {
            Monitoring::where('id',$monitoring->id)->update([
                "code" => $request->input('code'),
                "title" => $request->input('title'),
                "basic_recipes" => $request->input('basic_recipes'),
                "duration" => $request->input('duration'),
                "result" => $request->input('result'),
                "status" => $request->input('status'),
                "services_id" => $request->input('service'),
                "students_id" => $request->input('student')
            ]);
            return redirect()->route("admin.monitorings.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([$th->getMessage(),__("message.")])->withInput();
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            "code" => "required",
            "title" => "required",
            "basic_recipes" => "required",
            "duration" => "required",
            "result" => "",
            "status" => "required",
            "service" => "required",
            "student" => "required",
        ]);
        try {
            Monitoring::create([
                "code" => $request->input('code'),
                "title" => $request->input('title'),
                "basic_recipes" => $request->input('basic_recipes'),
                "duration" => $request->input('duration'),
                "result" => $request->input('result'),
                "status" => $request->input('status'),
                "services_id" => $request->input('service'),
                "students_id" => $request->input('student')
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
