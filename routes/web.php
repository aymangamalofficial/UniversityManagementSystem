<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/', function () {
    return view('welcome');
});
