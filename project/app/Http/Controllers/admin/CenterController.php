<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Center;
class CenterController extends Controller
{
    function showCenters()
    {
        $centers = Center::all();
        return view('admin.centers', compact('centers'));
    }
    function showNewCenter(Request $request)
    {
        return view('public.new-centers');
    }
    function addCenter(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
        Center::create($request->all());
        return redirect()->route('admin-centers');
    }
    function showEditCenter(Center $center)
    {
        return view('public.edit-centers',compact('center'));
    }
    function editCenter(Center $center,Request $request)
    {
        // dd($center);
        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
        Center::where("id",$center->id)->update($request->except(['_token','_method']));
        return redirect()->route('admin-centers');
    }
    function deleteCenter(Center $center)
    {
        $center->delete();
        return redirect()->route('admin-centers');
    }
}
