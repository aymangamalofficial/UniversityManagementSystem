<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CreatController extends Controller
{
    public function generatePassword()
    {
        return Hash::make('password');
    }
}


