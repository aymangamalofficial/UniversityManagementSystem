<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Instructor; // Assuming you have an Instructor model

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::guard('instructor')->user();
        if (!$data) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
        // You can pass the instructor data to the view if needed
        return view('instructors.profile', ['instructor' => $data]);
    }
    
}
