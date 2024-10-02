<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Dapatkan IP address pengunjung (bisa juga berdasarkan user ID jika ada login)
        $visitorId = $request->ip();

        // Simpan ke cache dengan masa hidup tertentu (misalnya 5 menit)
        Cache::put('visitor_' . $visitorId, true, now()->addMinutes(5));

        return $next($request);
    }
}
