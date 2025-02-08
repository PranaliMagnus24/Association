<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\CompanyPro;
use App\Models\User;
use App\Models\Technology;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Category;
use App\Models\Membershipyear;
use App\Models\Membership;
use App\Models\Documentupload;
use App\Models\Zipcode;
use Str;
use File;

class MemberController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        return view('member.index', [
            'user' => $user,
            'companyProfile' => $companyProfile
        ]);
    }

    public function profile()
    {

        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();
        // $technologies = Technology::all();
        $categories = Category::all();
        $countries = Country::get(["name", "id"]);
        $memberships = Membershipyear::all();
        $membershipstype = Membership::all();
        $states = State::get(["name", "id"]);
        $cities = City::where('state_id',$companyProfile->state)->get(["name", "id"]);

        return view('member.profile.profile', [
            'user' => $user,
            'companyProfile' => $companyProfile,
            // 'technologies' => $technologies,
            'countries' => $countries,
            'memberships' =>$memberships,
            'membershipstype' => $membershipstype,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories
        ]);
    }

    public function memberprofileupdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
            'date_birth' => 'nullable|date',
            'gender' => 'required|in:Male,Female,Other',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $user = Auth::user();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date_birth = $request->date_birth;
        $user->gender = $request->gender;


        if ($request->hasFile('profile_pic')) {
            if (!empty($user->profile_pic) && file_exists('upload/user_profile/' . $user->profile_pic)) {
                unlink('upload/user_profile/' . $user->profile_pic);
            }
            $file = $request->file('profile_pic');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/user_profile/', $filename);
            $user->profile_pic = $filename;
        }
        $user->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Profile updated successfully!');
        return redirect()->route('profile.index', ['tab' => 'member']);
    }



    public function companyprofileupdate(Request $request, $id): RedirectResponse
{
    $companyProfile = CompanyPro::find($id);

    // Check if the company profile exists
    if (!$companyProfile) {
        toastr()->timeOut(5000)->closeButton()->addError('Company profile not found!');
        return redirect()->route('profile.index', ['tab' => 'company']);
    }

    $request->validate([
        'company_type' => 'nullable|string',
        'company_name' => 'required|string',
        'aadharcard_number' => 'nullable|string',
        'registration_date' => 'required|date',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'company_year' => 'required',
        'membership_year' => 'required',
        'about_company' => 'required',
    ]);

    // Handle company logo upload
    if ($request->hasFile('company_logo')) {
        // Delete the existing logo if it exists
        if (!empty($companyProfile->company_logo) && file_exists(public_path('upload/company_documents/' . $companyProfile->company_logo))) {
            unlink(public_path('upload/company_documents/' . $companyProfile->company_logo));
        }

        // Upload the new logo
        $file = $request->file('company_logo');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/company_documents/'), $filename);
        $companyProfile->company_logo = $filename; // Update the company logo
    }

    // Update other fields
    $input = $request->except('company_logo'); // Exclude company_logo from the input
    $companyProfile->update($input);

    // Handle document uploads
    $documents = ['company_identity', 'company_address', 'aadharcard', 'authority_letter'];
    foreach ($documents as $document) {
        if ($request->hasFile($document)) {
            $existingDocument = Documentupload::where('company_id', $id)->where('file_type', $document)->first();
            if ($existingDocument && file_exists(public_path('upload/company_documents/' . $existingDocument->file_name))) {
                unlink(public_path('upload/company_documents/' . $existingDocument->file_name));
            }

            $file = $request->file($document);
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/company_documents/' . $id), $fileName);

            Documentupload::updateOrCreate(
                ['company_id' => $id, 'file_type' => $document],
                ['file_name' => $fileName]
            );
        }
    }

    toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile and documents updated successfully!');
    return redirect()->route('profile.index', ['tab' => 'company']);
}

    public function updatePassword(Request $request)
    {

        // Validate input fields
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'nullable|min:8|confirmed',
        // ]);


        $user = Auth::user();


        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }


        if ($request->filled('new_password')) {

            $user->password = Hash::make($request->new_password);
            $user->save();

            toastr()->timeOut(5000)->closeButton()->addSuccess('Password updated successfully!');
            return redirect()->route('profile.index', ['tab' => 'password']);
        }


        return back()->with('info', 'No changes made to the password.');
    }



    public function myaccount()
    {

        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        return view('member.my_account', [
            'user' => $user,
            'companyProfile' => $companyProfile
        ]);
    }
}
