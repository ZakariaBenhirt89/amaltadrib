<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Chef;
use \App\Models\Center;
class ChefController extends Controller
{
    function showChefs()
    {
        $chefs = Chef::all();
        return view('public.show-chefs',['chefs'=>$chefs]);
    }
    function showNewChefs()
    {
        $centers = Center::all();
        return view('public.new-chefs',compact('centers'));
    }
    function addChefs(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpg,jpeg,png',
            'fname' => 'required',
            'lname' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'adress' => 'required',
            'centers_id' => 'required|exists:centers,id'
        ]);
        $filePath =$request->file('avatar')->store('chefs/avatars');
        $chefData = $request->except(['_token']);
        $chefData['avatar'] = basename($filePath);
        Chef::create($chefData);
        return redirect()->route('admin-chefs');
    }
    function showEditChefs(Chef $chef){
        $centers = Center::all();
        return view('public.edit-chefs',compact('chef','centers'));
    }
    function editChef(Chef $chef,Request $request){
        $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png',
            'fname' => 'required',
            'lname' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'adress' => 'required',
            'centers_id' => 'required|exists:centers,id'
        ]);
        $chefData = $request->except(["avatar",'_token',"_method"]);
        if($request->hasFile('avatar')){
            $filePath =$request->file('avatar')->store('chefs/avatars');
            $chefData['avatar'] = basename($filePath);
        }
        Chef::where('id',$chef->id)->update($chefData);
        return redirect()->route('admin-chefs');
    }

    function deleteChef(Chef $chef){
        $chef->delete();
        return redirect()->route('admin-chefs');
    }
}
