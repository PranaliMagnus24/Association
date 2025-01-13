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
use App\Models\GeneralSetting;
class MailController extends Controller
{


    public function sendContact(Request $request)
    {

        try {
            $contact = Contact::create($request->all());
            $generalSetting = GeneralSetting::first();
            $adminEmail = $generalSetting ? $generalSetting->email : null;

            if (!$adminEmail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin email not configured. Please contact support.',
                ]);
            }

            if ($contact) {
                Mail::to($adminEmail)->send(new ContactMail($request));

                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us, Our team will get back to you as soon as possible!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send message. Please try again.',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred: ' . $e->getMessage(),
            ]);
        }


    }



}
