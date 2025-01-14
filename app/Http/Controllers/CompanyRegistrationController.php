<?php

namespace App\Http\Controllers;
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
use App\Models\Documentupload;
use Str;
use File;
use Illuminate\Validation\Rule;


class CompanyRegistrationController extends Controller
{

    public function companyregistration(Request $request, $id=null)
    {
        $user_id = ($id != null)? $id: $request->session()->get('user_id');
        $technologies = Technology::all();
        $countries = Country::get(["name", "id"]);
        $memberships = Membershipyear::all();
        $membershipstype = Membership::all();
        $users = User::where('role', 'user')->get();
        return view('home.company_register', compact('technologies', 'countries','memberships','membershipstype', 'users', 'user_id'));
    }

    public function companystore(Request $request){
        $request->validate([
            'company_type' => 'required|string',
            'company_name' => 'required|string',
            'aadharcard_number' => 'required|string',
            'registration_date' => 'required|date',
            'renewal_date' => 'required|date',

            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',

            'company_identity' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
            'company_address' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
            'aadharcard' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
            'authority_letter' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
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
            $companyFolder = 'upload/company_' . $data->id;
            if (!file_exists($companyFolder)) {
                mkdir($companyFolder, 0755, true);
            }

            $documents = [];

            if ($request->hasFile('company_identity')) {
                $file = $request->file('company_identity');
                $filename = 'company_identity_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($companyFolder, $filename);

                $documents[] = [
                    'company_id' => $data->id,
                    'file_name' => $filename,
                    'file_type' => 'company_identity',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if ($request->hasFile('aadharcard')) {
                $file = $request->file('aadharcard');
                $filename = 'aadharcard_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($companyFolder, $filename);

                $documents[] = [
                    'company_id' => $data->id,
                    'file_name' => $filename,
                    'file_type' => 'aadharcard',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if ($request->hasFile('company_address')) {
                $file = $request->file('company_address');
                $filename = 'company_address_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($companyFolder, $filename);

                $documents[] = [
                    'company_id' => $data->id,
                    'file_name' => $filename,
                    'file_type' => 'company_address',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if ($request->hasFile('authority_letter')) {
                $file = $request->file('authority_letter');
                $filename = 'authority_letter_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($companyFolder, $filename);

                $documents[] = [
                    'company_id' => $data->id,
                    'file_name' => $filename,
                    'file_type' => 'authority_letter',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            $request->session()->forget('user_id');

            if (!empty($documents)) {
                Documentupload::insert($documents);
            }

            return redirect()->route('home.index')->with('success', 'Company profile and documents added successfully!');


        }else{
            return redirect()->route('home.index')->with('error', 'Failed to update Company profile!');

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

        return redirect()->route('member.index')->with('success', 'Company profile and documents updated successfully');
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

    public function delete($id)
    {
        $data = CompanyPro::with('documents')->find($id);

        if ($data) {
            foreach ($data->documents as $document) {
                $filePath = 'upload/company_' . $data->id . '/' . $document->file_name;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $document->delete();
            }
            $data->delete();

            toastr()->timeOut(5000)->closeButton()->addSuccess('Company and related documents deleted successfully!');
        } else {
            toastr()->timeOut(5000)->closeButton()->addError('Company not found!');
        }

        return redirect()->back();
    }


    public function show($id)
    {
        $data = CompanyPro::with('cities', 'states', 'countries', 'technologies', 'documents')->find($id);

        if (!$data) {
            abort(404, 'Company profile not found');
        }

        return view('admin.membership.company_profile.show', compact('data'));
    }


}
