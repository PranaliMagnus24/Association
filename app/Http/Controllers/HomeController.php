<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FAQ;
use App\Models\CompanyPro;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        return view('home.index', compact('totalUsers'));
    }


    public function membershipregistration()
    {
        return view('home.member_register');
    }


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



    public function contact()
    {
        return view('home.contact');
    }
    public function history()
    {
        $totalUsers = User::count();
        return view('home.history', compact('totalUsers'));
    }
///show directory
    public function directory()
    {
        $companyprofiles = CompanyPro::inRandomOrder()->get();
        return view('home.directory', compact('companyprofiles'));
    }

    public function show($id) {
        $companypro = CompanyPro::findOrFail($id);
          return view('home.directory_display', compact('companypro'));
      }

    public function committee()
    {
        return view('home.committee');
    }
    public function desk_directory()
    {
        return view('home.desk_directory');
    }
    public function gallery()
    {
        return view('home.gallery');
    }

    public function faq()
    {
        $datas = FAQ::all();
        return view('home.faq',compact('datas'));
    }

}
