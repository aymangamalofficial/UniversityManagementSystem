<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\User;
// use Illuminate\Container\Attributes\Auth;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'userType' => 'required|in:student,instructor,admin',
            'id' => 'required|digits:14',
            'password' => 'required|min:6',
        ], [
            'userType.required' => 'يجب اختيار نوع المستخدم.',
            'userType.in' => 'نوع المستخدم غير صالح.',
            'id.required' => 'يجب إدخال الرقم القومي.',
            'id.digits' => 'يجب أن يكون الرقم القومي مكونًا من 14 رقمًا.',
            'password.required' => 'يجب إدخال كلمة المرور.',
            'password.min' => 'يجب أن تكون كلمة المرور مكونة من 6 أحرف على الأقل.',
        ]);


        $type = $request->input('userType');
        $national_id = $request->input('id');
        $password = $request->input('password');


        if (Auth::guard($type)->attempt(['national_id' => $national_id, 'password' => $password])) {
            $user = Auth::guard($type)->user();
            session()->put('id', $user->id);
            session()->put('user_type', $type);
            session()->save();
            if ($type == 'student') {
                return redirect()->route('students.stddashboard.dash');
            } elseif ($type == 'instructor') {
                return redirect()->route('instructors.dash');
            } elseif ($type == 'admin') {
                return redirect()->route('admin.home');
            }
        } else {
            return redirect()->back()->with('error', 'خطأ في البيانات  !');
        }

        // $2y$12$W4NKBiaLJE7kOozTMyARn.PfcFCnZQjsT8ShbNkbiavCQQXN1KWsu

                    // $user = User::where('national_id', 42785218);
// return $type ." ". $national_id ."<br>" . $password;


//         if ($type == 'student') {
//             $user = Student::where('national_id', $national_id)->where('password', $password)->get();


//         } elseif ($type == 'doctor') {
//             $user = Instructor::where('national_id', $national_id)->where('password' ,$password)->where('role_id' ,1 )->get();

//         } elseif ($type == 'assistant') {
//             $user = Instructor::where('national_id', $national_id)->where('password' ,$password)->where('role_id' ,0)->get();

//         } elseif ($type == 'admin') {
//             $user = User::where('national_id', $national_id)->where('password' ,$password)->get();
// return $user;
//         }
//         if ($user) {

//         //     session()->put('id', $user->id);
//         //     session()->put('user_type', 'student');
//         //     session()->save();
//         // Mail::to($request->input('email'))->send(new SimpleEmail($details));


//             return $user;
//         } else {
//             return "gmgmy";
//         }
        // return response()->json(['message' => 'Invalid user type.'], 400);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
