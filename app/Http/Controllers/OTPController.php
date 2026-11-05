<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OTPController extends Controller
{
    public function showVerifyForm()
    {
        // If the user doesn't have an OTP pending, send them to dashboard
        if (!Auth::check() || Auth::user()->otp_code === null) {
            return redirect()->route('dashboard');
        }

        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ], [
            'otp.required' => 'Please enter the OTP.',
            'otp.digits' => 'The OTP must be exactly 6 digits.'
        ]);

        $user = Auth::user();
        $enteredOtp = (string) $request->otp;
        $storedOtp = (string) $user->otp_code;

        if ($storedOtp === $enteredOtp && now()->lt($user->otp_expires_at)) {
            
            // Success! Clear the OTP
            $user->update([
                'otp_code' => null, 
                'otp_expires_at' => null
            ]);

            // Send to the correct dashboard based on role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'OTP verified successfully!');
            } else {
                return redirect()->route('user.dashboard')->with('success', 'OTP verified successfully!');
            }
        }

        return back()->withErrors(['otp' => 'The OTP is incorrect or has expired.']);
    }
}