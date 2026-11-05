<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-[#4B3621]">Create an Account</h2>
        <p class="text-sm font-medium text-[#805538] mt-2">Join the Library System today.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-[#4B3621] font-bold text-sm" />
            <x-text-input id="name" 
                          class="block mt-2 w-full rounded-xl border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] bg-[#F9F6F0] text-[#4B3621] placeholder-[#A58B70]" 
                          type="text" name="name" :value="old('name')" placeholder="Enter your full name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-[#4B3621] font-bold text-sm" />
            <x-text-input id="email" 
                          class="block mt-2 w-full rounded-xl border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] bg-[#F9F6F0] text-[#4B3621] placeholder-[#A58B70]" 
                          type="email" name="email" :value="old('email')" placeholder="Enter your email address" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#4B3621] font-bold text-sm" />
            
            <!-- Password Input with Eye Icon -->
            <div class="relative mt-2">
                <x-text-input id="password" 
                              class="block w-full rounded-xl border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] bg-[#F9F6F0] text-[#4B3621] placeholder-[#A58B70] pr-12" 
                              type="password" name="password" placeholder="Create a password" required autocomplete="new-password" />
                
                <!-- Eye Button -->
                <button type="button" 
                        onclick="togglePassword('password', 'eyeIcon1')" 
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#A58B70] hover:text-[#765139] transition">
                    <svg id="eyeIcon1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#4B3621] font-bold text-sm" />
            
            <!-- Confirm Password Input with Eye Icon -->
            <div class="relative mt-2">
                <x-text-input id="password_confirmation" 
                              class="block w-full rounded-xl border-[#E8DCC5] focus:border-[#765139] focus:ring-[#765139] bg-[#F9F6F0] text-[#4B3621] placeholder-[#A58B70] pr-12" 
                              type="password" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password" />
                
                <!-- Eye Button -->
                <button type="button" 
                        onclick="togglePassword('password_confirmation', 'eyeIcon2')" 
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#A58B70] hover:text-[#765139] transition">
                    <svg id="eyeIcon2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- reCAPTCHA Box -->
        <div class="mt-6 flex justify-center">
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        </div>
        @error('g-recaptcha-response')
            <div class="text-center mt-2">
                <span class="text-red-500 text-sm font-medium">{{ $message }}</span>
            </div>
        @enderror

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between mt-8 gap-4 sm:gap-0">
            <a class="underline text-sm font-medium text-[#805538] hover:text-[#4B3621] rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="w-full sm:w-auto bg-[#765139] hover:bg-[#5A3D2B] text-white font-bold py-3 px-8 rounded-xl shadow-md transition hover:-translate-y-0.5">
                {{ __('Register') }}
            </button>
        </div>
    </form>

    <!-- Script for Toggle Password -->
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</x-guest-layout>