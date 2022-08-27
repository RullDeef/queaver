<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OnlineUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $expiresAt = now()->addSeconds(config('user-online.expires_after'));

            Cache::put('user-is-online-' . $id, true, $expiresAt);
            User::findOrFail($id)->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}
