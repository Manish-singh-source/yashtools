<?php

namespace App\Http\Controllers;


use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail="itwebdeveloper7@gmail.com";
        $subject="Test Email";
        $name="Manish";
       
        // echo "Email has been sent";
        // exit();


        Mail::to($toEmail)->send(new welcomeemail($name));

        
    }
}
