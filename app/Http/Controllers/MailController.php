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
use App\Mail\ApplyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\JobApply;
use App\Models\Job;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\CompanyPro;
class MailController extends Controller
{


    public function sendContact(Request $request)
{

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|digits:10',
        'to' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        'subject' => 'nullable|string|max:255',
        'message' => 'nullable|string',
    ]);

    try {
        $formType = $request->input('form_type');

        if ($formType === 'business') {

            // Fetch the company profile and associated user data
            $companyPro = CompanyPro::findOrFail($request->input('company_id'));
            $user = User::findOrFail($companyPro->user_id); // Assuming 'user_id' is linked to the 'users' table

            // Create a contact entry in the database
            $contact = Contact::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
                'company_id' => $companyPro->id,
            ]);

            // Use the user's email address to send the message
            $adminEmail = $user->email;

            if (!$adminEmail) {
                return response()->json([
                    'success' => false,
                    'message' => 'User email not configured. Please contact support.',
                ]);
            }

            // Send email from the user
            Mail::to($adminEmail)->send(new ContactMail($request));

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent to the company!',
            ]);

        } elseif ($formType === 'association') {

            // Handle association form (same as before)
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
