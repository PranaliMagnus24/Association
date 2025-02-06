<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class EventManagerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $eventform_id = $request->route()->parameter('eventform_id');

        session(['eventform_id' => $eventform_id]);

        if (Auth::check() && Auth::user()->role === 'eventmanager') {
            $request->merge(['eventform_id' => $eventform_id]);
            return $next($request);
        }

        return redirect()->intended(url('/'));
    }
}


