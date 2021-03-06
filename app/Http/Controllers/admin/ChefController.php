<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Chef;
use \App\Models\Center;
class ChefController extends Controller
{
    function index()
    {
        $chefs = Chef::all();
        return view('admin.chefs.all',['chefs'=>$chefs]);
    }
    function add()
    {
        $centers = Center::all();
        return view('admin.chefs.add',compact('centers'));
    }
    function store(Request $request)
    {
        $request->validate([
            'avatar' => 'mimes:jpg,jpeg,png',
            'fname' => 'required',
            'lname' => 'required',
            'birthday' => 'date',
            'gender' => 'required',
            'adress' => '',
            'centers_id' => 'required|exists:centers,id'
        ]);
        $chefData = $request->except(['_token']);
        if($request->hasFile("avatar")){
            $filePath =$request->file('avatar')->store('chefs/avatars');
            $chefData['avatar'] = basename($filePath);
        }
        Chef::create($chefData);
        return redirect()->route('admin.chefs.all');
    }
    function edit(Chef $chef){
        $centers = Center::all();
        return view('admin.chefs.edit',compact('chef','centers'));
    }
    function update(Chef $chef,Request $request){
        $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png',
            'fname' => 'required',
            'lname' => 'required',
            'birthday' => 'nullable|date',
            'gender' => 'required',
            'adress' => 'required',
            'centers_id' => 'required|exists:centers,id'
        ]);
        // dd($request);
        $chefData = $request->except(["avatar",'_token',"_method","birthday"]);
        if($request->hasFile('avatar')){
            $filePath =$request->file('avatar')->store('chefs/avatars');
            $chefData['avatar'] = basename($filePath);
        }
        if($request->birthday !== null ){
            $chefData['birthday'] = $request->birthday;
        }
        Chef::where('id',$chef->id)->update($chefData);
        return redirect()->route('admin.chefs.all');
    }

    function delete(Chef $chef){
        $chef->delete();
        return redirect()->route('admin.chefs.all');
    }
}
