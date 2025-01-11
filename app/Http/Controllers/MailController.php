<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeEmail;
use App\Mail\VerifyMail;
use App\Mail\EnquiryMail;
use App\Mail\MembershipMail;
use App\Mail\ThankyouMail;
use App\Mail\ContactMail;
use App\Mail\ConfirmMail;
use App\Mail\ForgotMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
class MailController extends Controller
{


    public function sendContact(Request $request)
    {
            Contact::create($request->all());
            return redirect()->route('home.contact')->with('success', 'Message send successfully');

    }



}
