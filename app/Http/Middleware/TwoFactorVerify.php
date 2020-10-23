<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //get current user's secret code
        $secretCode = auth()->user()->secret_code;

        if ($secretCode && !session("2fa_verified")) {
            return redirect()->route("authCode");
        }
        return $next($request);
    }
}
