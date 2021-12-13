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
            Route::get('/', [App\Http\Controllers\admin\StudentController::class,'showStudents'])->name('all');
            Route::post('/', [App\Http\Controllers\admin\StudentController::class,'addStudent']);
            Route::get('/new', [App\Http\Controllers\admin\StudentController::class,'showAddStudent'])->name('students_add');
            Route::get('/{student}/edit', [App\Http\Controllers\admin\StudentController::class,'showEditStudent'])->name('students_edit');
            Route::put('/{student}', [App\Http\Controllers\admin\StudentController::class,'editStudent'])->name('students_action_edit');
            Route::post('/{student}', [App\Http\Controllers\admin\StudentController::class,'deleteStudent'])->name('delete');
        });

        // centers routes
        Route::prefix('/centers')->name("centers.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\CenterController::class,'showCenters'])->name('all');
            Route::post('/', [App\Http\Controllers\admin\CenterController::class,'addCenter']);
            Route::get('/new', [App\Http\Controllers\admin\CenterController::class,'showNewCenter'])->name('centers_new');
            Route::get('/{center}/edit', [App\Http\Controllers\admin\CenterController::class,'showEditCenter'])->name('centers_edit');
            Route::put('/{center}', [App\Http\Controllers\admin\CenterController::class,'editCenter'])->name('centers_action_edit');
            Route::delete('/{center}', [App\Http\Controllers\admin\CenterController::class,'delete'])->name('delete');
        });

        // chefs routes
        Route::prefix('/chefs')->name("chefs.")->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ChefController::class,'showChefs'])->name('all');
            Route::post('/', [App\Http\Controllers\admin\ChefController::class,'addChefs']);
            Route::get('/new', [App\Http\Controllers\admin\ChefController::class,'showNewChefs'])->name('chefs_new');
            Route::get('/{chef}/edit', [App\Http\Controllers\admin\ChefController::class,'showEditChefs'])->name('chefs_edit');
            Route::put('/{chef}', [App\Http\Controllers\admin\ChefController::class,'editChef'])->name('chefs_action_edit');
            Route::delete('/{chef}', [App\Http\Controllers\admin\ChefController::class,'deleteChef'])->name('delete');
        });

        // videos routes
        Route::prefix('/videos')->name("videos.")->group(function () {
            Route::get('/videos', [App\Http\Controllers\admin\VideoController::class,'index'])->name('all');
            Route::get('/videos/new', [App\Http\Controllers\admin\VideoController::class,'showAddVideos'])->name('admin-videos_new');
            Route::post('/videos', [App\Http\Controllers\admin\VideoController::class,'addVideos']);
            Route::post('/{video:id}', [App\Http\Controllers\admin\VideoController::class,'delete'])->name("delete");
        });
        Route::prefix('/podcasts')->name("podcasts.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
            Route::post('/{podcast:id}', [App\Http\Controllers\admin\PodcastController::class,'delete'])->name("delete");
        });
        Route::prefix('/materials')->name("materials.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
            Route::post('/{material:id}', [App\Http\Controllers\admin\MaterialController::class,'delete'])->name("delete");
        });
        Route::prefix('/jobs')->name("jobs.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
        });
        Route::prefix('/internships')->name("internships.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
        });
        Route::prefix('/monitorings')->name("monitorings.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
        });
        Route::prefix('/services')->name("services.")->group(function () {
            Route::get('/', function () {return "////";})->name("all");
        });
    });
});

/*
    //* Resources Routes
    Route::get('/students/avatars/{avatar}', function ($avatar) {
        $filePath = 'students'.DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
        if(!Storage::disk('local')->exists($filePath)){
            return abort(404);
        }
        return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
    })->name("student-avatar");
    // ->middleware('authentificated');
    Route::get('/chefs/avatars/{avatar}', function ($avatar) {
        $filePath = 'chefs'.DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar; //config('filesystems.disks.local.root').DIRECTORY_SEPARATOR."students".DIRECTORY_SEPARATOR."avatars".DIRECTORY_SEPARATOR.$avatar;
        if(!Storage::disk('local')->exists($filePath)){
            return abort(404);
        }
        return response()->file(storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.$filePath);
    })->name("admin-avatar");;
*/












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