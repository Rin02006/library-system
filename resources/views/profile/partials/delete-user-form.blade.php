<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-[#422719]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-[#805538]">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center gap-1 bg-[#F0DDDA] hover:bg-[#E4C5BF] text-[#8B4035] font-semibold text-sm px-5 py-2.5 rounded-xl transition"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-[#F7EDE4]">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-[#422719]">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-[#805538]">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-xl border-[#D5B398] focus:border-[#805538] focus:ring-[#805538] bg-[#E8D2BF] text-[#422719]"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center justify-center bg-[#D5B398] hover:bg-[#C49A78] text-[#422719] font-semibold px-6 py-3 rounded-xl transition">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="ms-3 inline-flex items-center justify-center bg-[#F0DDDA] hover:bg-[#E4C5BF] text-[#8B4035] font-semibold px-6 py-3 rounded-xl shadow-sm transition duration-200">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>