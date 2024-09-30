<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // if (Auth::check()) {
        //     $expireTime = Carbon::now()->addSeconds(30);
        //     Cache::put('user-is-online:' . Auth::user()->id, true, $expireTime);
        //     User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        // }

        // if (Auth::check()) {
        //     if (Auth::user()->role === 'admin' && Gate::allows('admin')) {
        //         return $next($request);
        //     } elseif (Auth::user()->role === 'lembaga' && Gate::allows('lembaga')) {
        //         return $next($request);
        //     } elseif (Auth::user()->role === 'user' && Gate::allows('user')) {
        //         return $next($request);
        //     }
        // }

        {
            if (Auth::check()) {
                $expireTime = Carbon::now()->addSeconds(30);
                Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
                User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
            }
            if ($request->user()->role !== $role) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        }




        // return abort(403);
        //  if (Auth::check()) {
        //     $expireTime = Carbon::now()->addSeconds(30);
        //     Cache::put('user-is-online-' . Auth::user()->id, true, $expireTime);
        //     User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        // }
        // if ($request->user()->role !== $role) {
        //     abort(403, 'Unauthorized action.');
        // }

        // return $next($request);
    }
}
