<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FAQ;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPro;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

class HomeController extends Controller
{
    //Main Home index page
    public function index()
    {
        $totalUsers = User::count();
        return view('home.index', compact('totalUsers'));
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
public function directory(Request $request)
{
    $query = CompanyPro::query();

    // Search filter
    if ($request->has('search') && !empty($request->search)) {
        $query->where('company_name', 'like', '%' . $request->search . '%')
              ->orWhere('about_company', 'like', '%' . $request->search . '%');
    }

    // Filter by state name
    if ($request->has('state_id') && !empty($request->state_id)) {
        $query->where('state', $request->state_id);
    }

    // Filter by city name
    if ($request->has('city_id') && !empty($request->city_id)) {
        $query->where('city', $request->city_id);
    }

    $companyprofiles = $query->inRandomOrder()->paginate(10);

    // Get states filtered by country
    $states = State::where('country_id', 101)->get(); // Assuming 101 is India

    // Get cities filtered by the selected state
    $cities = $request->has('state_id')
        ? City::where('state_id', $request->state_id)->get()
        : collect();  // Empty collection if no state is selected

    return view('home.directory', compact('companyprofiles', 'states', 'cities'));
}





    //directory details page
    public function show($id) {
        $companypro = CompanyPro::findOrFail($id);
          return view('home.directory_display', compact('companypro'));
      }

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
        return view('home.gallery');
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

    public function fetchCity(Request $request)
    {
        $cities = City::where("state_id", $request->state_id)
                      ->get(["name", "id"]);

        return response()->json(['cities' => $cities]);
    }



}
