<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index(){
        $datas = Technology::paginate(5);
        return view('admin.master_settings.technologies.index', compact('datas'));
    }

    //View add form
    public function add()
   {
    return view('admin.master_settings.technologies.add');
   }

   //Store form
    public function store(Request $request){
        $data = new Technology;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->status = $request->status;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Technologies added successfully!');
        return redirect()->route('technology.index');
    }

//delete
    public function delete($id){
        $data = Technology::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Technologies deleted successfully!');
         return redirect()->back();
     }

 //edit
     public function edit($id){

        $data = Technology::find($id);
         return view('admin.master_settings.technologies.edit', compact('data'));
     }

 //update
     public function update(Request $request,$id){
        $data = Technology::find($id);

        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->status = $request->status;
        $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Technologies updated successfully!');
         return redirect()->route('technology.index');
     }

     public function show($id)
    {
        $data = Technology::find($id);
        return view('admin.master_settings.technologies.show', compact('data'));
    }
}
