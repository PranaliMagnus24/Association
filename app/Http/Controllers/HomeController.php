<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FAQ;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPro;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use Str;
use File;

class HomeController extends Controller
{
    //Main Home index page
    public function index()
    {
        $totalUsers = User::count();
        $upcomingEvents = Event::where('eventstartdatetime', '>', Carbon::now()) // Events that are starting in the future
            ->where('eventenddatetime', '>', Carbon::now()) // Ensure the event hasn't ended
            ->orderBy('eventstartdatetime', 'asc')
            ->get();

        return view('home.index', compact('totalUsers', 'upcomingEvents'));
    }



    //Member registration page on Home
    public function membershipregistration()
    {
        return view('home.member_register');
    }

 //Member login page on Home
    public function membershiplogin()
    {
        return view('home.member_login');
    }

    // public function membershipregistrationstore(Request $request){

    //     $request->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'phone' => 'required|numeric',
    //         'password' => 'required|string|min:8',
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],

    //     ], [
    //         'first_name.required' => 'First Name is required.',
    //         'first_name.string' => 'First Name must be a string',

    //         'phone.required' => 'The Phone field is required.',
    //         'phone.numeric' => 'The must be a numeric value.',
    //     ]);
    //     $data = new User;
    //     $data->name = $request->first_name.' '. $request->last_name;
    //     $data->first_name = $request->first_name;
    //     $data->middle_name = $request->middle_name;
    //     $data->last_name = $request->last_name;
    //     $data->password = Hash::make($request->password);
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;

    //     $data->gender = $request->gender;


    //     if(!empty($request->file('profile_pic')))
    //     {
    //         if(!empty($data->profile_pic) && file_exists('upload/' .$data->profile_pic))
    //         {
    //             unlink('upload/' .$data->profile_pic);
    //         }
    //         $file = $request->file('profile_pic');
    //         $randomStr = Str::random(30);
    //         $filename = $randomStr . '.' .$file->getClientOriginalExtension();
    //         $file->move('upload/',$filename);
    //         $data->profile_pic = $filename;
    //     }


    //     $data->save();

    //     $request->session()->put('user_id', $data->id);

    //     return redirect()->route('home.companyregistration', ['user_id' => $data->id])
    //         ->with('success', 'Member registered successfully. Please complete your company registration.');

    // }


//Home Contact page
    public function contact()
    {
        return view('home.contact');
    }

    //Home History page
    public function history()
    {
        $totalUsers = User::count();
        return view('home.history', compact('totalUsers'));
    }
///show directory


      //Home Committee page
    public function committee()
    {
        return view('home.committee');
    }

    //Home Director Desk
    public function desk_directory()
    {
        return view('home.desk_directory');
    }

    //Home Gallery Page
    public function gallery()
    {

        $gallery = Gallery::with('imagegallery')->get()->toArray();
        //print_r($datas);
        return view('home.gallery',compact('gallery'));
    }


    //Home FAQ Page
    public function faq()
    {
        $datas = FAQ::all();
        return view('home.faq',compact('datas'));
    }


    //Home Islamic Page
    public function islamic_tijarat()
    {
        return view('home.islamic_tijarat');
    }

    //Home Associate page
    public function associate()
    {
        return view('home.our_associate');
    }

    ///Display Job

    public function jobs()
    {
        $jobs = Job::with('companyProfile')->paginate(12);

        return view('home.jobs', compact('jobs'));
    }

    //Display Job Details
    public function jobdetails($id)
{
    $job = Job::with([
        'category',
        'subcategory',
        'countries',
        'states',
        'cities',
        'companyProfile'
    ])->findOrFail($id);

    return view('home.job_details', compact('job'));
}



    public function fetchCity(Request $request)
    {
        $cities = City::where("state_id", $request->state_id)
                      ->get(["name", "id"]);

        return response()->json(['cities' => $cities]);
    }



    public function thankyou()
    {
        return view('home.thankyou');
    }

public function homeevents()
{
    return view('home.events');
}
}
