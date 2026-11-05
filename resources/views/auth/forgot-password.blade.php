<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-[#4B3621]">Forgot Password?</h2>
        <p class="text-sm font-medium text-[#805538] mt-2 leading-relaxed">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#4B3621] font-bold text-sm" />
            <x-text-input id="email" 
                          class="block mt-2 w-full rounded-xl border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] bg-[#F9F6F0] text-[#4B3621] placeholder-[#A58B70]" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          placeholder="Enter your email address"
                          required 
                          autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between mt-8 gap-4 sm:gap-0">
            <a class="underline text-sm font-medium text-[#805538] hover:text-[#4B3621] rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Back to Login') }}
            </a>

            <button type="submit" class="w-full sm:w-auto bg-[#765139] hover:bg-[#5A3D2B] text-white font-bold py-3 px-8 rounded-xl shadow-md transition hover:-translate-y-0.5">
                {{ __('Email Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>