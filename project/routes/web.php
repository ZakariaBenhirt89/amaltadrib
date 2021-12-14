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


// Student
Route::prefix("student")->name("student.")->group(function () {
    Route::middleware(['student'])->group(function () {
        // Logout
        Route::get('/logout', [App\Http\Controllers\student\StudentController::class,'logout'])->name("logout");
        // Home
        Route::get('/home', [App\Http\Controllers\student\HomeController::class,'index'])->name("home");
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
        Route::post('/rotations/accept/{monitoring:id}', [App\Http\Controllers\student\RotationController::class,'accept'])->name("rotations.accept");
        Route::get('/jobs',  [App\Http\Controllers\student\JobController::class,'index'])->name("jobs");
        Route::post('/job/apply/{job:id}',  [App\Http\Controllers\student\JobController::class,'apply'])->name("job.apply");
        Route::get('/internships', [App\Http\Controllers\student\InternshipController::class,'index'])->name("internships");
        Route::post('/internship/apply/{internship:id}',  [App\Http\Controllers\student\InternshipController::class,'apply'])->name("internship.apply"); 
    });
});
// use App\Models\Admin;
// use App\Models\Student;
// use App\Helpers\AuthHelper;
// use Illuminate\Support\Facades\Storage;



// Route::get('/', function () {
//     return view('public.welcome');
// });

// Route::post('/students', function ($id) {

// });

Route::prefix('/admin')->name("admin.")->group(function () {
    
    Route::get('/login', function () {return view("admin.login");});
    Route::post('/login', [App\Http\Controllers\admin\AdminController::class,"login"])->name("login");
    // protected
    Route::middleware(['admin'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\admin\AdminController::class,"logout"])->name("logout");
        Route::get('/home', [App\Http\Controllers\admin\HomeController::class,'index'])->name("home");
        // students routes
        Route::prefix("/students")->name("students.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\StudentController::class,'index'])->name('all');
            Route::get('/add', [App\Http\Controllers\admin\StudentController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\StudentController::class,'store'])->name('store');
            Route::get('/edit/{student}', [App\Http\Controllers\admin\StudentController::class,'edit'])->name('edit');
            Route::put('/update/{student}', [App\Http\Controllers\admin\StudentController::class,'update'])->name('update');
            Route::post('/delete/{student}', [App\Http\Controllers\admin\StudentController::class,'delete'])->name('delete');
        });

        // centers routes
        Route::prefix('/centers')->name("centers.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\CenterController::class,'index'])->name('all');
            Route::get('/add', [App\Http\Controllers\admin\CenterController::class,'add'])->name('add');
            Route::post('/store', [App\Http\Controllers\admin\CenterController::class,'store'])->name("store");
            Route::get('/edit/{center}', [App\Http\Controllers\admin\CenterController::class,'edit'])->name('edit');
            Route::put('/update/{center}', [App\Http\Controllers\admin\CenterController::class,'update'])->name('update');
            Route::delete('/delete/{center}', [App\Http\Controllers\admin\CenterController::class,'delete'])->name('delete');
        });

        // chefs routes
        Route::prefix('/chefs')->name("chefs.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ChefController::class,'index'])->name('all');
            Route::get('/add', [App\Http\Controllers\admin\ChefController::class,'add'])->name('add');
            Route::post('/sotre', [App\Http\Controllers\admin\ChefController::class,'store'])->name("store");
            Route::get('/edit/{chef}', [App\Http\Controllers\admin\ChefController::class,'edit'])->name('edit');
            Route::put('/update/{chef}', [App\Http\Controllers\admin\ChefController::class,'update'])->name('update');
            Route::delete('/delete/{chef}', [App\Http\Controllers\admin\ChefController::class,'delete'])->name('delete');
        });

        // videos routes
        Route::prefix('/videos')->name("videos.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\VideoController::class,'index'])->name('all');
            Route::get('/add', [App\Http\Controllers\admin\VideoController::class,'add'])->name("add");
            Route::post('/stroe', [App\Http\Controllers\admin\VideoController::class,'store'])->name("store");
            Route::post('/edit/{video:id}', [App\Http\Controllers\admin\VideoController::class,'edit'])->name("edit");
            Route::post('/update/{video:id}', [App\Http\Controllers\admin\VideoController::class,'update'])->name("update");
            Route::post('/delete/{video:id}', [App\Http\Controllers\admin\VideoController::class,'delete'])->name("delete");
        });
        Route::prefix('/podcasts')->name("podcasts.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\PodcastController::class,'index'])->name("all");
            Route::get('/add', [App\Http\Controllers\admin\PodcastController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\PodcastController::class,'store'])->name("store");
            Route::post('/edit/{podcast:id}', [App\Http\Controllers\admin\PodcastController::class,'edit'])->name("edit");
            Route::post('/update/{podcast:id}', [App\Http\Controllers\admin\PodcastController::class,'update'])->name("update");
            Route::post('/delete/{podcast:id}', [App\Http\Controllers\admin\PodcastController::class,'delete'])->name("delete");
        });
        Route::prefix('/materials')->name("materials.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\MaterialController::class,'index'])->name("all");
            Route::post('/add', [App\Http\Controllers\admin\MaterialController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\MaterialController::class,'store'])->name("store");
            Route::post('/edit/{material:id}', [App\Http\Controllers\admin\MaterialController::class,'edit'])->name("edit");
            Route::post('/update/{material:id}', [App\Http\Controllers\admin\MaterialController::class,'update'])->name("update");
            Route::post('/delete/{material:id}', [App\Http\Controllers\admin\MaterialController::class,'delete'])->name("delete");
        });
        Route::prefix('/jobs')->name("jobs.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\JobController::class,'index'])->name("all");
            Route::post('/add', [App\Http\Controllers\admin\JobController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\JobController::class,'store'])->name("store");
            Route::post('/edit/{job:id}', [App\Http\Controllers\admin\JobController::class,'edit'])->name("edit");
            Route::post('/update/{job:id}', [App\Http\Controllers\admin\JobController::class,'update'])->name("update");
            Route::post('/{job:id}', [App\Http\Controllers\admin\JobController::class,'delete'])->name("delete");
        });
        Route::prefix('/internships')->name("internships.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\InternshipController::class,'index'])->name("all");
            Route::post('/add', [App\Http\Controllers\admin\InternshipController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\InternshipController::class,'store'])->name("store");
            Route::post('/edit/{internship:id}', [App\Http\Controllers\admin\InternshipController::class,'edit'])->name("edit");
            Route::post('/update/{internship:id}', [App\Http\Controllers\admin\InternshipController::class,'update'])->name("update");
            Route::post('/{internship:id}', [App\Http\Controllers\admin\InternshipController::class,'delete'])->name("delete");
        });
        Route::prefix('/monitorings')->name("monitorings.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\MonitoringController::class,'index'])->name("all");
            Route::post('/add', [App\Http\Controllers\admin\MonitoringController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\MonitoringController::class,'store'])->name("store");
            Route::post('/edit/{monitoring:id}', [App\Http\Controllers\admin\MonitoringController::class,'edit'])->name("edit");
            Route::post('/update/{monitoring:id}', [App\Http\Controllers\admin\MonitoringController::class,'update'])->name("update");
            Route::post('/{monitoring:id}', [App\Http\Controllers\admin\MonitoringController::class,'delete'])->name("delete");
        });
        Route::prefix('/services')->name("services.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ServiceController::class,'index'])->name("all");
            Route::post('/add', [App\Http\Controllers\admin\ServiceController::class,'add'])->name("add");
            Route::post('/store', [App\Http\Controllers\admin\ServiceController::class,'store'])->name("store");
            Route::post('/edit/{service:id}', [App\Http\Controllers\admin\ServiceController::class,'edit'])->name("edit");
            Route::post('/update/{service:id}', [App\Http\Controllers\admin\ServiceController::class,'update'])->name("update");
            Route::post('/{service:id}', [App\Http\Controllers\admin\ServiceController::class,'delete'])->name("delete");
        });
    });
});


    //* Resources Routes

    Route::prefix('/resources')->name('resources.')->group(function () {
        Route::get('/podcast/{podcast}', function ($podcast) {
            $filePath = 'resources'.DIRECTORY_SEPARATOR."podcasts".DIRECTORY_SEPARATOR.$podcast; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
            if(!Storage::disk('local')->exists($filePath)){
                return abort(404);
            }
            return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
        })->name("podcast");
    });
    Route::get('/students/avatars/{avatar?}', function ($avatar = null) {        
        if($avatar == null){
            return response()->file("../public/images/student/avatar.png");
        }
        $filePath = 'students'.DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
        if(!Storage::disk('local')->exists($filePath)){
            return abort(404);
        }
        return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
    })->name("student-avatar");
    // ->middleware('authentificated');
    Route::get('/chefs/avatars/{avatar?}', function ($avatar) {
        if($avatar == null){
            return response()->file("../public/images/chefs/avatar.png");
        }
        $filePath = 'chefs'.DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
        if(!Storage::disk('local')->exists($filePath)){
            return abort(404);
        }
        return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
    })->name("admin-avatar");;













/*

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
Route::get("/admin/login",function(){
    echo "hello admin";
});
*/