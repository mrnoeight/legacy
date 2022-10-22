<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class AuthenticateClient
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
        if (! Auth::check()) {
            return redirect('login');
        }
        else if (Auth::user()->type == Registration::CLIENT) { // if the current role is client
            return $next($request);
        }
        else {
            abort(403, "Cannot access to restricted page");
        }
    }
}
