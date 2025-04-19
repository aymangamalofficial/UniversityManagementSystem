<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;
use App\Models\Instructor;

class MaterialController extends Controller
{
    protected function getdepartments()
    {
        return Department::all();
    }


    protected function getAssInstructor()
    {
        return Instructor::where('role_id', 0)->get();
    }

    protected function getDrInstructor()
    {
        return Instructor::where('role_id', 1)->get();
    }

    public function index()
    {
        $departments = $this->getdepartments();
        return view('admins.materials', compact('departments'));
    }
    public function show(Request $request)
    {

        $department_id = $request->input('department_id');
        $year = $request->input('year');
        $semester = $request->input('semester');
        $courses = Course::where('department_id', $department_id)
            ->where('year', $year)
            ->where('semester_id', $semester)
            ->get() ?? collect([]);
            $departments = $this->getdepartments();
            $doctors = $this->getDrInstructor();
            $assistants = $this->getAssInstructor();
        return view('admins.materials', compact('courses','departments','doctors','assistants'));
    }
    public function update(Request $request)
    {
        $course_id = $request->input('course_id');
        $doctor_id = $request->input('doc');
        $assistant_id = $request->input('assist');
        $course = Course::find($course_id);
        if ($doctor_id != 0) {
            $course->doctor_id = $doctor_id;
        }
        if ($assistant_id != 0) {
            $course->assistant_id = $assistant_id;
        }
        $course->save();
        return redirect()->back()->with('msg','تم التحديث بنجاح');
    }
}
