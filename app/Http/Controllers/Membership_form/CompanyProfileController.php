<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\CompanyRegistrationSuccess;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Technology;
use App\Models\CompanyPro;
use App\Models\Membershipyear;
use App\Models\Zipcode;
use App\Models\Membership;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Documentupload;
use Str;
use File;
use Illuminate\Validation\Rule;

class CompanyProfileController extends Controller
{

public function index()
{
    $datas = CompanyPro::with('category', 'subcategory')->paginate(12);
    return view('admin.membership.company_profile.index', compact('datas'));
}

public function add(Request $request, $id=null)
{
    $user_id = ($id != null)? $id: $request->session()->get('user_id');
    $technologies = Technology::all();
    $countries = Country::get(["name", "id"]);
    $memberships = Membershipyear::all();
    $categories = Category::all();
    $membershipstype = Membership::all();
    $users = User::where('role', 'user')->get();
    return view('admin.membership.company_profile.add', compact('technologies', 'countries','memberships','membershipstype', 'users', 'user_id','categories'));
}

public function companystore(Request $request){

    $request->validate([
        'company_type' => 'nullable|string',
        'company_name' => 'required|string',
        'aadharcard_number' => 'nullable|string',
        'registration_date' => 'required|date',
        'renewal_date' => 'required|date',
        'zipcode' => 'nullable','numeric',
        'landline' => 'nullable','numeric',
        'website_url' => 'nullable','url',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
        'services' => 'nullable|string',
        'company_year' => 'required|integer',
        'membership_year' => 'required|integer',
        'company_identity' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
        'company_address' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
        'aadharcard' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
        'authority_letter' => 'nullable|mimes:jpg,png,jpeg,gif,svg,pdf,doc|max:2048',
        'subcategory_id' => 'nullable|string',
        'other_category' => 'nullable|string',
        'other_subcategory' => 'nullable|string',
    ]);

 // **1. Handling "Other" Category**
 if ($request->company_type === 'other' && $request->other_category) {
    $newCategory = Category::create([
        'category_name' => $request->other_category,
        'status' => 'active',
    ]);
    $request->company_type = $newCategory->id;
}

// **2. Handling "Other" Subcategory**
if ($request->subcategory_id === 'other' && $request->other_subcategory) {
    $existingSubcategory = SubCategory::where('subcategory_name', $request->other_subcategory)->first();

    if (!$existingSubcategory) {
        $newSubcategory = SubCategory::create([
            'subcategory_name' => $request->other_subcategory,
            'category_id' => $request->company_type,
            'status' => 'active',
        ]);
        $request->subcategory_id = $newSubcategory->id;
    } else {
        $request->subcategory_id = $existingSubcategory->id;
    }
}

   $data = new CompanyPro;
   $data->company_type = $request->company_type;
   $data->subcategory_id = $request->subcategory_id;
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
   $data->services = $request->services;
   $data->website_url = $request->website_url;
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
        if(!empty($company->company_logo) && file_exists('upload/company_documents/' .$company->company_logo))
        {
            unlink('upload/company_documents/' .$company->company_logo);
        }
        $file = $request->file('company_logo');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/company_documents/',$filename);
       $data->company_logo = $filename;
    }
    if($data->save())
    {
        $user = User::findOrFail($data->user_id);  //send email by user table
        Mail::to($user->email)->send(new CompanyRegistrationSuccess($data->company_name));  //email send

        $companyFolder = 'upload/company_documents/' . $data->id;
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

            toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile and documents added successfully!');
            return redirect()->route('company.list');

    }else{
        toastr()->timeOut(5000)->closeButton()->addSuccess('Failed to update Company profile!');
        return redirect()->route('company.list');
    }

}



public function edit($id){
    $users = User::where('role', 'user')->get();
    $data = CompanyPro::find($id);
    $technologies = Technology::all();
    $countries = Country::get(["name", "id"]);
    $memberships = Membershipyear::all();
    $membershipstype = Membership::all();
    $categories = Category::all();
     return view('admin.membership.company_profile.add', compact('technologies', 'countries','memberships','membershipstype', 'users', 'data','categories'));
 }

 public function update(Request $request, $id): RedirectResponse
{
    $data = CompanyPro::find($id);

    // Check if the company profile exists
    if (!$data) {
        toastr()->timeOut(5000)->closeButton()->addError('Company profile not found!');
        return redirect()->route('profile.index');
    }

    $request->validate([
        'company_type' => 'nullable|string',
        'company_name' => 'required|string',
        'aadharcard_number' => 'nullable|string',
        'registration_date' => 'required|date',
        'renewal_date' => 'required|date',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'company_year' => 'required',
        'membership_year' => 'required',
        'about_company' => 'required',

    ]);

    if ($request->company_type === 'other' && $request->other_category) {
        $newCategory = Category::create([
            'category_name' => $request->other_category,
            'status' => 'active',
        ]);
        $data->company_type = $newCategory->id;
    } elseif ($request->company_type !== 'other') {
        $data->company_type = $request->company_type;
    }


    if ($request->subcategory_id === 'other' && $request->other_subcategory) {
        $existingSubcategory = SubCategory::where('subcategory_name', $request->other_subcategory)->first();

        if (!$existingSubcategory) {
            $newSubcategory = SubCategory::create([
                'subcategory_name' => $request->other_subcategory,
                'category_id' => $data->company_type,
                'status' => 'active',
            ]);
            $data->subcategory_id = $newSubcategory->id;
        } else {
            $data->subcategory_id = $existingSubcategory->id;
        }
    } elseif ($request->subcategory_id !== 'other') {
        $data->subcategory_id = $request->subcategory_id;
    }



    if ($request->hasFile('company_logo')) {
        if (!empty($data->company_logo) && file_exists(public_path('upload/company_documents/' . $data->company_logo))) {
            unlink(public_path('upload/company_documents/' . $data->company_logo));
        }
        $file = $request->file('company_logo');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/company_documents/'), $filename);
        $data->company_logo = $filename;
    }

    // Update other fields
    $input = $request->except('company_logo');
    $data->update($input);


    $documents = ['company_identity', 'company_address', 'aadharcard', 'authority_letter'];
    foreach ($documents as $document) {
        if ($request->hasFile($document)) {
            $existingDocument = Documentupload::where('company_id', $id)->where('file_type', $document)->first();
            if ($existingDocument && file_exists(public_path('upload/company_documents/' . $existingDocument->file_name))) {
                unlink(public_path('upload/company_documents/' . $existingDocument->file_name));
            }

            $file = $request->file($document);
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/company_documents/' . $id), $fileName);

            Documentupload::updateOrCreate(
                ['company_id' => $id, 'file_type' => $document],
                ['file_name' => $fileName]
            );
        }
    }

    toastr()->timeOut(5000)->closeButton()->addSuccess('Company profile and documents updated successfully!');
    return redirect()->route('company.list');
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
            $filePath = 'upload/company_documents/' . $data->id . '/' . $document->file_name;
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
    $data = CompanyPro::with('cities', 'states', 'countries', 'technologies', 'documents','category', 'subcategory')->find($id);

    if (!$data) {
        abort(404, 'Company profile not found');
    }

    return view('admin.membership.company_profile.show', compact('data'));
}


public function getSubcategories($category_id)
{
    $subcategories = SubCategory::where('category_id', $category_id)->get();

    if ($subcategories->isEmpty()) {
        return response()->json(['error' => 'No subcategories found'], 404);
    }

    return response()->json($subcategories);
}


}
