<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'user') {
            $data_user = Auth::user()->data_user;
            if (is_null($data_user)) {
                Alert::toast('Silakan lengkapi Profile Anda terlebih dahulu.', 'warning');
                return redirect()->route('user.profile');
            }
        }

        return $next($request);
    }
}
