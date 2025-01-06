<?php

namespace App\Http\Controllers\Master_Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmailController extends Controller
{
    public function index(){

        $users = User::where('role', '!=', 'admin')->paginate(5);
        return view('admin.master_settings.email.index', compact('users'));
    }
    public function delete_email($id){

        $user = User::find($id);
        $user->delete();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Verified user deleted successfully!');
         return redirect()->back();
     }
}
