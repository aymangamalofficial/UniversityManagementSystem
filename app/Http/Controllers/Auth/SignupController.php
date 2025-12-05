<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleEmail;
use App\Models\Instructor;
use Illuminate\Support\Facades\Validator;


class SignupController extends Controller
{
    public function index(Request $request)
    {
        // Validate inputs
        $request->validate([
            'userType' => 'required|in:student,instructor,admin',
            'id' => 'required|digits:14',
            'email' => 'required|email',
        ], [
            'userType.required' => 'يجب اختيار نوع المستخدم.',
            'userType.in' => 'نوع المستخدم غير صالح.',
            'id.required' => 'يجب إدخال الرقم القومي.',
            'id.digits' => 'يجب أن يكون الرقم القومي مكونًا من 14 رقمًا.',
            'email.required' => 'يجب إدخال البريد الإلكتروني.',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
        ]);

        $type = $request->input('userType');
        $national_id = $request->input('id');
        $code = fake()->randomNumber(6, true);
        $email = $request->input('email');

        $details = [
            'message' => 'هذا الكود الخاص بك',
            'code' => $code
        ];

        switch ($type) {
            case 'student':
                $user = Student::where('national_id', $national_id)->first();
                if ($user) {
                    $details['name'] = $user->name;
                    session()->put('verification_code', $code);
                    session()->put('email', $email);
                    session()->put('id', $user->student_id);
                    session()->put('user_type', 'student');
                    session()->save();
                    Mail::to($request->input('email'))->send(new SimpleEmail($details));
                    return view('auth.code');
                }
                break;

            case 'instructor':
                $user = Instructor::where('national_id', $national_id)->first();
                if ($user) {
                    $details['name'] = $user->name;
                    session()->put('verification_code', $code);
                    session()->put('email', $email);
                    session()->put('id', $user->instructor_id);
                    if ($user->role_id == 1) {
                        session()->put('user_type', 'doctor');
                    } else {
                        session()->put('user_type', 'assistant');
                    }
                    session()->save();
                    Mail::to($request->input('email'))->send(new SimpleEmail($details));
                    return view('auth.code');
                }
                break;

            case 'admin':
                $user = User::where('national_id', $national_id)->first();
                if ($user) {
                    $details['name'] = $user->name;
                    session()->put('verification_code', $code);
                    session()->put('email', $email);
                    session()->put('id', $user->id);
                    session()->put('user_type', 'admin');
                    session()->save();
                    Mail::to($request->input('email'))->send(new SimpleEmail($details));
                    return view('auth.code');
                }
                break;
        }
        return redirect()->back()->with('error', 'خطأ في البيانات  !');
    }

    public function check(Request $request)
    {
        // Validate inputs
        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:6',
            ], [
                'code.required' => 'يجب إدخال الكود.',
                'code.digits' => 'يجب أن يكون الكود مكونًا من 6 أرقام.',
            ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first('code');
                return view('auth.code',compact('error'));
        }


        $codefrominput = $request->input('code');
        $storedCode = session('verification_code');
        if ($storedCode == $codefrominput) {
            session()->forget('verification_code');
            return view('auth.createpass');
        } else {
            $error = 'الكود غير صحيح';
            return view('auth.code',compact('error'));
        }
    }

    public function password(Request $request)
    {
        // Validate inputs
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
        ], [
            'password.required' => 'يجب إدخال كلمة المرور.',
            'password.min' => 'يجب أن تكون كلمة المرور مكونة من 6 أحرف على الأقل.',
            'confirmPassword.required' => 'يجب تأكيد كلمة المرور.',
            'confirmPassword.same' => 'كلمة المرور غير متطابقة.',
        ]);

        // التحقق من وجود أخطاء
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMessages = [
                'password' => $errors->first('password'),
                'confirmPassword' => $errors->first('confirmPassword'),
            ];

            return view('auth.createpass', compact('errorMessages'));
        }

        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        if ($password == $confirmPassword) {
            $userType = session('user_type');
            $userId = session('id');

            $user = null;
            
            switch ($userType) {
                case 'student':
                    $user = Student::find($userId);
                    break;

                // Assuming 'doctor' and 'assistant' are roles of the instructor
                case 'doctor':

                    $user = Instructor::find($userId);
                    break;

                case 'assistant':
                    $user = Instructor::find($userId);
                    break;

                case 'admin':
                    $user = User::find($userId);
                    break;

                default:
                    return redirect()->route('signup')->with('error', 'نوع المستخدم غير موجود');
            }

            if ($user) {
                $user->email = session('email');
                session()->forget('email');
                $user->password = Hash::make($password);
                $user->save();

                // if ($userType == 'student') {
                //     return $user->student_id;
                // } elseif ($userType == 'instructor') {
                //     return redirect()->route('instructors.assistant.dash');
                // } elseif ($userType == 'admin') {
                //     return redirect()->route('admin.home');
                // }

                return redirect()->route('login')->with('success', 'تم إنشاء الحساب بنجاح، يمكنك الآن تسجيل الدخول');
            }
        } else {
            return redirect()->back()->with('error', 'كلمة المرور غير متطابقة');
        }
    }
}

