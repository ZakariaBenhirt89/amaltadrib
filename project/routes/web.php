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
App::setLocale("ar");

Route::prefix("/")->name("public.")->group(function () {
    Route::get('/', [App\Http\Controllers\public\HomeController::class,'index'])->name("home");
    Route::get('/about', [App\Http\Controllers\public\AboutController::class,'index'])->name("about");
    Route::get('/contact', [App\Http\Controllers\public\ContactController::class,'index'])->name("contact");
    Route::post('/contact', [App\Http\Controllers\public\ContactController::class,'store'])->name("contact");
    Route::get('/informations-bank', [App\Http\Controllers\public\InformationsBankController::class,'index'])->name("informations-bank");
});



Route::prefix("student")->name("student.")->group(function () {
    Route::get('/login', function () {return "login";})->name("login");
});
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

// Route::get('/', function () {
//     // Student::create([
//     //     // 'username'=>"abc",
//     //     'email'=>"abc@def.gh",
//     //     'password'=>Hash::make("12345678"),
//     //     'avatar'=>"emptySTring",
//     // ]);
//     // Admin::create([
//     //     'username'=>"abc",
//     //     'email'=>"abc@def.gh",
//     //     'password'=>Hash::make("12345678"),
//     //     'avatar'=>"emptySTring",
//     // ]);
//     // $passed = Auth::guard('admin')->attempt(['email' => "abc@def.gh", 'password' => '1234']);
//     // echo json_encode($passed)."<br>";
//     // echo json_encode(Auth::guard('admin')->user())."<br>".get_guard()."<br>";
//     return view('public.welcome');
// });
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
