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
use App\Models\Interview;
use App\Mail\ApplyJob;
use App\Mail\InterviewScheduledMail;
use Str;
use File;
class JobController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        $companyProfile = CompanyPro::where('user_id', $user->id)->first();

        // Get the search, category, and sort values from the request
        $search = $request->get('search');
        $category = $request->get('category');
        $sort = $request->get('sort', 'desc'); // Default sorting is descending (most recent first)

        // Start with the base query and include related data (categories, states, cities)
        $jobs = Job::with(['category', 'subcategory', 'countries', 'states', 'cities'])
            ->withCount('jobApplications')
            ->when($search, function ($query) use ($search) {
                // Apply the search query only if search is provided
                $query->where('job_title', 'like', "%{$search}%");
            })
            ->when($category, function ($query) use ($category) {
                // Apply the category filter if provided
                $query->where('category_id', $category);
            })
            ->orderBy('created_at', $sort) // Order by creation date (latest first)
            ->orderBy('job_title', 'asc') // Secondary sorting by job title alphabetically if needed
            ->paginate(5);

        // Get all categories for the filter
        $categories = Category::all();

        // Return the view with the jobs, categories, and company profile
        return view('member.job.joblist', [
            'jobs' => $jobs,
            'categories' => $categories,
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
            'contact' => 'required|digits:10',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'address' => 'required|string|max:255',
          'job_title' => 'required|string|max:200|regex:/^[A-Za-z0-9\s\-\_?!@#$&]+$/',
            'job_desc' => 'required|string',
            'vacancy' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'skill' => 'required|string',
            'salary' => 'nullable|integer',
            'exp_req' => 'nullable|integer',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'job_end_date' => 'nullable',
            'job_type' => 'required',
            'job_mode' => 'required',
            'other_category' => 'nullable|string|max:255',
            'other_subcategory' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'upload_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc|max:2048',
        ]);



        $companyProfile = CompanyPro::where('user_id', auth()->id())->first();

        if (!$companyProfile) {
            return redirect()->back()->with('error', 'Company profile not found for the user.');
        }

        $job = new Job;

    //select other for new category
    if ($request->category_id === 'other' && $request->other_category) {
        $newCategory = Category::create([
            'category_name' => $request->other_category,
            'status' => 'active',
        ]);
        $request->category_id = $newCategory->id;
    }

 //select other for new category
if ($request->subcategory_id === 'other' && $request->other_subcategory) {

    $existingSubcategory = SubCategory::where('subcategory_name', $request->other_subcategory)->first();
    if ($existingSubcategory) {
        $request->subcategory_id = $existingSubcategory->id;
    } else {

        $newSubcategory = SubCategory::create([
            'subcategory_name' => $request->other_subcategory,
            'category_id' => $request->category_id,
            'status' => 'active',
        ]);
        $request->subcategory_id = $newSubcategory->id;
    }
}
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
        $job->job_end_date = $request->job_end_date;
        $job->job_type = $request->job_type;
        $job->job_mode = $request->job_mode;
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
        $subcategories = SubCategory::all();
        $job = Job::findOrFail($id);
        return view('member.job.jobedit',[
            'user' => $user,
            'companyProfile' => $companyProfile,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'job' => $job
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'contact' => 'required|digits:10',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'address' => 'required|string|max:255',
          'job_title' => 'required|string|max:200|regex:/^[A-Za-z0-9\s\-\_?!@#$&]+$/',
            'job_desc' => 'required|string',
            'vacancy' => 'required|integer',
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'skill' => 'required|string',
            'salary' => 'nullable|integer',
            'exp_req' => 'nullable|integer',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'job_end_date' => 'nullable',
            'job_type' => 'required',
            'job_mode' => 'required',
            'other_category' => 'nullable|string|max:255',
            'other_subcategory' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            'upload_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc|max:2048',
        ]);


        $job = Job::findOrFail($id);

        // Check if "Other" is selected for category
        if ($request->category_id === 'other' && $request->other_category) {
            // Check if the category already exists
            $existingCategory = Category::where('category_name', $request->other_category)->first();
            if ($existingCategory) {
                $request->category_id = $existingCategory->id; // Use the existing category ID
            } else {
                // Create a new category
                $newCategory = Category::create([
                    'category_name' => $request->other_category,
                    'status' => 'active', // Set the status as needed
                ]);
                $request->category_id = $newCategory->id; // Use the new category ID
            }
        }

        // Check if "Other" is selected for subcategory
        if ($request->subcategory_id === 'other' && $request->other_subcategory) {
            // Check if the subcategory already exists
            $existingSubcategory = SubCategory::where('subcategory_name', $request->other_subcategory)->first();
            if ($existingSubcategory) {
                $request->subcategory_id = $existingSubcategory->id; // Use the existing subcategory ID
            } else {
                // Create a new subcategory
                $newSubcategory = SubCategory::create([
                    'subcategory_name' => $request->other_subcategory,
                    'category_id' => $request->category_id,
                    'status' => 'active', // Set the status as needed
                ]);
                $request->subcategory_id = $newSubcategory->id; // Use the new subcategory ID
            }
        }

        // Handle file upload
        if ($request->hasFile('upload_document')) {
            // Delete the old file if it exists
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

        // Update job details
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
        $job->job_end_date = $request->job_end_date;
        $job->job_type = $request->job_type;
        $job->job_mode = $request->job_mode;
        $job->status = $request->status;

        // Save the updated job to the database
        try {
            $job->save();
            toastr()->timeOut(5000)->closeButton()->addSuccess('Job updated successfully!');
            return redirect()->route('joblist');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update the job: ' . $e->getMessage());
        }
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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|digits:10',
        'to' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        'subject' => 'required|string|max:255',
        'message' => 'nullable|string',
        'upload_resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
    ]);

    try {
        $formType = $request->input('form_type');
        if ($formType !== 'apply_job') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid form type.',
            ]);
        }

        $companyId = $request->input('company_id');
        $jobId = $request->input('job_id');

        $companyPro = CompanyPro::findOrFail($companyId);
        $user = User::findOrFail($companyPro->user_id);
        $job = Job::findOrFail($jobId);

        // Create a new JobApply instance
        $jobApply = new JobApply;
        $jobApply->name = $validated['name'];
        $jobApply->phone = $validated['phone'];
        $jobApply->to = $validated['to'];
        $jobApply->subject = $validated['subject'];
        $jobApply->message = $validated['message'];
        $jobApply->company_id = $companyPro->id;
        $jobApply->job_id = $jobId;

        if ($request->hasFile('upload_resume')) {
            $file = $request->file('upload_resume');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('upload/resume'), $fileName);
            $jobApply->upload_resume = $fileName;
        }

        $jobApply->save();

        if ($request->hasFile('upload_resume')) {
            $adminEmail = $user->email;

            if (!$adminEmail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Admin email not configured. Please contact support.',
                ]);
            }
            Mail::to($adminEmail)->send(new ApplyJob($jobApply, $fileName));
        }
        return response()->json([
            'success' => true,
            'message' => 'Your application has been sent successfully!',
        ]);
    } catch (\Exception $e) {
        \Log::error('Job application error: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);

        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
        ]);
    }
}


///Job Applicatnts list
public function jobApplyList(Request $request, $job_id)
{
    $user = auth()->user();
    $companyProfile = CompanyPro::where('user_id', $user->id)->first();

    $query = JobApply::with('interview')->where('job_id', $job_id);

    // Apply filter based on the selected filter type
    if ($request->has('filter_by') && $request->filter_by != '') {
        $filter = $request->filter_by;

        if ($filter == 'name' && $request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        } elseif ($filter == 'email' && $request->has('email') && $request->email != '') {
            $query->where('to', 'like', '%' . $request->email . '%');
        } elseif ($filter == 'phone' && $request->has('phone') && $request->phone != '') {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
    }

    // Sorting: Default by created_at (desc)
    $sortColumn = $request->get('sort_by', 'created_at'); // Default sorting by 'created_at'
    $sortDirection = $request->get('sort_direction', 'desc'); // Default sorting is descending
    $applications = $query->orderBy($sortColumn, $sortDirection)->paginate(10);

    return view('member.job.job_apply_list', compact('applications', 'companyProfile', 'user', 'job_id'));
}



//Applicant Details
public function jobapplydetails($id)
{
    $apply = JobApply::find($id);

    if (!$apply) {
        return redirect()->route('jobapplydetails')->with('error', 'Application not found');
    }
         $user = auth()->user();
         $companyProfile = CompanyPro::where('user_id', $user->id)->first();


         return view('member.job.job_apply_details', [
             'apply' => $apply,
             'companyProfile' => $companyProfile,
             'user' => $user

         ]);
}


///Interview Data with mail
public function interview(Request $request)
{
    $user = auth()->user();
    $companyProfile = CompanyPro::where('user_id', $user->id)->first();

    $apply = JobApply::find($request->input('applicant_id'));

    if (!$apply) {
        return redirect()->route('jobapplylist', ['job_id' => $job_id])->with('error', 'Applicant not found');
    }

    $job_id = $apply->job_id;

    $interview = new Interview;
    $interview->applicant_id = $apply->id;
    $interview->action = $request->input('action');
    $interview->interview_date = $request->input('interview_date');
    $interview->interview_time = $request->input('interview_time');
    $interview->interview_address = $request->input('interview_address');
    $interview->interview_instructions = $request->input('interview_instructions');

    $interview->save();

    // Prepare email data
    $emailData = [
        'name' => $apply->name,
        'company_name' => $companyProfile->company_name,
        'action' => $interview->action,
        'interview_date' => $interview->interview_date,
        'interview_time' => $interview->interview_time,
        'interview_address' => $interview->interview_address,
        'interview_instructions' => $interview->interview_instructions,
    ];

    // Send email
    Mail::to($apply->to)->send(new InterviewScheduledMail($emailData));

    toastr()->timeOut(5000)->closeButton()->addSuccess('Interview Status Mail Send Successfully!');
    return redirect()->route('jobapplylist', ['job_id' => $job_id]);

}

    }
