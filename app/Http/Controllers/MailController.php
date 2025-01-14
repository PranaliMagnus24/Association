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
use App\Models\User;
use App\Models\CompanyPro;
class MailController extends Controller
{


    public function sendContact(Request $request)
    {
        dd($request->all());
        try {

            $formType = $request->input('form_type');

            if ($formType === 'business') {

                $companyPro = CompanyPro::findOrFail($request->input('company_id')); // Ensure 'company_id' is provided

                $contact = Contact::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'message' => $request->input('message'),
                    'company_id' => $companyPro->id, // Store company_id
                ]);

                $adminEmail = $companyPro->email; // Use email from CompanyPro model

                if (!$adminEmail) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Company email not configured. Please contact support.',
                    ]);
                }

                Mail::to($adminEmail)->send(new ContactMail($request));

                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent to the company!',
                ]);

            } elseif ($formType === 'association') {
                // Handle association inquiry
                $contact = Contact::create($request->all());
                $generalSetting = GeneralSetting::first();
                $adminEmail = $generalSetting ? $generalSetting->email : null;

                if (!$adminEmail) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Admin email not configured. Please contact support.',
                    ]);
                }

                Mail::to($adminEmail)->send(new ContactMail($request));

                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us, our team will get back to you as soon as possible!',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid form type.',
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
