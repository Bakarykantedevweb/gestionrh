<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAgentAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('webagent')->check()) {
            // Agent authentifié, redirection
            return redirect('/agent-dashboard'); // Remplacez '/dashboard' par l'URL vers laquelle vous souhaitez rediriger l'agent
        }

        return $next($request);
    }
}
