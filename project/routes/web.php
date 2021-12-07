<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Admin;


function get_guard(){
    if(Auth::guard('admin')->check())
        {
            return "admin";
        }
    return null;
}

Route::get('/', function () {
    // Admin::create([
    //     'username'=>"abc",
    //     'email'=>"abc@def.gh",
    //     'password'=>Hash::make("1234"),
    //     'avatar'=>"emptySTring",
    // ]);
    // $passed = Auth::guard('admin')->attempt(['email' => "abc@def.gh", 'password' => '1234']);
    // echo json_encode($passed)."<br>";
    echo json_encode(Auth::guard('admin')->user())."<br>".get_guard()."<br>";
    return view('public.welcome');
});
