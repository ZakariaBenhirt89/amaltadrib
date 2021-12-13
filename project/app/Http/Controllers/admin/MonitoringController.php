<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitoring;
class MonitoringController extends Controller
{
    public function index()
    {
        $data = [
            "monitorings" => Monitoring::all()
        ];
        return view("admin.monitorings",$data);
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
