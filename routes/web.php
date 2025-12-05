<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SuperAdmin\StudentController;
use App\Http\Controllers\SuperAdmin\MaterialController;
use App\Http\Controllers\SuperAdmin\HomeController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\SuperAdmin\MembersController;
use App\Http\Controllers\SuperAdmin\SettingsController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\QRController;
use App\Http\Controllers\Instructor\MaterialsController;
use App\Http\Controllers\Student\QrController as QrControllerForSTD;
use App\Http\Controllers\Student\HomeController as StudentHomeController;

// use Illuminate\Support\Facades\Artisan;
// if (Artisan::call('migrate:status') === 1):

//     Route::get('/{any?}', function() {
//         Artisan::call('migrate');
//         return view('main.home');
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

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Route::get('/code', function () {
//     return view('auth.code');
// })->name('codeblade');
// Route::get('/password', [CreatController::class, 'generatePassword']);

/* ---------------------------------------------------- ------------ ---------------------------------------------------- */
Route::post('/login', [LoginController::class, 'index'])->name('check.login');
Route::post('/signup', [SignupController::class, 'index'])->name('check.signup');
Route::post('/check', [SignupController::class, 'check'])->name('check.code');
Route::post('/password', [SignupController::class, 'password'])->name('create.password');

/* ---------------------------------------------------- Admin Routes ---------------------------------------------------- */

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    // For Admins
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

/* ---------------------------------------------------- Student Routes ---------------------------------------------------- */
Route::group(['prefix' => 'student', 'middleware' => 'auth:student'], function () {

    Route::get('/qr', function () {
        return view('student.stdprofile.QRlogin');
    })->name('students.stdprofile.QRlogin');

    Route::get('/', [StudentHomeController::class, 'profile'])->name('students.stdprofile.profile');

    Route::get('/dash', [StudentHomeController::class, 'index'])->name('students.stddashboard.dash');

    Route::get('/assignment', function () {
        return view('student.stddashboard.assignment');
    })->name('students.stddashboard.assignment');

    Route::get('/absence', function () {
        return view('student.stddashboard.absence');
    })->name('students.stddashboard.absence');

    Route::get('/result', [StudentHomeController::class, 'results'])->name('students.stddashboard.result');
    Route::post('/result', [StudentHomeController::class, 'DegreesForCourse'])->name('students.stddashboard.DegreesForCourse');

    // Route ::get('/dash', function () {
    //     return view('student.stddashboard.dash');
    // })->name('students.stddashboard.dash');

    Route ::get('/final', function () {
        return view('student.stddashboard.final');
    })->name('students.stddashboard.final');

Route ::get('/settings', function () {
        return view('student.stddashboard.settings');
    })->name('students.stddashboard.settings');

    Route::post('/qr/scan', [QrControllerForSTD::class, 'scan'])->name('students.qr.scan');

    // Route::get('/', function () {
    //     return view('student.home');
    // })->name('student.home');



});

/* ---------------------------------------------------- Instructor Routes ---------------------------------------------------- */
Route::group(['prefix' => 'instructor', 'middleware' => 'auth:instructor'], function () {

    Route::get('/qr', function () {
        return view('instructors.qr');
    })->name('instructors.qr');


        Route::get('/', [ProfileController::class, 'index'])->name('instructors.profile');

        Route::get('/assignment', function () {
            return view('instructors.assignment');
        })->name('instructors.assignment');

        Route::get('/absence', [QRController::class, 'absencePage'])->name('instructors.absence');
        // Route::get('/courses-by-year', [QRController::class, 'getCoursesForYear'])->name('instructors.courses_by_year');

        Route::get('/result', function () {
            return view('instructors.result');
        })->name('instructors.result');

        Route::get('/dash', [MaterialsController::class, 'index'])->name('instructors.dash');
        Route::post('/materials/upload/{course}', [MaterialsController::class, 'upload'])->name('materials.upload');

        Route::post('/qr/generate', [QRController::class, 'generate'])->name('instructors.qr.generate');



// Route::get('/', function () {
//     return view('instructor.home');
// })->name('instructor.home');

Route::get('/qr', function () {
    return view('instructors.qr');
})->name('instructors.qr');
});

/* ---------------------------------------------------- For Test ---------------------------------------------------- */

Route::get('/code', [CodeController::class, 'createcode']);
// Route::post('/check', [CodeController::class, 'checkcode'])->name('checkcode');
Route::get('/testabout', function () {
    return view('welcome');
});





// TEST FOR TEST
Route::get('/ayman', function () {
    return view('auth.signin');
});
Route::get('/code', [CodeController::class, 'createcode']);
Route::get('/createadmin', [TestController::class, 'createadmin']);














Route::get('/t', function () {
    return view('email.simple_email');
})->name('profile');











Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/materials/upload', [MaterialsController::class, 'upload'])->name('materials.upload');
