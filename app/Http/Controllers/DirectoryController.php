<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FAQ;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPro;
use App\Models\Gallery;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use Str;
use File;

class DirectoryController extends Controller
{
    public function directory(Request $request)
{
    $query = CompanyPro::query();

    // Search filter
    if ($request->has('search') && !empty($request->search)) {
        $query->where('company_name', 'like', '%' . $request->search . '%')
              ->orWhere('about_company', 'like', '%' . $request->search . '%');
    }

    // Filter by state name
    if ($request->has('state_id') && !empty($request->state_id)) {
        $query->where('state', $request->state_id);
    }

    // Filter by city name
    if ($request->has('city_id') && !empty($request->city_id)) {
        $query->where('city', $request->city_id);
    }

    $companyprofiles = $query->inRandomOrder()->paginate(12);


    $states = State::where('country_id', 101)->get();


    $cities = $request->has('state_id')
        ? City::where('state_id', $request->state_id)->get()
        : collect();

    return view('home.directory', compact('companyprofiles', 'states', 'cities'));
}


    //directory details page
    public function show($id) {
        $companypro = CompanyPro::with('cities', 'states', 'countries', 'technologies')->find($id);
        $user = auth()->user();
          return view('home.directory_display', compact('companypro','user'));
      }
}
