<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use PragmaRX\Google2FA\Google2FA;

class Google2FAMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $google2fa = new Google2FA();

            if ($user->google2fa_secret) {
                if (!$request->session()->has('otp_verified')) {
                    return redirect()->route('otp.verify');
                }
            }
        }
        return $next($request);
    }
}
