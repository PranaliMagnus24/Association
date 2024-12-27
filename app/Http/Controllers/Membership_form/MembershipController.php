<?php

namespace App\Http\Controllers\Membership_form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Str;
use File;
use Illuminate\Validation\Rule;

class MembershipController extends Controller
{
    public function index()
    {
        $datas = User::where('role', '!=', 'admin')->paginate(5);
        return view('admin.membership.index', compact('datas'));
    }

    public function add(){

        return view('admin.membership.add');
    }

    //Store form
    public function store(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ], [
            'first_name.required' => 'First Name is required.',
            'first_name.string' => 'First Name must be a string',

            'phone.required' => 'The Phone field is required.',
            'phone.numeric' => 'The must be a numeric value.',
        ]);
        $data = new User;
        $data->first_name = $request->first_name;
        $data->middle_name = $request->middle_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date_birth = $request->date_birth;
        $data->gender = $request->gender;


        if(!empty($request->file('profile_pic')))
        {
            if(!empty($data->profile_pic) && file_exists('upload/' .$data->profile_pic))
            {
                unlink('upload/' .$data->profile_pic);
            }
            $file = $request->file('profile_pic');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' .$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $data->profile_pic = $filename;
        }


        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Member added successfully!');
        return redirect()->route('member.index');
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Member deleted successfully!');
         return redirect()->back();
     }

 //edit
     public function edit($id){

        $data = User::find($id);
         return view('admin.membership.edit', compact('data'));
     }

 //update
 public function update(Request $request, $id) {
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|numeric',
        'email' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:255',
            Rule::unique('users')->ignore($id)
        ],
        'middle_name' => 'nullable|string',
    ], [
        'first_name.required' => 'First Name is required.',
        'first_name.string' => 'First Name must be a string',
        'phone.required' => 'The Phone field is required.',
        'phone.numeric' => 'The Phone must be a numeric value.',
    ]);

    $data = User::find($id);
    if (!$data) {
        return redirect()->route('member.index')->withErrors(['User  not found.']);
    }

    $data->first_name = $request->first_name;
    $data->middle_name = $request->middle_name;
    $data->last_name = $request->last_name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->date_birth = $request->date_birth;
    $data->gender = $request->gender;

    if ($request->hasFile('profile_pic')) {
        if (!empty($data->profile_pic) && file_exists('upload/' . $data->profile_pic)) {
            unlink('upload/' . $data->profile_pic);
        }
        $file = $request->file('profile_pic');
        $randomStr = Str::random(30);
        $filename = $randomStr . '.' . $file->getClientOriginalExtension();
        $file->move('upload/', $filename);
        $data->profile_pic = $filename;
    }

    try {
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Member updated successfully!');
    } catch (\Exception $e) {
        return redirect()->route('member.index')->withErrors(['Update failed: ' . $e->getMessage()]);
    }

    return redirect()->route('member.index');
}

    public function show($id)
    {
        $data = User::find($id);
        return view('admin.membership.show', compact('data'));
    }

    public function member_search(Request $request){
        $search = $request->search;
        $datas = User::where('first_name', 'LIKE', '%'.$search.'%')->orWhere('first_name', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.membership.index', compact('datas'));
      }

}
