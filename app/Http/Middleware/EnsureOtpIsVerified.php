<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOtpIsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (auth()->check()) {
            
            // If they have an OTP, they MUST be on the OTP page
            if (auth()->user()->otp_code !== null) {
                
                // If they try to go ANYWHERE else (except logout), kick them back
                if ($request->path() !== 'verify-otp' && $request->path() !== 'logout') {
                    return redirect()->route('otp.verify.form');
                }
            }
        }

        return $next($request);
    }
}