<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fees;
use App\Models\Membership;

class FeesController extends Controller
{
    public function index(){

        $datas = Fees::paginate(5);
        return view('admin.master_settings.fees.index', compact('datas'));
    }

    //View add form
    public function add()
   {
    $memberships = Membership::all();
    return view('admin.master_settings.fees.add', compact('memberships'));
   }

   //Store form
    public function store(Request $request){
        $request->validate([
            'application_fee' => 'required|numeric',
            'subscription_fee' => 'required|numeric',
            'membership_id' => 'required|exists:membership,id',
        ], [
            'application_fee.required' => 'The application fee field is required.',
            'application_fee.numeric' => 'The application fee must be a numeric value.',
            'subscription_fee.required' => 'The subscription fee field is required.',
            'subscription_fee.numeric' => 'The subscription fee must be a numeric value.',
        ]);
        $data = new Fees;
        $data->application_fee = $request->application_fee;
        $data->subscription_fee = $request->subscription_fee;
        $data->desc = $request->desc;
        $data->status = $request->status;
        $data->membership_id = $request->membership_id;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Fees added successfully!');
        return redirect()->route('fee.index');
    }

//delete
    public function delete($id){
        $data = Fees::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Fees deleted successfully!');
         return redirect()->back();
     }

 //edit
     public function edit($id){

        $data = Fees::find($id);
         return view('admin.master_settings.fees.edit', compact('data'));
     }

 //update
     public function update(Request $request,$id){
        $request->validate([
            'application_fee' => 'required|numeric',
            'subscription_fee' => 'required|numeric',
        ], [
            'application_fee.required' => 'The application fee field is required.',
            'application_fee.numeric' => 'The application fee must be a numeric value.',
            'subscription_fee.required' => 'The subscription fee field is required.',
            'subscription_fee.numeric' => 'The subscription fee must be a numeric value.',
        ]);
        $data = Fees::find($id);
        $data->application_fee = $request->application_fee;
        $data->subscription_fee = $request->subscription_fee;
        $data->desc = $request->desc;
        $data->status = $request->status;
        $data->membership_id = $request->membership_id;
        $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Fees updated successfully!');
         return redirect()->route('fee.index');
     }

     public function show($id)
    {
        $data = Fees::find($id);
        return view('admin.master_settings.fees.show', compact('data'));
    }


    //search fees list
    public function fees_search(Request $request){
        $search = $request->search;
        $datas = Fees::where('application_fee', 'LIKE', '%'.$search.'%')->orWhere('application_fee', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.master_settings.fees.index', compact('datas'));
      }
}
