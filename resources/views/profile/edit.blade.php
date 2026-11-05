<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl shadow-lg
                    bg-gradient-to-r from-[#422719] via-[#70452D] to-[#B98763]
                    px-6 py-7 sm:px-10">

            <!-- Decorative Circles -->
            <div class="absolute -right-10 -top-16 w-56 h-56
                        rounded-full border-[22px] border-white/5"></div>

            <div class="absolute right-24 -bottom-20 w-40 h-40
                        rounded-full bg-[#E8D2BF]/10"></div>

            <div class="relative z-10">

                <p class="text-[#E8D2BF] text-xs font-semibold
                          uppercase tracking-[0.2em] mb-2">
                    Library Management System
                </p>

                <h1 class="text-3xl sm:text-4xl font-bold text-[#F7EDE4]"
                    style="font-family: Georgia, serif;">
                    My Profile
                </h1>

                <p class="text-[#F0DCCB] mt-2 text-sm sm:text-base">
                    Manage your personal information and account settings.
                </p>

                <div class="w-16 h-1 bg-[#D5B398] rounded-full mt-5"></div>

            </div>
        </div>
    </x-slot>


    <!-- Main Background -->
    <div class="min-h-screen bg-[#E8D2BF] py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Profile Introduction -->
            <div class="mb-8 flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl
                            bg-gradient-to-br from-[#603B25] to-[#A97852]
                            flex items-center justify-center shadow-md">

                    <svg class="w-7 h-7 text-[#F7EDE4]"
                         fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M20 21a8 8 0 00-16 0m8-10a5 5 0 100-10 5 5 0 000 10z"/>
                    </svg>

                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#422719]"
                        style="font-family: Georgia, serif;">
                        Account Settings
                    </h2>

                    <p class="text-sm text-[#805538] mt-1">
                        Keep your account information updated and secure.
                    </p>
                </div>

            </div>


            <!-- Profile Information -->
            <div class="relative overflow-hidden mb-7
                        bg-gradient-to-br from-[#FFFCF5] to-[#F7EDE4]
                        border border-[#C49A78]/40
                        shadow-lg rounded-2xl">

                <div class="absolute -right-12 -top-16 w-48 h-48
                            rounded-full bg-[#C49A78]/10"></div>

                <div class="relative z-10 p-6 sm:p-9">

                    <div class="flex items-center gap-4 mb-7 pb-5
                                border-b border-[#C49A78]/30">

                        <div class="w-12 h-12 rounded-xl
                                    bg-[#E8D2BF] text-[#603B25]
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm7-1h5m-2.5-2.5v5"/>
                            </svg>

                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#422719]"
                                style="font-family: Georgia, serif;">
                                Personal Information
                            </h3>

                            <p class="text-xs text-[#A97852] mt-1">
                                Update your name and email address.
                            </p>
                        </div>

                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                </div>
            </div>


            <!-- Password Settings -->
            <div class="relative overflow-hidden mb-7
                        bg-gradient-to-br from-[#FFFCF5] to-[#F7EDE4]
                        border border-[#C49A78]/40
                        shadow-lg rounded-2xl">

                <div class="absolute -right-12 -top-16 w-48 h-48
                            rounded-full bg-[#B98763]/10"></div>

                <div class="relative z-10 p-6 sm:p-9">

                    <div class="flex items-center gap-4 mb-7 pb-5
                                border-b border-[#C49A78]/30">

                        <div class="w-12 h-12 rounded-xl
                                    bg-[#E8D2BF] text-[#805538]
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <rect x="4" y="10" width="16" height="11"
                                      rx="2" stroke-width="1.8"/>

                                <path stroke-linecap="round"
                                      stroke-width="1.8"
                                      d="M8 10V7a4 4 0 018 0v3m-4 5v2"/>
                            </svg>

                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#422719]"
                                style="font-family: Georgia, serif;">
                                Password & Security
                            </h3>

                            <p class="text-xs text-[#A97852] mt-1">
                                Keep your account protected with a secure password.
                            </p>
                        </div>

                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>

                </div>
            </div>


            <!-- Delete Account -->
            <div class="relative overflow-hidden
                        bg-gradient-to-br from-[#FFFCF5] to-[#F7EDE4]
                        border border-[#C49A78]/40
                        shadow-lg rounded-2xl">

                <div class="absolute -right-12 -top-16 w-48 h-48
                            rounded-full bg-[#A97852]/10"></div>

                <div class="relative z-10 p-6 sm:p-9">

                    <div class="flex items-center gap-4 mb-7 pb-5
                                border-b border-[#C49A78]/30">

                        <div class="w-12 h-12 rounded-xl
                                    bg-[#E8D2BF] text-[#805538]
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M3 6h18m-2 0l-1 14H6L5 6m4 0V4h6v2m-5 4v6m4-6v6"/>
                            </svg>

                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#422719]"
                                style="font-family: Georgia, serif;">
                                Account Management
                            </h3>

                            <p class="text-xs text-[#A97852] mt-1">
                                Manage your account deletion settings.
                            </p>
                        </div>

                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>


            <!-- Footer -->
            <div class="mt-9 mb-3">

                <div class="flex items-center justify-center gap-4">

                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>

                    <p class="text-sm font-medium text-[#805538] text-center">
                        Library Resource Management System
                    </p>

                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
