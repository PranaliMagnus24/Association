<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\CompanyPro;
use App\Models\User;
use App\Models\Technology;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Membershipyear;
use App\Models\Membership;
use App\Models\Documentupload;
use App\Models\Zipcode;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\Interview;
use App\Mail\ApplyJob;
use App\Mail\InterviewScheduledMail;
use Str;
use File;

class AdsManagerController extends Controller
{
    public function index(Request $request){

        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();
        return view('member.ads_manager.ads_create', compact('user','companyProfile'));
    }


    public function store(Request $request){



    }
}
