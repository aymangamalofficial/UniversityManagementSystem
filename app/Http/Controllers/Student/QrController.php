<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QRCode;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QrController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'qr_result' => 'required|string',
        ]);

        $qr = QRCode::where('qr_code_value', $request->qr_result)->first();
        if (!$qr || Carbon::now()->greaterThan($qr->expiry_time)) {
            return response()->json(['error' => 'Invalid or expired QR code'], 400);
        }

        $student = Auth::guard('student')->user();
        if (!$student) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Prevent duplicate attendance for same QR
        $already = Attendance::where('student_id', $student->student_id)
            ->where('qr_code_id', $qr->qr_code_id)
            ->first();
        if ($already) {
            return response()->json(['error' => 'Attendance already recorded'], 409);
        }

        Attendance::create([
            'student_id' => $student->student_id,
            'qr_code_id' => $qr->qr_code_id,
            'attendance_time' => Carbon::now(),
            'status' => 'present',
        ]);

        return response()->json(['success' => 'Attendance recorded successfully']);
    }
}
