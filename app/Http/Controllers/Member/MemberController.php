<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // 2. Get the current authenticated user
        $user = Auth::user();

        // 3. Update user details
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


    public function companyprofileupdate(Request $request)
    {

    }

}
