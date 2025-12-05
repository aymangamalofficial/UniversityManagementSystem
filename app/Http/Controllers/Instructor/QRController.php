<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\QRCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Instructor;
use Illuminate\Support\Facades\Cookie;

class QRController extends Controller
{
    public function absencePage()
    {
        $instructorId = Auth::id();

        $instructor = Instructor::find($instructorId);
        $courses = Course::where('assistant_id', $instructorId)
            ->orWhere('doctor_id', $instructorId)
            ->get();

        return view('instructors.absence', compact('courses', 'instructor'));
    }

    // public function getCoursesForYear(Request $request)
    // {
    //     $instructorId = Auth::id();

    //     $courses = Course::where('assistant_id', $instructorId)
    //             ->orWhere('doctor_id', $instructorId)
    //             ->get();

    //     return response()->json(['courses' => $courses]);
    // }

    public function generate(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,course_id',
            'session_type' => 'required|string',
        ]);

        $qrValue = Str::random(20) . '-' . time(); // Generate a unique QR code value
        $expiryTime = Carbon::now()->addSeconds(3); // QR is valid for 3 seconds

        QRCode::create([
            'course_id' => $request->course_id,
            'generated_by' => Auth::id(),
            'qr_code_value' => $qrValue,
            'expiry_time' => $expiryTime->toDateTimeString(),
            'session_type' => $request->session_type,
        ]);

        $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=450x450&data={$qrValue}";

        return response()->json([
            'qr_value' => $qrValue,
            'expiry_time' => $expiryTime->toDateTimeString(),
            'qr_url' => $qrUrl
        ]);
    }

    // public function scan(Request $request)
    // {
    //     $request->validate([
    //         'qr_code_value' => 'required|string',
    //     ]);

    //     $qr_code_value = $request->input('qr_code_value');
    //     $qr = QRCode::where('qr_code_value', $qr_code_value)->first();

    //     if (!$qr || Carbon::now()->greaterThan($qr->expiry_time)) {
    //         return response()->json(['error' => 'Invalid or expired QR code'], 400);
    //     }

    //     // Process the attendance logic here
    //     // ...

    //     return response()->json(['success' => 'Attendance recorded successfully']);
    // }
}
