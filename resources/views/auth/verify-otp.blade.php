<x-guest-layout>
    <div class="mb-6 text-sm text-gray-600 text-center">
        <div class="text-4xl mb-2">✉️</div>
        {{ __('We sent a 6-digit security code to your email.') }}
        <br>
        <span class="font-bold text-[#765139]">{{ Auth::user()->email }}</span>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <div class="mt-4">
            <x-input-label for="otp" :value="__('Verification Code')" class="text-center w-full block mb-2 text-[#4B3621]" />
            <x-text-input id="otp" class="block mt-2 w-full text-center text-2xl tracking-[0.5em] font-bold py-3 border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] text-[#4B3621]" 
                          type="text" name="otp" maxlength="6" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2 text-center" />
        </div>

        <div class="flex items-center justify-center mt-6">
            <button type="submit" class="w-full justify-center py-3 bg-[#765139] hover:bg-[#5A3D2B] text-white font-bold rounded-xl shadow-md transition">
                {{ __('Verify & Continue') }}
            </button>
        </div>
    </form>

    <!-- Proper Logout Link -->
    <div class="text-center mt-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-[#805538] hover:text-[#4B3621] underline focus:outline-none">
                {{ __('Cancel and Back to Login') }}
            </button>
        </form>
    </div>
</x-guest-layout>