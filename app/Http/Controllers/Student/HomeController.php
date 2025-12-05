<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;


class HomeController extends Controller
{
    protected function getMyCourses()
    {
        $user = Auth::user();

        $courses = Course::with('doctor','assistant')
            ->where(['year'=> $user->year, 'department_id' => $user->department_id])
            ->get();

        if ($courses->isEmpty()) {
            return collect();
        }

        return $courses;
    }

    public function index()
    {
        $user = Auth::user();

        $courses = $this->getMyCourses();

        $materials_assistants = collect();
        $materials_doctors = collect();

        if (!$courses->isEmpty()) {
            foreach ($courses as $course) {
                $materials_assistants = $materials_assistants->merge(
                    $course->materials()->whereHas('uploader', function($q) {
                        $q->where('role_id', 0);
                    })->get()
                );
                $materials_doctors = $materials_doctors->merge(
                    $course->materials()->whereHas('uploader', function($q) {
                        $q->where('role_id', 1);
                    })->get()
                );
            }
        }
        return view('student.stddashboard.dash', compact('user', 'courses', 'materials_assistants', 'materials_doctors'));
    }

    public function profile()
    {

        $data = Auth::guard('student')->user();
        if (!$data) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
        // You can pass the instructor data to the view if needed
        return view('student.stdprofile.profile', ['student' => $data]);

    }

    public function results()
    {
        // $user = Auth::user();

        $courses = $this->getMyCourses();

        return view('student.stddashboard.result', compact('courses'));
    }
    public function DegreesForCourse(Request $request)
    {
        $user = Auth::user();
        $courses = $this->getMyCourses();
        $courseId = $request->course_id;

        $attendances = \App\Models\Attendance::where('student_id', $user->student_id)
            ->whereHas('qrCode', function($q) use ($courseId) {
                $q->where('course_id', $courseId);
            })
            ->with('qrCode')
            ->get();
        return view('student.stddashboard.result', compact('user', 'courses','attendances'));

        // يمكنك هنا تمرير $attendances للعرض أو إرجاعه كـ JSON حسب الحاجة
        // dd($attendances);
//         $user = Auth::user();

//         $courses = $this->getMyCourses();
// return "degrees for course". $request->course_id."  " . $request->type_of_degree;
//         // return view('student.stddashboard.result', compact('user', 'courses'));

    }
    public function getAttendanceForCourse(Request $request)
    {
        $user = Auth::user();
        $courseId = $request->course_id;

        // جلب كل الحضور لهذا الطالب ولهذا الكورس
        $attendances = \App\Models\Attendance::where('student_id', $user->student_id)
            ->whereHas('qrCode', function($q) use ($courseId) {
                $q->where('course_id', $courseId);
            })
            ->with('qrCode')
            ->get();

        // يمكنك هنا تمرير $attendances للعرض أو إرجاعه كـ JSON حسب الحاجة
        dd($attendances);
    }
}

