<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Str;
use File;

class GeneralSettingController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = GeneralSetting::find(1);
        return view('admin.master_settings.general_setting.index', $data);
    }

    public function store(Request $request){

        $save = GeneralSetting::find(1);
        $save->association_name = $request->association_name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->address = $request->address;
        $save->description = $request->description;
        $save->location_url = $request->location_url;


        if(!empty($request->file('association_logo')))
        {
            if(!empty($save->association_logo) && file_exists('upload/' .$save->association_logo))
            {
                unlink('upload/' .$save->association_logo);
            }
            $file = $request->file('association_logo');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' .$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $save->association_logo = $filename;
        }

        $save->save();
        return redirect()->route('setting.index')->with('success', 'Setting updated successfully!');
       }


}
