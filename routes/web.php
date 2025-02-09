<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SuperAdmin\StudentController;

/* ---------------------------------------------------- Main Routes ---------------------------------------------------- */

Route::get('/', function () {
    return view('main.about');
});


/* ---------------------------------------------------- ------------ ---------------------------------------------------- */



/* ---------------------------------------------------- Admin Routes ---------------------------------------------------- */

Route::group(['prefix' => 'admin', /*'middleware' => 'auth'*/], function () {
    // For Students
    Route::get('/students', [StudentController::class, 'index'])->name('students.admin.index');
});

/* ---------------------------------------------------- ------------ ---------------------------------------------------- */






/* ---------------------------------------------------- For Test ---------------------------------------------------- */

Route::get('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/testabout', function () {
    return view('main.about');
});
