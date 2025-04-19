<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Department;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        $Instructors = Instructor::orderByDesc('created_at')->get()?? collect([]);
        $lastInstructors = $Instructors->take(3)?? collect([]);
        $NumberOfDoctors = $Instructors->where('role_id',1)->count()?? collect([]);
        $NumberOfAssistants = $Instructors->where('role_id',0)->count()?? collect([]);
        // $NumberOfDepartments = $Instructors->groupBy('department_id')->count();
        $NumberOfDepartments = Department::all()->count()?? collect([]);
        $NumberOfStudents = Student::all()->count()?? collect([]);
        return view('admins.home',compact('lastInstructors','NumberOfDoctors','NumberOfAssistants','NumberOfDepartments','NumberOfStudents'));
    }
}
