<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membershipyear;
use Illuminate\Support\Facades\DB;

class MembershipYearController extends Controller
{

    //Display Membership year list
    public function index(){
        $datas = Membershipyear::paginate(5);
        return view('admin.master_settings.membership_year.index', compact('datas'));
    }


    //Display Membership year form
    public function add()
    {
     return view('admin.master_settings.membership_year.add');
    }

//Store membership year form
 public function store(Request $request){


    $membershipYears = $request->input('membership_year');
    $defaultYears = $request->input('default_year');
    $membershipFees = $request->input('membership_fee');
    $statuses = $request->input('status');

    foreach ($membershipYears as $key => $year) {
        Membershipyear::create([
            'membership_year' => $year,
            'default_year' => $defaultYears[$key],
            'membership_fee' => $membershipFees[$key],
            'status' => $statuses[$key],
        ]);
    }

    toastr()->timeOut(5000)->closeButton()->addSuccess('Years added successfully!');
    return redirect()->route('membershipyear.index');
    }



    //delete membership year
    public function delete($id){
        $data = Membershipyear::find($id);
        $data->delete();
        // DB::table('membershipyear')->truncate();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Membership year deleted successfully!');
         return redirect()->back();
     }

 //edit
     public function edit($id){

        $data = Membershipyear::find($id);
         return view('admin.master_settings.membership_year.edit', compact('data'));
     }

 //update
     public function update(Request $request,$id){
        $request->validate([
            'membership_year' => 'nullable',
            'membership_year.*' => 'nullable',
            'default_year' => 'nullable',
            'membership_fee' => 'nullable',
            'membership_fee.*' => 'numeric',
            'status' => 'nullable',
        ]);
        $data = Membershipyear::find($id);
        $data->membership_year = $request->membership_year;
        $data->membership_fee = $request->membership_fee;
        $data->status = $request->status;
        $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Membership year updated successfully!');
         return redirect()->route('membershipyear.index');
     }

     public function show($id)
    {
        $data = Membershipyear::find($id);
        return view('admin.master_settings.membership_year.show', compact('data'));
    }

    public function tax_search(Request $request){
        $search = $request->search;
        $datas = Membershipyear::where('membership_year', 'LIKE', '%'.$search.'%')->orWhere('membership_year', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.master_settings.membership_year.index', compact('datas'));
      }


}
