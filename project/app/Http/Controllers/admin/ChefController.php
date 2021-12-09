<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Chef;
class ChefController extends Controller
{
    function showChefs()
    {
        $chefs = Chef::all();
        return view('public.show-chefs',['chefs'=>$chefs]);
    }
    function showNewChefs()
    {
        return view('public.new-chefs');
    }
}
