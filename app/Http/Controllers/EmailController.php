<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SimpleEmail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'name' => 'محمود محمود',
            'message' => 'هذه رسالة تجريبية',
            'code' => '751845'
        ];

        Mail::to('aymangamalofficial@gmail.com')->send(new SimpleEmail($details));

        return 'Email sent successfully!';
    }
}
