<section>
    <header>
        <h2 class="text-xl font-bold text-[#422719]">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-[#805538]">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-[#603B25] font-bold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-xl border-[#D5B398] focus:border-[#805538] focus:ring-[#805538] bg-[#E8D2BF] text-[#422719]" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-[#603B25] font-bold" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-xl border-[#D5B398] focus:border-[#805538] focus:ring-[#805538] bg-[#E8D2BF] text-[#422719]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-[#603B25] font-bold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-xl border-[#D5B398] focus:border-[#805538] focus:ring-[#805538] bg-[#E8D2BF] text-[#422719]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center justify-center bg-[#603B25] hover:bg-[#422719] text-white font-semibold px-7 py-3 rounded-xl shadow-sm transition duration-200">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-[#45613C] font-semibold">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>