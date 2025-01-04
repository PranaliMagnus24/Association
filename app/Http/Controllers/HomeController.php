<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use File;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }


    public function membershipregistration()
    {
        return view('home.member_register');
    }


    public function membershipregistrationstore(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'password' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],

        ], [
            'first_name.required' => 'First Name is required.',
            'first_name.string' => 'First Name must be a string',

            'phone.required' => 'The Phone field is required.',
            'phone.numeric' => 'The must be a numeric value.',
        ]);
        $data = new User;
        $data->name = $request->first_name.' '. $request->last_name;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->password = $request->password;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $data->gender = $request->gender;


        if(!empty($request->file('profile_pic')))
        {
            if(!empty($data->profile_pic) && file_exists('upload/' .$data->profile_pic))
            {
                unlink('upload/' .$data->profile_pic);
            }
            $file = $request->file('profile_pic');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' .$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $data->profile_pic = $filename;
        }


        $data->save();

        return redirect()->route('home.membershipregistration')->with('success', 'Member register successfully.');

    }




}
