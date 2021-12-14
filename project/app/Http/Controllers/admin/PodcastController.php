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
        return view("admin.podcasts.all",$data);
    }

    public function add()
    {
        return view("admin.podcasts.add");
    }
    public function edit(Podcast $podcast)
    {
        return view("admin.podcasts.edit",['podcast'=>$podcast]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "durartion" => "required",
            "file" => "required"
        ]);

        $podcastData =[
            "title" => $request->input("title"),
            "durartion" => $request->input("durartion")
        ];
        try {
            $filePath = $request->file('file')->store('resources/podcasts');
            $podcastData['file'] = basename($filePath);
            $podcast = Podcast::create([
                "title" => $podcastData["title"],
                "durartion" => $podcastData["durartion"],
                "file" => $podcastData["file"],
            ]);
            return redirect()->route("admin.podcasts.all");
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([$th->getMessage(),__("message.an unexpected error during upload, please try again")])->withInput();
        }
    }
    public function update(Podcast $podcast,Request $request)
    {
        $request->validate([
            "title" => "required",
        ]);

        $podcastData =[
            "title" => $request->input("title"),
        ];
        Podcast::where('id',$podcast->id)->update($podcastData);
        return redirect()->route("admin.podcasts.all");
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
