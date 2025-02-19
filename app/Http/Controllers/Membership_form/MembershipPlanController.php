<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;
use Str;
use File;

class MembershipPlanController extends Controller
{
    public function list(){
        $plans = MembershipPlan::paginate(2);
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
            'oneyear_fee' => 'required|numeric',
            'fiveyear_fee' => 'nullable|numeric',
            'package_term' => 'nullable|string',
            'numberof_year' => 'nullable|numeric|required_with:yearly_fee',
            'yearly_fee' => 'nullable|numeric|required_with:numberof_year',
            'trial' => 'required|string',
            'trial_days' => 'nullable|numeric',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'status' => 'nullable|string',
            'plan_image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'numberof_year.required_with' => 'Number of Years field is required.',
            'yearly_fee.required_with' => 'Number of Years fee is required',
        ]);


        $plan = new MembershipPlan;
        $plan->package_title = $request->package_title;
        $plan->application_fee = $request->application_fee;
        $plan->plan_description = $request->plan_description;
        $plan->oneyear_fee = $request->oneyear_fee;
        $plan->fiveyear_fee = $request->fiveyear_fee;
        $plan->package_term = $request->package_term;
        $plan->numberof_year = $request->numberof_year;
        $plan->yearly_fee = $request->yearly_fee;
        $plan->trial = $request->trial;
        $plan->trial_days = $request->trial_days;
        $plan->meta_keyword = $request->meta_keyword;
        $plan->meta_description = $request->meta_description;
        $plan->status = $request->status;

        if(!empty($request->file('plan_image')))
    {
        if(!empty( $plan->plan_image) && file_exists('upload/membership_plan/' . $plan->plan_image))
        {
            unlink('upload/membership_plan/' . $plan->plan_image);
        }
        $file = $request->file('plan_image');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' .$file->getClientOriginalExtension();
        $file->move('upload/membership_plan/',$filename);
        $plan->plan_image = $filename;
    }
    $plan->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('Plan created successfully');
    return redirect()->route('membershipplan.list');

   }




   public function edit($id){

    $plan = MembershipPlan::find($id);
     return view('admin.membership.membership_plan.edit_plan', compact('plan'));
 }

 public function update(Request $request, $id)
 {
    $request->validate([
        'package_title' => 'required|string',
        'application_fee' => 'required|numeric',
        'plan_description' => 'required|string',
        'oneyear_fee' => 'required|numeric',
        'fiveyear_fee' => 'nullable|numeric',
        'package_term' => 'nullable|string',
        'numberof_year' => 'nullable|numeric|required_with:yearly_fee',
        'yearly_fee' => 'nullable|numeric|required_with:numberof_year',
        'trial' => 'required|string',
        'trial_days' => 'nullable|numeric',
        'meta_keyword' => 'nullable|string',
        'meta_description' => 'nullable|string',
        'status' => 'nullable|string',
        'plan_image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ], [
        'numberof_year.required_with' => 'Number of Years field is required.',
        'yearly_fee.required_with' => 'Number of Years fee is required',
    ]);

     $plan = MembershipPlan::findOrFail($id);

     $plan->package_title = $request->package_title;
     $plan->application_fee = $request->application_fee;
     $plan->plan_description = $request->plan_description;
     $plan->oneyear_fee = $request->oneyear_fee;
     $plan->fiveyear_fee = $request->fiveyear_fee;
     $plan->package_term = $request->package_term;
     $plan->numberof_year = $request->numberof_year;
     $plan->yearly_fee = $request->yearly_fee;
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
