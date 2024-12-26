<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index(){
        $datas = Tax::paginate(5);
        return view('admin.master_settings.tax.index', compact('datas'));
    }

    //View add form
    public function add()
   {
    return view('admin.master_settings.tax.add');
   }

   //Store form
    public function store(Request $request){
        $request->validate([
            'percent' => 'required|numeric',
        ], [
            'percent.required' => 'The percentage is required.',
            'percent.numeric' => 'The percentage must be a numeric value.',

        ]);
        $data = new Tax;
        $data->name = $request->name;
        $data->percent = $request->percent;
        $data->desc = $request->desc;
        $data->status = $request->status;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Tax added successfully!');
        return redirect()->route('tax.index');
    }

//delete
    public function delete($id){
        $data = Tax::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Tax deleted successfully!');
         return redirect()->back();
     }

 //edit
     public function edit($id){

        $data = Tax::find($id);
         return view('admin.master_settings.tax.edit', compact('data'));
     }

 //update
     public function update(Request $request,$id){
        $request->validate([
            'percent' => 'required|numeric',
        ], [
            'percent.required' => 'The percentage is required.',
            'percent.numeric' => 'The percentage must be a numeric value.',

        ]);
        $data = Tax::find($id);
        $data->name = $request->name;
        $data->percent = $request->percent;
        $data->desc = $request->desc;
        $data->status = $request->status;
        $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Tax updated successfully!');
         return redirect()->route('tax.index');
     }

     public function show($id)
    {
        $data = Tax::find($id);
        return view('admin.master_settings.tax.show', compact('data'));
    }

    public function tax_search(Request $request){
        $search = $request->search;
        $datas = Tax::where('name', 'LIKE', '%'.$search.'%')->orWhere('name', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.master_settings.tax.index', compact('datas'));
      }
}
