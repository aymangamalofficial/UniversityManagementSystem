<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SuperAdmin\StudentController;
use App\Http\Controllers\SuperAdmin\MaterialController;
use App\Http\Controllers\SuperAdmin\HomeController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\SuperAdmin\MembersController;
use App\Http\Controllers\SuperAdmin\SettingsController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\TestController;


// if (Artisan::call('migrate:status') === 1):

//     Route::get('/{any?}', function() {
//         Artisan::call('migrate');
//         return view('home.index');
//     });

// endif;

/* ---------------------------------------------------- Main Routes ---------------------------------------------------- */

Route::get('/', function () {
    return view('main.home');
})->name('home');


Route::get('/about', function () {
    return view('main.about');
})->name('about');

Route::get('/FacaultyOfIndustryAndEnergy', function () {
    return view('main.collage1');
})->name('collage1');

Route::get('/FacaultyOfAppliedHealthScience', function () {
    return view('main.collage2');
})->name('collage2');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');

// Route::get('/code', function () {
//     return view('auth.code');
// })->name('codeblade');

// Route::get('/password', [CreatController::class, 'generatePassword']);
/* ---------------------------------------------------- ------------ ---------------------------------------------------- */

Route::post('/login', [LoginController::class, 'index'])->name('check.login');
Route::post('/check', [LoginController::class, 'check'])->name('check.code');
Route::post('/password', [LoginController::class, 'password'])->name('create.password');

/* ---------------------------------------------------- Admin Routes ---------------------------------------------------- */

Route::group(['prefix' => 'admin', /*'middleware' => 'auth'*/], function () {
    // For Students
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/members', [MembersController::class, 'index'])->name('members.admin.index');
    Route::post('/members', [MembersController::class, 'add'])->name('members.admin.add');
    Route::post('/members/edit', [MembersController::class, 'edit'])->name('members.admin.edit');
    Route::post('/members/del', [MembersController::class, 'del'])->name('members.admin.del');
    Route::get('/students', [StudentController::class, 'index'])->name('students.admin.index');
    Route::post('/students', [StudentController::class, 'add'])->name('students.admin.add');
    Route::post('/students/del', [StudentController::class, 'del'])->name('students.admin.del');
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.admin.index');
    Route::post('/materials', [MaterialController::class, 'show'])->name('materials.admin.show');
    Route::post('/materials/update', [MaterialController::class, 'update'])->name('materials.admin.update');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.admin.index');
    Route::post('/settings', [SettingsController::class, 'add'])->name('settings.admin.add');
});

/* ---------------------------------------------------- ------------ ---------------------------------------------------- */


/* ---------------------------------------------------- For Test ---------------------------------------------------- */

Route::get('/code', [CodeController::class, 'createcode']);
// Route::post('/check', [CodeController::class, 'checkcode'])->name('checkcode');
Route::get('/testabout', function () {
    return view('welcome');
});





// TEST FOR TEST
Route::get('/ayman', function () {
    return view('welcome');
});
Route::get('/code', [CodeController::class, 'createcode']);
Route::get('/tester', [TestController::class, 'index']);
