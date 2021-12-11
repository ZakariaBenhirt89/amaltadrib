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
    Route::get('/login', function () {return view("public.login");})->name("login");
    Route::post('/login', [App\Http\Controllers\student\StudentController::class,'login'])->name("login");
    Route::get('/', [App\Http\Controllers\public\HomeController::class,'index'])->name("home");
    Route::get('/about', [App\Http\Controllers\public\AboutController::class,'index'])->name("about");
    Route::get('/contact', [App\Http\Controllers\public\ContactController::class,'index'])->name("contact");
    Route::post('/contact', [App\Http\Controllers\public\ContactController::class,'store'])->name("contact");
    // Route::get('/informations-bank', [App\Http\Controllers\public\InformationsBankController::class,'index'])->name("informations-bank");
});



Route::prefix("student")->name("student.")->group(function () {
    // Logout
    Route::get('/logout', function () {return "logout";})->name("logout");
    // Home
    Route::get('/home', function () {return view('student.home');})->name("home");
    // Videos
    Route::get('/videos', [App\Http\Controllers\student\VideoController::class,'index'])->name("videos");
    Route::get('/video/{video:id}', [App\Http\Controllers\student\VideoController::class,'get'])->name("video");
    // Podcasts
    Route::get('/podcasts', [App\Http\Controllers\student\PodcastController::class,'index'])->name("podcasts");
    Route::get('/podcast/{podcast:id}', [App\Http\Controllers\student\PodcastController::class,'get'])->name("podcast");
    // Files
    Route::get('/files', [App\Http\Controllers\student\FileController::class,'index'])->name("files");
    Route::get('/file/{file:id}', [App\Http\Controllers\student\FileController::class,'get'])->name("file");
    Route::get('/rotations', [App\Http\Controllers\student\RotationController::class,'index'])->name("rotations");
    Route::get('/jobs',  [App\Http\Controllers\student\JobController::class,'index'])->name("jobs");
    Route::post('/job/apply/{job:id}',  [App\Http\Controllers\student\JobController::class,'apply'])->name("job.apply");
    Route::get('/internships', [App\Http\Controllers\student\InternshipController::class,'index'])->name("internships");
    Route::post('/internship/apply/{internship:id}',  [App\Http\Controllers\student\InternshipController::class,'apply'])->name("internship.apply");
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
