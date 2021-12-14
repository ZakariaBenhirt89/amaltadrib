<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Center;
class CenterController extends Controller
{
    function index()
    {
        $centers = Center::all();
        return view('admin.centers.all', compact('centers'));
    }
    function add(Request $request)
    {
        return view('admin.centers.add');
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
        Center::create($request->all());
        return redirect()->route('admin.centers.all');
    }
    function edit(Center $center)
    {
        return view('admin.edit-centers',compact('center'));
    }
    function update(Center $center,Request $request)
    {
        // dd($center);
        $request->validate([
            'name' => 'required|max:255',
            'adress' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
        Center::where("id",$center->id)->update($request->except(['_token','_method']));
        return redirect()->route('admin.centers');
    }
    function delete(Center $center)
    {
        $center->delete();
        return redirect()->route('admin.centers.all');
    }
}
