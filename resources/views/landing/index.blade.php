<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Library System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-[#F5EEDC] font-sans text-[#4B3621]">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

        <div class="max-w-5xl w-full mx-auto text-center">

            <!-- LARAVEL MATCHING LOGO -->
            <div class="flex justify-center mb-8">
                <div class="w-28 h-28 rounded-3xl bg-[#765139] flex items-center justify-center shadow-lg border border-[#B98763]/40">
                    
                    <!-- Exact SVG from the Login Page -->
                    <svg viewBox="0 0 240 240" class="w-[100px] h-[100px]" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Outer Circle -->
                        <circle cx="120" cy="120" r="108" stroke="#E8D2BF" stroke-width="5"/>
                        
                        <!-- Leaf -->
                        <path d="M120 94 C119 57 151 35 184 42 C184 76 161 99 120 110" fill="#B98763" stroke="#F7EDE4" stroke-width="4" stroke-linejoin="round"/>
                        
                        <!-- Leaf Detail -->
                        <path d="M120 108 C139 83 157 63 178 48" stroke="#F7EDE4" stroke-width="3.5" stroke-linecap="round"/>
                        
                        <!-- Left Book Page -->
                        <path d="M120 116 C94 99 65 98 42 108 V177 C68 166 96 169 120 190 V116Z" fill="#603B25" stroke="#F7EDE4" stroke-width="5" stroke-linejoin="round"/>
                        
                        <!-- Right Book Page -->
                        <path d="M120 116 C146 99 175 98 198 108 V177 C172 166 144 169 120 190 V116Z" fill="#603B25" stroke="#F7EDE4" stroke-width="5" stroke-linejoin="round"/>
                        
                        <!-- Left Page Lines -->
                        <path d="M55 125 C72 120 91 123 105 132" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        <path d="M55 140 C73 135 91 138 105 147" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        <path d="M55 155 C73 150 91 153 105 162" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        
                        <!-- Right Page Lines -->
                        <path d="M185 125 C168 120 149 123 135 132" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        <path d="M185 140 C167 135 149 138 135 147" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        <path d="M185 155 C167 150 149 153 135 162" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                        
                        <!-- Center Book Spine -->
                        <path d="M120 116 V190" stroke="#F7EDE4" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            <!-- Welcome Heading -->
            <h1 class="text-4xl sm:text-5xl font-extrabold text-[#4B3621] tracking-tight mb-5">
                Library Resource
                <span class="block text-[#98734C]">
                    Management System
                </span>
            </h1>

            <!-- Description -->
            <p class="text-base sm:text-lg text-[#8B7355] mb-10 max-w-2xl mx-auto leading-8">
                Manage books, track borrowing transactions,
                monitor returns, and handle overdue records
                efficiently with our secure platform.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                @if (Route::has('login'))
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="w-full sm:w-auto px-9 py-3.5 bg-[#765438] text-[#FFFCF5] font-semibold rounded-xl shadow-md hover:bg-[#5C4029] hover:shadow-lg transition duration-200">
                        Librarian Login
                    </a>

                    <!-- Register Button -->
                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-9 py-3.5 bg-[#E9DCC3] text-[#5C4029] font-semibold rounded-xl border border-[#D8C6A8] hover:bg-[#DED0B8] transition duration-200">
                        Register Account
                    </a>
                @endif
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-20 max-w-4xl mx-auto">
                <div class="p-5 rounded-xl bg-[#EFE4D0]">
                    <h3 class="font-bold text-[#5C4029] mb-2">Book Management</h3>
                    <p class="text-sm text-[#8B7355]">Organize and manage library books easily.</p>
                </div>
                <div class="p-5 rounded-xl bg-[#EFE4D0]">
                    <h3 class="font-bold text-[#5C4029] mb-2">Borrowing Records</h3>
                    <p class="text-sm text-[#8B7355]">Keep track of borrowed and returned books.</p>
                </div>
                <div class="p-5 rounded-xl bg-[#EFE4D0]">
                    <h3 class="font-bold text-[#5C4029] mb-2">Easy Monitoring</h3>
                    <p class="text-sm text-[#8B7355]">Monitor overdue books and transactions.</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-16 border-t border-[#DCCDB4] pt-6">
                <p class="text-sm text-[#8B7355]">
                    &copy; {{ date('Y') }} Library System. Aldrin Abao Caralipio.
                </p>
                <p class="text-xs text-[#A08B6D] mt-2">
                    Your Library, Organized and Accessible.
                </p>
            </div>

        </div>

    </div>

</body>
</html>