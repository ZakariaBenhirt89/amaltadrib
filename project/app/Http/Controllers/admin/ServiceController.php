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
        return view("admin.services",$data);
    }

    public function delete(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route("admin.services");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
