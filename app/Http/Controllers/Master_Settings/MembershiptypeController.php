<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;

class MembershiptypeController extends Controller
{

    //Display list
    public function index()
    {
        $memberships = Membership::paginate(5);
        return view('admin.master_settings.membership.index', compact('memberships'));
    }

    //Add add form
    public function add()
   {
    return view('admin.master_settings.membership.add');
   }

   //store form
   public function store(Request $request)
   {
    $request->validate([
        'title' => 'required',
        'desc' => 'required',
        'status' => 'required',
    ]);

    Membership::create($request->all());
    toastr()->timeOut(5000)->closeButton()->addSuccess('Membership added successfully!');
    return redirect()->route('memberships.index');
   }

   //edit form
   public function edit($id)
    {
        $membership =  Membership::find($id);
        return view('admin.master_settings.membership.edit', compact('membership'));
    }


//update form
    public function update(Request $request, $id)
    {
        $membership =  Membership::find($id);
        $membership->update($request->all());
        toastr()->timeOut(5000)->closeButton()->addSuccess('Membership updated successfully!');
        return redirect()->route('memberships.index');
    }


    //delete form
    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Membership deleted successfully!');
        return redirect()->back();
    }

    //view form
    public function show($id)
    {
        $membership = Membership::find($id);
        return view('admin.master_settings.membership.show', compact('membership'));
    }

    public function membership_search(Request $request){
        $search = $request->search;
        $memberships = Membership::where('title', 'LIKE', '%'.$search.'%')->orWhere('title', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.master_settings.membership.index', compact('memberships'));
      }



}
