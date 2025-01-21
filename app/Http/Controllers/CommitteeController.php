<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Committee;
use App\Models\Position;
use Str;
use File;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::paginate(5);
        return view('admin.committee.index', compact('committees'));
    }

    public function add()
    {

        $positions = Position::all();
        return view('admin.committee.add', compact('positions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'member_name' => 'required|string|max:255',
        ]);

        $data = new Committee();

        if ($request->hasFile('profile')) {
            if (!empty($data->profile) && file_exists('upload/' . $data->profile)) {
                unlink('upload/' . $data->profile);
            }
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $data->profile = $filename;
        }


    $data->member_name = $request->member_name;
    $data->position = $request->position;
    $data->summary = $request->summary;
    $data->status = $request->status;

    // Save the data
    $data->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('Committee created successfully.');
    return redirect()->route('committee.index');
    }

    public function edit($id)
    {
        $positions = Position::all();
       $data = Committee::findOrFail($id);
        return view('admin.committee.edit', compact('data','positions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_name' => 'required|string|max:255',
            'position' => 'required|string',
        ]);

       $data = Committee::findOrFail($id);
       $data->update($request->all());

       toastr()->timeOut(5000)->closeButton()->addSuccess('Committee updated successfully.');
       return redirect()->route('committee.index');

    }

    public function delete($id)
    {
       $data = Committee::findOrFail($id);
       $data->delete();
       toastr()->timeOut(5000)->closeButton()->addSuccess('Committee deleted successfully.');
       return redirect()->route('committee.index');
    }


    public function show($id)
   {
       $data = Committee::find($id);
       return view('admin.committee.show', compact('data'));
   }

   public function faq_search(Request $request){
       $search = $request->search;
       $datas = Committee::where('member_name', 'LIKE', '%'.$search.'%')->orWhere('member_name', 'LIKE', '%'.$search.'%')->paginate(3);
       return view('admin.committee.index', compact('datas'));
     }
}
