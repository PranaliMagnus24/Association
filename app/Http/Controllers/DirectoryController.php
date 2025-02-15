<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FAQ;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\CompanyPro;
use App\Models\CompanyReview;
use App\Models\Gallery;
use App\Models\Job;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\SubCategory;
use Str;
use File;

class DirectoryController extends Controller
{
    public function directory(Request $request)
{
    $selectedCategory = $request->get('category');
    $query = CompanyPro::query();
    if ($selectedCategory) {
        $query->where('company_type', $selectedCategory);
    }

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

    return view('home.directory', compact('companyprofiles', 'states', 'cities','selectedCategory'));
}


    //directory details page
    public function show($id) {
        $companypro = CompanyPro::with('cities', 'states', 'countries', 'technologies','reviews')->find($id);
        $user = auth()->user();
        $averageRating = $companypro->reviews()->where('status', 'active')->avg('star_rating');
          return view('home.directory_display', compact('companypro','user','averageRating'));
      }



      //Rating Review logic
public function store(Request $request) {
    $request->validate([
        'company_id' => 'required',
        'comment' => 'required|string|max:200',
        'rating' => 'required|integer|between:1,5',
        'rating_name' => 'required_if:guest,true|string|max:255',
        'email' => 'required_if:guest,true|email|max:255',
        'contact' => 'required_if:guest,true|string|max:15',
    ]);

    if (Auth::check()) {
        CompanyReview::create([
            'company_id' => $request->company_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'star_rating' => $request->rating,
            'status' => 'active',
        ]);
        return redirect()->back()->with('success', 'Your review has been submitted.');
    } else {
        $token = Str::random(32);
        $review = CompanyReview::create([
            'company_id' => $request->company_id,
            'rating_name' => $request->rating_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'comment' => $request->comment,
            'star_rating' => $request->rating,
            'status' => 'inactive',
            'email_verified_at' => $token,
        ]);

        // Send Verification Email
        Mail::send('home.contact.review_verification', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Verify Your Review');
        });

        return redirect()->back()->with('success', 'A verification email has been sent.');
    }
}

public function verify($token) {
    $review = CompanyReview::where('email_verified_at', $token)->first();

    if (!$review) {
        return redirect()->route('home.directory')->with('error', 'Invalid verification token.');
    }

    $id = $review->company_id;
    $review->update(['status' => 'active', 'email_verified_at' => now()]);

    return redirect()->route('directory.view', ['id' => $id])->with('success', 'Your review has been verified.');
}



public function showComments($id)
{
    $companypro = CompanyPro::findOrFail($id);
    $comments = $companypro->reviews()->where('status', 'active')->orderBy('created_at', 'desc')->get();

    $output = '';
    foreach ($comments as $comment) {
        $formattedDate = \Carbon\Carbon::parse($comment->created_at)->format('d F Y');
        $stars = str_repeat('★', $comment->star_rating) . str_repeat('☆', 5 - $comment->star_rating);

        $output .= '
        <div class="comment-box">
            <p><strong>' . e($comment->rating_name ?? $comment->user->name) . '</strong></p>
            <p class="rating-date">
                <span class="stars" style="color: gold; font-size: 18px;">' . $stars . '</span>
                <span class="date" style="margin-left: 10px; color: gray;">' . $formattedDate . '</span>
            </p>
            <p class="comment-text">' . e($comment->comment) . '</p>
            <hr>
        </div>';
    }

    if ($comments->isEmpty()) {
        $output = '<p>No comments available.</p>';
    }

    return response()->json(['html' => $output]);
}


}
