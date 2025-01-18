<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyPro;
use App\Models\User;
use App\Models\Technology;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
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
        $technologies = Technology::all();
        $countries = Country::get(["name", "id"]);
        $memberships = Membershipyear::all();
        $membershipstype = Membership::all();
        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        return view('member.profile.profile', [
            'user' => $user,
            'companyProfile' => $companyProfile,
            'technologies' => $technologies,
            'countries' => $countries,
            'memberships' =>$memberships,
            'membershipstype' => $membershipstype,
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
            if (!empty($user->profile_pic) && file_exists('upload/' . $user->profile_pic)) {
                unlink('upload/' . $user->profile_pic);
            }
            $file = $request->file('profile_pic');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_pic = $filename;
        }
        $user->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Profile updated successfully!');
        return redirect()->route('profile.index');
    }



    public function companyprofileupdate(Request $request, $id): RedirectResponse
    {
        $companyProfile = CompanyPro::find($id);

        $request->validate([
            'company_type' => 'nullable|string',
            'company_name' => 'required|string',
            'aadharcard_number' => 'nullable|string',
            'registration_date' => 'required|date',
            'renewal_date' => 'required|date',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'company_year' => 'required',
            'membership_year' => 'required',
            'about_company' => 'required',
        ]);

        $input = $request->all();
        $companyProfile->update($input);

        $documents = ['company_identity', 'company_address', 'aadharcard', 'authority_letter'];
        foreach ($documents as $document) {
            if ($request->hasFile($document)) {

                $existingDocument = Documentupload::where('company_id', $id)->where('file_type', $document)->first();
                if ($existingDocument && file_exists(public_path('upload/' . $existingDocument->file_name))) {
                    unlink(public_path('upload/' . $existingDocument->file_name));
                }

                $file = $request->file($document);
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/' . $id), $fileName);

                Documentupload::updateOrCreate(
                    ['company_id' => $id, 'file_type' => $document],
                    ['file_name' => $fileName]
                );
            }
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile and documents updated successfully!');
        return redirect()->route('profile.index');
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
            return redirect()->route('profile.index');
        }


        return back()->with('info', 'No changes made to the password.');
    }

}
