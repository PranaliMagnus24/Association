<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;
use App\Models\Membershipyear;
use Str;
use File;

class MembershipPlanController extends Controller
{
    public function list(){
        $plans = MembershipPlan::paginate(10);
        return view('admin.membership.membership_plan.list_plan', compact('plans'));
    }

    public function create(){

        return view('admin.membership.membership_plan.create_plan');
    }

    public function store(Request $request)
    {

        $request->validate([
            'package_title' => 'required|string',
            'application_fee' => 'required|numeric',
            'plan_description' => 'required|string',
            'package_term' => 'nullable|string',
            'trial' => 'required|string',
            'trial_days' => 'nullable|numeric',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'status' => 'nullable|string',
            'plan_image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'membership_year' => 'nullable|array',
            'membership_year.*' => 'nullable|string',
            'numberof_year' => 'nullable|array',
            'numberof_year.*' => 'nullable|numeric',
            'membership_fee' => 'nullable|array',
            'membership_fee.*' => 'nullable|numeric',
        ]);
        $plan = new MembershipPlan();
        $plan->package_title = $request->package_title;
        $plan->application_fee = $request->application_fee;
        $plan->plan_description = $request->plan_description;
        $plan->package_term = $request->package_term;
        $plan->trial = $request->trial;
        $plan->trial_days = $request->trial_days;
        $plan->meta_keyword = $request->meta_keyword;
        $plan->meta_description = $request->meta_description;
        $plan->status = $request->status;

        if ($request->hasFile('plan_image')) {
            $file = $request->file('plan_image');
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/membership_plan/'), $filename);
            $plan->plan_image = $filename;
        }

        $plan->save();
        if ($request->has('membership_year')) {
            foreach ($request->membership_year as $index => $year) {
                if (!empty($year) && !empty($request->membership_fee[$index])) {
                    $membershipYear = new Membershipyear();
                    $membershipYear->membership_plan_id = $plan->id;
                    $membershipYear->membership_year = $year;
                    $membershipYear->numberof_year = $request->numberof_year[$index] ?? null;
                    $membershipYear->membership_fee = $request->membership_fee[$index];
                    $membershipYear->save();
                }
            }
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Plan created successfully');
        return redirect()->route('membershipplan.list');
    }




    public function edit($id)
    {
        $plan = MembershipPlan::findOrFail($id);
        $membershipYears = Membershipyear::where('membership_plan_id', $id)->get();

        return view('admin.membership.membership_plan.edit_plan', compact('plan', 'membershipYears'));
    }


 public function update(Request $request, $id)
{
    $request->validate([
        'package_title' => 'required|string',
        'application_fee' => 'required|numeric',
        'plan_description' => 'required|string',
        'package_term' => 'nullable|string',
        'trial' => 'required|string',
        'trial_days' => 'nullable|numeric',
        'meta_keyword' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'status' => 'nullable|string',
        'plan_image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $plan = MembershipPlan::findOrFail($id);

    $plan->package_title = $request->package_title;
    $plan->application_fee = $request->application_fee;
    $plan->plan_description = $request->plan_description;
    $plan->package_term = $request->package_term;
    $plan->trial = $request->trial;
    $plan->trial_days = $request->trial_days;
    $plan->meta_keyword = $request->meta_keyword;
    $plan->meta_description = $request->meta_description;
    $plan->status = $request->status;

    if ($request->hasFile('plan_image')) {
        if (!empty($plan->plan_image) && file_exists(public_path('upload/membership_plan/' . $plan->plan_image))) {
            unlink(public_path('upload/membership_plan/' . $plan->plan_image));
        }

        $file = $request->file('plan_image');
        $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/membership_plan/'), $filename);
        $plan->plan_image = $filename;
    }

    $plan->save();

    // Update Membershipyear table
    if ($request->has('membership_year')) {
        // Delete old membership years related to this plan
        Membershipyear::where('membership_plan_id', $plan->id)->delete();

        // Insert new membership years
        foreach ($request->membership_year as $index => $year) {
            $membershipYear = new Membershipyear();
            $membershipYear->membership_plan_id = $plan->id;
            $membershipYear->membership_year = $year;
            $membershipYear->numberof_year = $request->numberof_year[$index] ?? null;
            $membershipYear->membership_fee = $request->membership_fee[$index];
            $membershipYear->save();
        }
    }

    toastr()->timeOut(5000)->closeButton()->addSuccess('Plan updated successfully');
    return redirect()->route('membershipplan.list');
}


 public function delete($id)
 {
     $plan = MembershipPlan::findOrFail($id);

     if (!empty($plan->plan_image) && file_exists(public_path('upload/membership_plan/' . $plan->plan_image))) {
         unlink(public_path('upload/membership_plan/' . $plan->plan_image));
     }

     $plan->delete();

     toastr()->timeOut(5000)->closeButton()->addSuccess('Plan deleted successfully!');
     return redirect()->back();
 }

 public function show($id)
 {
     $plan = MembershipPlan::find($id);

     if (!$plan) {
         abort(404, 'Plan not found');
     }

     return view('admin.membership.membership_plan.display_plan', compact('plan'));
 }
}
