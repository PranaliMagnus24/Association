<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed','max:8'],
        'captcha' => 'required|captcha',
    ]);

    $request->authenticate();
    $request->session()->regenerate();

    if ($request->user()->role === 'bazar') {
        return redirect()->route('catalog.list')->with('success', 'Welcome to Bazar!');
    } elseif ($request->user()->role === 'user') {
        if (!$request->user()->company) {
            return redirect()->route('home.companyregistration', ['user_id' => $request->user()->id])
                             ->with('info', 'Please complete your company profile.');
        } else {
            return redirect('/member');
        }
    }

    //End condition

    if ($request->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($request->user()->role === 'eventmanager') {
        $eventform_id = session('eventform_id');

        if (!$eventform_id) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('qrpage', ['eventform_id' => $eventform_id]);
    }

    return redirect()->intended(url('/'));
}


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
