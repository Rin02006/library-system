<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTPEmail;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => ['required'],
        ], [
            'g-recaptcha-response.required' => 'Please check the reCAPTCHA box to prove you are human.',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.'])->withInput();
        }

        // 1. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 2. Generate OTP
        $otp = rand(100000, 999999);
        
        // 🔥 FORCE SAVE OTP TO DATABASE (Bypasses $fillable)
        $user->forceFill([
            'otp_code' => (string) $otp,
            'otp_expires_at' => now()->addMinutes(15)
        ])->save();

        // 3. Try to send email (wrapped so it doesn't crash)
        try {
            Mail::to($user->email)->send(new SendOTPEmail($otp));
        } catch (\Exception $e) {
            // Ignore email error
        }

        // 4. Log them in and force them to the OTP page
        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('otp.verify.form')->with('status', 'Registration successful! Please check your email for the OTP.');
    }
}