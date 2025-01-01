<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Technology;
use App\Models\CompanyPro;
use App\Models\Membershipyear;
use App\Models\Zipcode;
use App\Models\Membership;
use Str;
use File;
use Illuminate\Validation\Rule;

class CompanyProfileController extends Controller
{

public function index()
{

    $datas = CompanyPro::paginate(5);
    return view('admin.membership.company_profile.index', compact('datas'));
}

public function add(Request $request, $id=null)
{
    $user_id = ($id != null)? $id: $request->session()->get('user_id');
    $technologies = Technology::all();
    $countries = Country::get(["name", "id"]);
    $memberships = Membershipyear::all();
    $membershipstype = Membership::all();
    $users = User::where('role', 'user')->get();
    return view('admin.membership.company_profile.add', compact('technologies', 'countries','memberships','membershipstype', 'users', 'user_id'));
}

public function companystore(Request $request){
    $request->validate([
          'company_type' => 'required|string',
          'company_name' => 'required|string',
          'aadharcard_number' => 'required',
          'registration_date' => 'required|date',
          'renewal_date' => 'required|date',
          'city' => 'required',
          'state' => 'required',
          'country' => 'required',
          'company_year' => 'required',
          'membership_year' => 'required',

    ]);
   $data = new CompanyPro;
   $data->company_type = $request->company_type;
   $data->company_name = $request->company_name;
   $data->aadharcard_number = $request->aadharcard_number;
   $data->registration_date = $request->registration_date;
   $data->renewal_date = $request->renewal_date;
   $data->address_one = $request->address_one;
   $data->address_two = $request->address_two;
   $data->city = $request->city;
   $data->state = $request->state;
   $data->country = $request->country;
   $data->landline = $request->landline;
   $data->employee_number = $request->employee_number;
   $data->company_year = $request->company_year;
   $data->about_company = $request->about_company;
   $data->website_url = $request->website_url;
   $data->technologies = $request->technologies;
   $data->zipcode = $request->zipcode;
   $data->state_id = $request->state_id;
   $data->city_id = $request->city_id;
   $data->country_id = $request->country_id;
   $data->tech_id = $request->tech_id;
   $data->membership_year = $request->membership_year;
   $data->default_year = $request->default_year;

    if ($request->member_name>0) {
       // $data->user_id = $request->session()->get('user_id');
        $data->user_id = $request->member_name;

    } else {
        $data->user_id = $request->session()->get('user_id');
    }
   $data->zip_id = $request->zip_id;
   $data->membership_type = $request->membership_type;
   $data->membershiptype_id = $request->membershiptype_id;
   $data->membershipyear_id = $request->membershipyear_id;

    if(!empty($request->file('company_logo')))
    {
        if(!empty($company->company_logo) && file_exists('upload/' .$company->company_logo))
        {
            unlink('upload/' .$company->company_logo);
        }
        $file = $request->file('company_logo');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/',$filename);
       $data->company_logo = $filename;
    }
    if($data->save())
    {
        $request->session()->forget('user_id');

        toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile added successfully!');
    return redirect()->route('member.index');
    }else{
        toastr()->timeOut(5000)->closeButton()->addSuccess('Failed to update Company profile!');
        return redirect()->route('member.index');
    }

}



public function edit($id){
    $technologies = Technology::all();
    $countries = Country::get(["name", "id"]);
    $memberships = Membershipyear::all();
    $membershipstype = Membership::all();
    $users = User::where('role', 'user')->get();
    $data = CompanyPro::find($id);
     return view('admin.membership.company_profile.add', compact('technologies', 'countries','memberships','membershipstype', 'users', 'data'));
 }

 public function update(Request $request, $id): RedirectResponse
    {
        $data = CompanyPro::find($id);
        $request->validate([
            'company_type' => 'required|string',
            'company_name' => 'required|string',
            'aadharcard_number' => 'required',
            'registration_date' => 'required|date',
            'renewal_date' => 'required|date',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'company_year' => 'required',
            'membership_year' => 'required',

      ]);
        $input = $request->all();
        $data->update($input);
         return redirect()->route('member.index')->with('success','Company profile updated successfully');

    }


/**

 * Write code on Method

 *

 * @return response()

 */

public function fetchState(Request $request)

{

    $data['states'] = State::where("country_id", $request->country_id)

                            ->get(["name", "id"]);



    return response()->json($data);

}

/**

 * Write code on Method

 *

 * @return response()

 */

public function fetchCity(Request $request)

{

    $data['cities'] = City::where("state_id", $request->state_id)

                                ->get(["name", "id"]);



    return response()->json($data);

}

public function addcompany(Request $request, $id=null)
{
    $user_id = ($id != null)? $id: $request->session()->get('user_id');
    $technologies = Technology::all();
    $countries = Country::get(["name", "id"]);
    $memberships = Membershipyear::all();
    $membershipstype = Membership::all();
    $users = User::where('role', 'user')->get();
    return view('admin.membership.company_profile.add', compact('technologies', 'countries','memberships','membershipstype', 'users', 'user_id'));

}

 public function delete($id){
    $data = CompanyPro::find($id);
    $data->delete();
     toastr()->timeOut(5000)->closeButton()->addSuccess('Member deleted successfully!');
     return redirect()->back();
 }

 public function show($id)
    {
        $data = CompanyPro::with('cities','states','countries','technologies')->find($id);
        return view('admin.membership.company_profile.show', compact('data'));
    }

}
