<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleEmail;

class CodeController extends Controller
{
    public function createcode()
    {
        $code = fake()->randomNumber(6,true);
        $details = [
            'name' => 'ايمن',
            'message' => 'هذه رسالة تجريبية',
            'code' => $code
        ];

            session()->put('verification_code', $code);
            session()->save();
        Mail::to('aymangamalofficial@gmail.com')->send(new SimpleEmail($details));

        return view('test');

    }

    public function checkcode(Request $request)
    {
        // $code = $request->input('realcode');
        $codefrominput = $request->input('code');
        $storedCode = session('verification_code');
        if ($storedCode == $codefrominput) {
            return 'Correct '.$codefrominput;
        } else {
            return 'Incorrect '.$storedCode;
        }


    }
}
