<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
use App\Mail\ApplyJob;
use Str;
use File;




class JobController extends Controller
{

    public function index(Request $request)
{
    $user = auth()->user(); // Get the authenticated user
    $companyProfile = CompanyPro::where('user_id', $user->id)->first(); // Retrieve the company profile

    $search = $request->get('search');
    $state = $request->get('state');
    $city = $request->get('city');

    // Start with the base query and include related data (states, cities, and countries)
    $jobs = Job::with(['category', 'subcategory', 'countries', 'states', 'cities'])
        ->when($search, function ($query) use ($search) {
            $query->where('job_title', 'like', "%{$search}%")
                  ->orWhere('job_desc', 'like', "%{$search}%");
        })
        ->when($state, function ($query) use ($state) {
            // Filter by the state relationship
            $query->whereHas('states', function ($query) use ($state) {
                $query->where('id', $state); // Filter by state ID
            });
        })
        ->when($city, function ($query) use ($city) {
            // Filter by the city relationship
            $query->whereHas('cities', function ($query) use ($city) {
                $query->where('id', $city); // Filter by city ID
            });
        })
        ->paginate(5); // Pagination should come last after applying filters

    // Load states for India (assuming country_id = 101 for India)
    $states = State::where('country_id', 101)->get();

    // Dynamically load cities based on selected state
    $cities = $state ? City::where('state_id', $state)->get() : collect(); // Load cities based on selected state

    // Return the view with the jobs, states, cities, and company profile
    return view('member.job.joblist', [
        'jobs' => $jobs,
        'states' => $states,
        'cities' => $cities,
        'companyProfile' => $companyProfile // Pass the company profile to the view
    ]);
}


    public function createjob()
    {

        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        $categories = Category::all();
        $countries = Country::get(["name", "id"]);
        $states = State::get(["name", "id"]);
        $cities = City::where('state_id',$companyProfile->state)->get(["name", "id"]);
        return view('member.job.job', [
            'user' => $user,
            'companyProfile' => $companyProfile,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_desc' => 'required|string',
            'vacancy' => 'nullable|integer',
            'category' => 'nullable|string|exists:category,id',
            'subcategory' => 'nullable|string|exists:subcategory,id',
            'skill' => 'required|string|max:255',
            'salary' => 'nullable|string|max:255',
            'exp_req' => 'nullable|string|max:255',
            'country' => 'required|string|exists:countries,id',
            'state' => 'required|string|exists:states,id',
            'city' => 'required|string|exists:cities,id',
            'status' => 'required|string|max:255',
            'upload_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc|max:2048',
        ]);

        $companyProfile = CompanyPro::where('user_id', auth()->id())->first();

        if (!$companyProfile) {
            return redirect()->back()->with('error', 'Company profile not found for the user.');
        }

        $job = new Job;

        if ($request->hasFile('upload_document')) {
            $file = $request->file('upload_document');

            $folderPath = public_path('upload/company_documents/' . $companyProfile->id);
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $filename);
            $job->upload_document = $companyProfile->id . '/' . $filename;
        }

        $job->company_id = $companyProfile->id;
        $job->company = $request->company;
        $job->contact = $request->contact;
        $job->email = $request->email;
        $job->address = $request->address;
        $job->job_title = $request->job_title;
        $job->job_desc = $request->job_desc;
        $job->vacancy = $request->vacancy;
        $job->category_id = $request->category_id;
        $job->subcategory_id = $request->subcategory_id;
        $job->skill = $request->skill;
        $job->salary = $request->salary;
        $job->exp_req = $request->exp_req;
        $job->country = $request->country;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->status = $request->status;
        try {
            if ($job->save()) {
                toastr()->timeOut(5000)->closeButton()->addSuccess('Job created successfully!');
                return redirect()->route('joblist');
            } else {
                return redirect()->back()->with('error', 'Failed to save the job.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)

    {
        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        $countries = Country::select("id", "name")->get();
        $states = State::get(["name", "id"]);
        $cities = City::where('state_id',$companyProfile->state)->get(["name", "id"]);
        $categories = Category::all();
        $job = Job::findOrFail($id);
        return view('member.job.jobedit',[
            'user' => $user,
            'companyProfile' => $companyProfile,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories,
            'job' => $job
        ]);
    }

    public function update(Request $request, $id)
    {

        $job = Job::findOrFail($id);

        if ($request->hasFile('upload_document')) {
            if ($job->upload_document && file_exists(public_path('upload/company_documents/' . $job->upload_document))) {
                unlink(public_path('upload/company_documents/' . $job->upload_document));
            }

            $file = $request->file('upload_document');
            $folderPath = public_path('upload/company_documents/' . $job->company_id);
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }

            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();

            $file->move($folderPath, $filename);

            $job->upload_document = $job->company_id . '/' . $filename;
        }

        $job->company = $request->company;
        $job->contact = $request->contact;
        $job->email = $request->email;
        $job->address = $request->address;
        $job->job_title = $request->job_title;
        $job->job_desc = $request->job_desc;
        $job->vacancy = $request->vacancy;
        $job->category_id = $request->category_id;
        $job->subcategory_id = $request->subcategory_id;
        $job->skill = $request->skill;
        $job->salary = $request->salary;
        $job->exp_req = $request->exp_req;
        $job->country = $request->country;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->status = $request->status;

        // Save the updated job to the database
        $job->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Job updated successfully!');
        return redirect()->route('joblist');
    }


    public function delete($id)
    {
        $job = Job::findOrFail($id);
        if (!empty($job->upload_document) && File::exists(public_path('upload/company_documents/' . $job->upload_document))) {
            File::delete(public_path('upload/company_documents/' . $job->upload_document));
        }
        $job->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Job deleted successfully!');
        return redirect()->route('joblist');
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

     public function getSubcategories($category_id)
     {
         $subcategories = SubCategory::where('category_id', $category_id)->get();
         return response()->json($subcategories);
     }


     public function show($id)
     {
         $job = Job::with(['category', 'subcategory', 'countries', 'states', 'cities'])->find($id);
         $user = auth()->user();
         $companyProfile = CompanyPro::where('user_id', $user->id)->first();
         if (!$job) {

             return redirect()->route('joblist')->with('error', 'Job not found.');
         }

         return view('member.job.jobview', [
             'job' => $job,
             'companyProfile' => $companyProfile,
             'country' => $job->countries,
             'state' => $job->states,
             'city' => $job->cities

         ]);
     }


////Job Apply
public function applyJob(Request $request)
{
    try {
        $formType = $request->input('form_type');

        if ($formType === 'apply_job') {
            $companyId = $request->input('company_id');
            $jobId = $request->input('job_id');

            $companyPro = CompanyPro::findOrFail($companyId);
            $user = User::findOrFail($companyPro->user_id);
            $job = Job::findOrFail($jobId);

            $jobApply = new JobApply;
            $jobApply->name = $request->input('name');
            $jobApply->phone = $request->input('phone');
            $jobApply->to = $request->input('to');
            $jobApply->subject = $request->input('subject');
            $jobApply->message = $request->input('message');
            $jobApply->company_id = $companyPro->id;
            $jobApply->job_id = $jobId;

            if ($request->hasFile('upload_resume')) {

                $fileName = time() . '.' . $request->file('upload_resume')->extension();
                $request->file('upload_resume')->move(public_path('upload/resume'), $fileName);

                $jobApply->upload_resume = $fileName;

                // Send email to the admin with the resume attached
                $adminEmail = $user->email;

                // Ensure admin email is configured
                if (!$adminEmail) {
                    return response()->json([
                        'success' => false,
                        'message' => 'User email not configured. Please contact support.',
                    ]);
                }

                // Send email with the resume attached
                Mail::to($adminEmail)->send(new ApplyJob($jobApply, $fileName));

                return response()->json([
                    'success' => true,
                    'message' => 'Your message has been sent to the company!',
                ]);
            }

            // Save the job application data without file upload
            $jobApply->save();

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent to the company!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid form type.',
            ]);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred: ' . $e->getMessage(),
        ]);
    }
}


    }
