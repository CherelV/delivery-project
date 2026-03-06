<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DeliveryManAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  

    public function handle(Request $request, Closure $next):Response
    {
        if (!Auth::guard('deliveryMan')->check()) {
            // Store the intended URL to redirect after login
            session(['redirect_after_login' => $request->fullUrl()]);
            return redirect()->route('deliveryMan.login'); //route not let define
        }

        return $next($request);
    }
}
