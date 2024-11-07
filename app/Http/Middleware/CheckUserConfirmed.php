<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserConfirmed
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
        if (Auth::check() && !Auth::user()->is_confirmed) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['nip' => 'Akun Anda belum dikonfirmasi oleh admin.']);
        }

        return $next($request);
    }
}
