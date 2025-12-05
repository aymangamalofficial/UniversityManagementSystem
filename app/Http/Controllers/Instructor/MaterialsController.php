<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class MaterialsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // جلب المستخدم الحالي (المعاون)
        $instructorId = Auth::id();
        $courses = Course::where('assistant_id', $instructorId)
            ->orWhere('doctor_id', $instructorId)
            ->with(['materials' => function($q) use ($instructorId) {
                $q->where('uploaded_by', $instructorId);
            }])
            ->get();

        return view('instructors.dash', compact('courses'));
    }

    public function upload(Request $request, $courseId)
    {
        $request->validate([
            'material_name' => 'required|string|max:255',
            'material_file' => 'required|file|max:10240', // 10MB
        ]);

        // حفظ الملف في مجلد public/uploads
        $file = $request->file('material_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/materials'), $fileName);

        // حفظ البيانات في قاعدة البيانات
        Material::create([
            'material_name' => $request->material_name,
            'material_url' => $fileName,
            'course_id' => $courseId,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'تم رفع الملف بنجاح.');
    }


}
