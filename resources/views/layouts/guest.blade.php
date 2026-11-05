
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library Management System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-[#4B3621]">

    <!-- Main Background -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 bg-[#F5EBDD]">

        <div class="w-full max-w-md">

            <!-- Authentication Card -->
            <div class="w-full px-6 py-8 sm:px-10 bg-[#FFFCF5]
                        border border-[#E8DDC8] shadow-lg rounded-2xl">

                <!-- CUSTOM OPEN BOOK + LEAF LOGO -->
                <div class="flex flex-col items-center justify-center text-center mb-8">

                    <!-- Logo Background -->
                    <div class="w-24 h-24 rounded-2xl bg-[#765139]
                                flex items-center justify-center
                                shadow-md border border-[#B98763]/40
                                mb-4">

                        <!-- Open Book and Leaf SVG -->
                        <svg viewBox="0 0 240 240"
                             class="w-[88px] h-[88px]"
                             fill="none"
                             xmlns="http://www.w3.org/2000/svg">

                            <!-- Outer Circle -->
                            <circle cx="120" cy="120" r="108"
                                    stroke="#E8D2BF"
                                    stroke-width="5"/>

                            <!-- Leaf -->
                            <path d="M120 94
                                     C119 57 151 35 184 42
                                     C184 76 161 99 120 110"
                                  fill="#B98763"
                                  stroke="#F7EDE4"
                                  stroke-width="4"
                                  stroke-linejoin="round"/>

                            <!-- Leaf Detail -->
                            <path d="M120 108
                                     C139 83 157 63 178 48"
                                  stroke="#F7EDE4"
                                  stroke-width="3.5"
                                  stroke-linecap="round"/>

                            <!-- Left Book Page -->
                            <path d="M120 116
                                     C94 99 65 98 42 108
                                     V177
                                     C68 166 96 169 120 190
                                     V116Z"
                                  fill="#603B25"
                                  stroke="#F7EDE4"
                                  stroke-width="5"
                                  stroke-linejoin="round"/>

                            <!-- Right Book Page -->
                            <path d="M120 116
                                     C146 99 175 98 198 108
                                     V177
                                     C172 166 144 169 120 190
                                     V116Z"
                                  fill="#603B25"
                                  stroke="#F7EDE4"
                                  stroke-width="5"
                                  stroke-linejoin="round"/>

                            <!-- Left Page: Three Lines -->
                            <path d="M55 125 C72 120 91 123 105 132"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <path d="M55 140 C73 135 91 138 105 147"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <path d="M55 155 C73 150 91 153 105 162"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <!-- Right Page: Three Lines -->
                            <path d="M185 125 C168 120 149 123 135 132"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <path d="M185 140 C167 135 149 138 135 147"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <path d="M185 155 C167 150 149 153 135 162"
                                  stroke="#D5B398"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                            <!-- Center Book Spine -->
                            <path d="M120 116 V190"
                                  stroke="#F7EDE4"
                                  stroke-width="4"
                                  stroke-linecap="round"/>

                        </svg>

                    </div>

                    <!-- System Name -->
                    <h1 class="text-2xl font-bold text-[#4B3621]">
                        Library Management
                    </h1>

                    <p class="text-sm text-[#A58B70] mt-1">
                        Your gateway to knowledge and learning
                    </p>

                </div>

                <!-- Login / Register Form -->
                {{ $slot }}

            </div>

            <!-- Footer -->
            <div class="text-center mt-6">

                <p class="text-xs text-[#A58B70]">
                    Library Resource Management System
                </p>

                <p class="text-xs text-[#B49B7E] mt-1">
                    © {{ date('Y') }} All Rights Reserved.
                </p>

            </div>

        </div>

    </div>

</body>
</html>
