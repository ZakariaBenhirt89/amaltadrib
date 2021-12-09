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
use Illuminate\Support\Facades\Storage;



Route::get('/', function () {
    return view('public.welcome');
});

Route::post('/students', function ($id) {

});

Route::prefix('admin')->group(function () {
    // students routes
    Route::get('students', [App\Http\Controllers\admin\StudentController::class,'showStudents'])->name('admin-students');
    Route::post('students', [App\Http\Controllers\admin\StudentController::class,'addStudent']);
    Route::get('students/new', [App\Http\Controllers\admin\StudentController::class,'showAddStudent'])->name('admin-students_add');
    Route::get('students/{student}/edit', [App\Http\Controllers\admin\StudentController::class,'showEditStudent'])->name('admin-students_edit');
    Route::put('students/{student}', [App\Http\Controllers\admin\StudentController::class,'editStudent'])->name('admin-students-action_edit');
    Route::delete('students/{student}', [App\Http\Controllers\admin\StudentController::class,'deleteStudent'])->name('admin-students-action_delete');

    // chefs routes
    Route::get('chefs', [App\Http\Controllers\admin\ChefController::class,'showChefs'])->name('admin-chefs');
    Route::get('chefs/new', [App\Http\Controllers\admin\ChefController::class,'showNewChefs'])->name('admin-chefs_new');

    // centers routes
    Route::get('centers', [App\Http\Controllers\admin\CenterController::class,'showCenters'])->name('admin-centers');
    Route::post('centers', [App\Http\Controllers\admin\CenterController::class,'addCenter']);
    Route::get('centers/new', [App\Http\Controllers\admin\CenterController::class,'showNewCenter'])->name('admin-centers_new');
    Route::get('centers/{center}/edit', [App\Http\Controllers\admin\CenterController::class,'showEditCenter'])->name('admin-centers_edit');
    Route::put('centers/{center}', [App\Http\Controllers\admin\CenterController::class,'editCenter'])->name('admin-centers-action_edit');
    Route::delete('centers/{center}', [App\Http\Controllers\admin\CenterController::class,'deleteCenter'])->name('admin-centers-action_delete');
});

Route::get('/students/avatars/{avatar}', function ($avatar) {
    $filePath = 'students'.DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
    if(!Storage::disk('local')->exists($filePath)){
        return abort(404);
    }
    return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
})->middleware('authentificated');


















// For testing Authentification
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

// function get_guard(){
//     if(Auth::guard('admin')->check())
//         {
//             return "admin";
//         }
//     return null;
// }

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
