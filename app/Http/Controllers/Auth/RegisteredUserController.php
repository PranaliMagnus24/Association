<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $packageId = $request->query('package_id');

        return view('auth.register', compact('packageId'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
        ]);


            $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name.' '. $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'date_birth' => $request->date_birth,
                'role' => $request->role,
                'password' => Hash::make($request->password),

            ]);
        event(new Registered($user));

        Auth::login($user);

        $request->session()->put('user_id', $user->id);

        if ($request->role === 'bazar') {
            return redirect()->route('bazar.registration')->with('success', 'Registration successful.');
        } else {
            return redirect()->route('home.companyregistration', [
                'user_id' => $user->id,
                'package_id' => $request->package_id,
            ])->with('success', 'Member registered successfully. Please complete your company registration.');
        }
    }


}
