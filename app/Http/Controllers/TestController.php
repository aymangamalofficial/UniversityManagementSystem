<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index()
    {
        return fake()->randomNumber(6,true);
    }
    public function createadmin()
    {
        $admin = new Student();
        $admin->name = 'student';
        $admin->code = '425885218';
        $admin->national_id = '425885218';
        $admin->email = 'student@gmail.com';
        $admin->password = Hash::make('123456');
        $admin->year = 1;
        $admin->department_id  = 1;
        // $admin->role_id = 1;
        $admin->save();
    }
}
