<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest('created_at')->get() ?? collect([]);
        // dd($students);
        return view('admins.students', compact('students'));
    }

    public function add(Request $request)
    {
        $student = new Student();
        $student->name = $request->student_name;
        $student->national_id = $request->national_id;
        $student->code = $request->code;
        $student->year = $request->student_year;
        $student->department_id = $request->student_department;
        $student->save();
        return redirect()->back()->with('msg','تمت اضافة '.$request->student_name.' بنجاح');
    }

    public function del(Request $request)
    {
        $student = Student::find($request->student_id);
        $student->delete();
        return redirect()->back()->with('msg','تمت حذف '.$student->name.' بنجاح');
    }
}
