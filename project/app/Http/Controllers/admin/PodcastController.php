<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Podcast;
class PodcastController extends Controller
{
    public function index()
    {
        $data = [
            "podcasts" => Podcast::all()
        ];
        return view("admin.podcasts",$data);
    }

    public function delete(Podcast $podcast)
    {
        try {
            $podcast->delete();
            return redirect()->route("admin.podcasts.all");
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
