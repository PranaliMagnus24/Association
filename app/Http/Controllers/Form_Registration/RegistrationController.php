<?php

namespace App\Http\Controllers\Form_Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Str;
use File;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('home.registration.registration');
    }

    public function registrationstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'skills' => 'required',
            'qualification' => 'required',
            'upload_resume' => 'required|file|mimes:pdf,doc,docx',
            'joblocation' => 'nullable',
            'experience' => 'nullable'
        ]);

        $register = new Registration();
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->email = $request->email;
        $register->skills = $request->skills;
        $register->qualification = $request->qualification;
        $register->joblocation = $request->joblocation;
        $register->experience = $request->experience;

        if ($request->hasFile('upload_resume')) {
            $file = $request->file('upload_resume');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/registration_cv'), $filename);
            $register->upload_resume = $filename;
        }
        $register->save();

        return response()->json(['success' => true]);
    }



}
