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
use App\Models\Student;
use App\Helpers\AuthHelper;

// function get_guard(){
//     if(Auth::guard('admin')->check())
//         {
//             return "admin";
//         }
//     return null;
// }

Route::get('/', function () {
    // Student::create([
    //     // 'username'=>"abc",
    //     'email'=>"abc@def.gh",
    //     'password'=>Hash::make("12345678"),
    //     'avatar'=>"emptySTring",
    // ]);
    // Admin::create([
    //     'username'=>"abc",
    //     'email'=>"abc@def.gh",
    //     'password'=>Hash::make("12345678"),
    //     'avatar'=>"emptySTring",
    // ]);
    // $passed = Auth::guard('admin')->attempt(['email' => "abc@def.gh", 'password' => '1234']);
    // echo json_encode($passed)."<br>";
    // echo json_encode(Auth::guard('admin')->user())."<br>".get_guard()."<br>";
    echo AuthHelper::getGuard()."<br>";
    echo json_encode(AuthHelper::loggedUser()).'<br>';
    return view('welcome');
});
Route::get('/something',function (){
    echo "From a protected route !!!!";
})->middleware('authentificated');
Route::post('/admin/login',[App\Http\Controllers\admin\AdminController::class,'adminLogin'])->name('adminlogin');
Route::post('/student/login',[App\Http\Controllers\student\StudentController::class,'studentLogin'])->name('studentlogin');
Route::get('/admin',function (){
    echo "only admin can access here";
})->middleware('admin');
Route::get('/student',function (){
    echo "only student can access here";
})->middleware('student');
