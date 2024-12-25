<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fees;

class FeesController extends Controller
{
    public function index(){
        $datas = Fees::paginate(5);
        return view('admin.master_settings.fees.index', compact('datas'));
    }

    //View add form
    public function add()
   {
    return view('admin.master_settings.fees.add');
   }

   //Store form
    public function store(Request $request){
        $request->validate([
            'application_fee' => 'required|integer',
            'subscription_fee' => 'required|integer',
            'status' => 'required',
        ]);
        $data = new Fees;
        $data->application_fee = $request->application_fee;
        $data->subscription_fee = $request->subscription_fee;
        $data->desc = $request->desc;
        $data->status = $request->status;

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
        $data = Fees::find($id);
        $data->application_fee = $request->application_fee;
        $data->subscription_fee = $request->subscription_fee;
        $data->desc = $request->desc;
        $data->status = $request->status;
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
