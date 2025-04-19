<?php

namespace App\Http\Controllers\Login;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleEmail;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('userType');
        $national_id = $request->input('id');

        if ($type == 'student') {
            $user = Student::where('national_id', $national_id)->first();

            if ($user) {
                $code = fake()->randomNumber(6,true);
                $details = [
                    'name' => $user->name,
                    'message' => 'هذا الكود الخاص بك',
                    'code' => $code
                ];

                    session()->put('verification_code', $code,'id', $user->id);
                    session()->put('user_type', 'student');
                    session()->save();
                Mail::to($request->input('email'))->send(new SimpleEmail($details));


                return view('auth.code');
            } else {
                return redirect()->route('login')->with('error', 'خطأ في البيانات المدخلة !');
            }
        }
        return response()->json(['message' => 'Invalid user type.'], 400);
    }
    public function check(Request $request)
    {
        $codefrominput = $request->input('code');
        $storedCode = session('verification_code');
        if ($storedCode == $codefrominput) {
            return view('auth.creatpass');
        } else {
            return redirect()->back()->with('error', 'الكود الذي ادخلته غير صحيح');
        }
    }
    public function password(Request $request)
    {
        $password = $request->input('password');
        return Hash::make($password) . "    " . bcrypt($password);
        // $confirmPassword = $request->input('confirmPassword');

        //     if ($password == $confirmPassword) {
        //         $user = Student::where('id', session('id'))->first();
        //         if ($user) {
        //             $user->password = bcrypt($password);
        //             $user->save();
        //             return redirect()->route('login')->with('success', 'تم انشاء كلمة المرور بنجاح');
        //         } else {
        //             return redirect()->back()->with('error', 'خطأ غير متوقع !');
        //         }
        //     } else {
        //         return redirect()->back()->with('error', 'كلمة المرور غير متطابقة');
        //     }

        // $national_id = $request->input('id');

        // $user = Student::where('national_id', $national_id)->first();

        // if ($user) {
        //     $user->password = bcrypt($password);
        //     $user->save();
        //     return redirect()->route('login')->with('success', 'تم انشاء كلمة المرور بنجاح');
        // } else {
        //     return redirect()->back()->with('error', 'خطأ في البيانات المدخلة !');
        // }
    }
}
//
