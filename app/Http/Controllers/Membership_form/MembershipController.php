<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Technology;
use App\Models\CompanyPro;
use App\Models\Zipcode;
use Str;
use File;
use Illuminate\Validation\Rule;

class MembershipController extends Controller
{
    //Display membership form list
    public function index()
{
    $datas = User::where('role', '!=', 'admin')->paginate(5);
    $companies = CompanyPro::paginate(5);
    return view('admin.membership.index', compact('datas', 'companies'));
}


//Display membership form
    public function add(){
        $technologies = Technology::all();
        $countries = Country::get(["name", "id"]);
        return view('admin.membership.add', compact('technologies', 'countries'));

    }

//Display company form
    public function showCompanyForm(Request $request) {
        $user_id = $request->session()->get('user_id');
        $technologies = Technology::all();
        $countries = Country::get(["name", "id"]);
        return view('admin.membership.add', compact('technologies', 'countries', 'user_id'));
    }

    //Store membership form
    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ], [
            'first_name.required' => 'First Name is required.',
            'first_name.string' => 'First Name must be a string',

            'phone.required' => 'The Phone field is required.',
            'phone.numeric' => 'The must be a numeric value.',
        ]);
        $data = new User;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date_birth = $request->date_birth;
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


        if($data->save())
        {
            $request->session()->put('user_id', $data->id);
            toastr()->timeOut(5000)->closeButton()->addSuccess('Member added successfully!');
            return redirect()->route('company.add', ['user_id' => $data->id]);
        }else{
            toastr()->timeOut(5000)->closeButton()->addSuccess('Failed to add Member!');
            return redirect()->route('company.add', ['user_id' => $data->id]);
        }


    }

    //Delete member
    public function delete($id){
        $data = User::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Member deleted successfully!');
         return redirect()->back();
     }

 //edit member
     public function edit($id){

        $data = User::find($id);
         return view('admin.membership.edit', compact('data'));
     }

 //update member
 public function update(Request $request, $id) {
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|numeric',
        'email' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:255',
            Rule::unique('users')->ignore($id)
        ],
        'middle_name' => 'nullable|string',
    ], [
        'first_name.required' => 'First Name is required.',
        'first_name.string' => 'First Name must be a string',
        'phone.required' => 'The Phone field is required.',
        'phone.numeric' => 'The Phone must be a numeric value.',
    ]);

    $data = User::find($id);
    if (!$data) {
        return redirect()->route('member.index')->withErrors(['User not found.']);
    }

    $data->first_name = $request->first_name;
    $data->middle_name = $request->middle_name;
    $data->last_name = $request->last_name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->date_birth = $request->date_birth;
    $data->gender = $request->gender;

    if ($request->hasFile('profile_pic')) {
        if (!empty($data->profile_pic) && file_exists('upload/' . $data->profile_pic)) {
            unlink('upload/' . $data->profile_pic);
        }
        $file = $request->file('profile_pic');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->profile_pic = $filename;
    }

    try {
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Member updated successfully!');
    } catch (\Exception $e) {
        return redirect()->route('member.index')->withErrors(['Update failed: ' . $e->getMessage()]);
    }

    return redirect()->route('member.index');
}


//Display full details
    public function show($id)
    {
        $data = User::find($id);
        $company = CompanyPro::where('user_id', $id)->first();
        return view('admin.membership.show', compact('data', 'company'));
    }

    //Search member
    public function member_search(Request $request){
        $search = $request->search;
        $datas = User::where('first_name', 'LIKE', '%'.$search.'%')->orWhere('first_name', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.membership.index', compact('datas'));
      }

      //Store Company profile information
      public function companystore(Request $request){
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
       $data->user_id = $request->session()->get('user_id');
       $data->zip_id = $request->zip_id;

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
            toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile added successfully!');
        return redirect()->route('member.index');
        }else{
            toastr()->timeOut(5000)->closeButton()->addSuccess('Failed to update Company profile!');
            return redirect()->route('member.index');
        }

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




}
