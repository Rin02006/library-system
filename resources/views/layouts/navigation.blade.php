<nav x-data="{ open: false }" class="bg-[#422719] border-b border-[#805538] shadow-lg">

    <!-- Main Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo and Brand -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        
                        <!-- CUSTOM LIBRARY LOGO -->
                        <div class="w-12 h-12 rounded-xl bg-[#765139] flex items-center justify-center shadow-md border border-[#B98763]/40">
                            <svg viewBox="0 0 240 240" class="w-11 h-11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="120" cy="120" r="108" stroke="#E8D2BF" stroke-width="5"/>
                                <path d="M120 94 C119 57 151 35 184 42 C184 76 161 99 120 110" fill="#B98763" stroke="#F7EDE4" stroke-width="4" stroke-linejoin="round"/>
                                <path d="M120 108 C139 83 157 63 178 48" stroke="#F7EDE4" stroke-width="3.5" stroke-linecap="round"/>
                                <path d="M120 116 C94 99 65 98 42 108 V177 C68 166 96 169 120 190 V116Z" fill="#603B25" stroke="#F7EDE4" stroke-width="5" stroke-linejoin="round"/>
                                <path d="M120 116 C146 99 175 98 198 108 V177 C172 166 144 169 120 190 V116Z" fill="#603B25" stroke="#F7EDE4" stroke-width="5" stroke-linejoin="round"/>
                                <path d="M55 125 C72 120 91 123 105 132" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M55 140 C73 135 91 138 105 147" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M55 155 C73 150 91 153 105 162" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M185 125 C168 120 149 123 135 132" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M185 140 C167 135 149 138 135 147" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M185 155 C167 150 149 153 135 162" stroke="#D5B398" stroke-width="4" stroke-linecap="round"/>
                                <path d="M120 116 V190" stroke="#F7EDE4" stroke-width="4" stroke-linecap="round"/>
                            </svg>
                        </div>

                        <!-- System Name -->
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-[#F7EDE4] leading-tight">Library System</span>
                            <span class="text-[10px] tracking-widest uppercase text-[#D5B398]">Knowledge & Learning</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden space-x-2 sm:ms-10 sm:flex sm:items-center">
                    
                    <!-- Dashboard (Shared) -->
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition duration-200
                       {{ request()->routeIs('dashboard') || request()->routeIs('user.dashboard') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D] hover:text-white' }}">
                        Dashboard
                    </a>

                    @if(auth()->user()->role === 'admin')
                        <!-- ADMIN LINKS -->
                        <a href="{{ route('books.index') }}"
                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition duration-200
                           {{ request()->routeIs('books.*') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D] hover:text-white' }}">
                            Manage Books
                        </a>
                        <a href="{{ route('borrowings.index') }}"
                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition duration-200
                           {{ request()->routeIs('borrowings.*') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D] hover:text-white' }}">
                            Borrow Records
                        </a>
                    @else
                        <!-- USER LINKS -->
                        <a href="{{ route('user.borrow') }}"
                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition duration-200
                           {{ request()->routeIs('user.borrow') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D] hover:text-white' }}">
                            Borrow Books
                        </a>
                        <a href="{{ route('user.records') }}"
                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition duration-200
                           {{ request()->routeIs('user.records') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D] hover:text-white' }}">
                            My Records
                        </a>
                    @endif
                </div>
            </div>

            <!-- Desktop User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-semibold text-[#F7EDE4] hover:bg-[#68432D] focus:outline-none transition duration-200">
                            <div class="w-9 h-9 rounded-full bg-[#D5B398] flex items-center justify-center text-[#422719]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21a8 8 0 00-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"/>
                                </svg>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="bg-[#F7EDE4]">
                            <x-dropdown-link :href="route('profile.edit')" class="text-[#68432D] hover:bg-[#E8D2BF]">
                                Profile
                            </x-dropdown-link>
                            <div class="border-t border-[#D5B398]"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-[#805538] hover:bg-[#E8D2BF] transition">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-[#F7EDE4] hover:bg-[#68432D] focus:outline-none transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open" x-transition class="sm:hidden bg-[#50301F] border-t border-[#805538]">
        <div class="px-4 pt-3 pb-3 space-y-2">
            
            <!-- Dashboard (Shared) -->
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 rounded-lg text-sm font-semibold
               {{ request()->routeIs('dashboard') || request()->routeIs('user.dashboard') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D]' }}">
                Dashboard
            </a>

            @if(auth()->user()->role === 'admin')
                <!-- ADMIN LINKS -->
                <a href="{{ route('books.index') }}"
                   class="block px-4 py-3 rounded-lg text-sm font-semibold
                   {{ request()->routeIs('books.*') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D]' }}">
                    Manage Books
                </a>
                <a href="{{ route('borrowings.index') }}"
                   class="block px-4 py-3 rounded-lg text-sm font-semibold
                   {{ request()->routeIs('borrowings.*') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D]' }}">
                    Borrow Records
                </a>
            @else
                <!-- USER LINKS -->
                <a href="{{ route('user.borrow') }}"
                   class="block px-4 py-3 rounded-lg text-sm font-semibold
                   {{ request()->routeIs('user.borrow') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D]' }}">
                    Borrow Books
                </a>
                <a href="{{ route('user.records') }}"
                   class="block px-4 py-3 rounded-lg text-sm font-semibold
                   {{ request()->routeIs('user.records') ? 'bg-[#B98763] text-white' : 'text-[#E8D2BF] hover:bg-[#68432D]' }}">
                    My Records
                </a>
            @endif
        </div>

        <!-- Mobile User Information -->
        <div class="border-t border-[#805538] px-4 py-4">
            <div class="font-semibold text-sm text-[#F7EDE4]">{{ Auth::user()->name }}</div>
            <div class="text-xs text-[#D5B398] mt-1">{{ Auth::user()->email }}</div>
            <div class="mt-4 space-y-3">
                <a href="{{ route('profile.edit') }}" class="block text-sm text-[#E8D2BF] hover:text-white transition">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-[#D5B398] hover:text-white transition">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>