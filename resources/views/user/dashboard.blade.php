<x-app-layout>

    <!-- Welcome Banner -->
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl shadow-lg bg-gradient-to-r from-[#422719] via-[#70452D] to-[#B98763] px-6 py-8 sm:px-10 sm:py-9">
            <div class="absolute -right-10 -top-16 w-64 h-64 rounded-full border-[25px] border-white/5"></div>
            <div class="absolute right-20 -bottom-24 w-48 h-48 rounded-full bg-[#E8D2BF]/10"></div>

            <div class="relative z-10">
                <p class="text-[#E8D2BF] text-sm font-semibold uppercase tracking-[0.2em] mb-2">Library Management System</p>
                <h1 class="text-3xl sm:text-4xl font-bold text-[#F7EDE4]">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-[#F0DCCB] mt-3 text-sm sm:text-base">Here is your personal library space.</p>
                <div class="w-20 h-1 bg-[#D5B398] rounded-full mt-5"></div>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#E8D2BF] py-7">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Overdue Alert -->
            @if($hasOverdue)
                <div class="mb-6 flex items-center gap-3 bg-[#F0DDDA] border border-[#E4C5BF] text-[#8B4035] px-5 py-4 rounded-xl shadow-sm animate-pulse">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="font-bold text-sm">You have an overdue book! Please return it immediately to avoid penalties.</p>
                </div>
            @endif

            <!-- Available Books Counter -->
            <div class="mb-6 bg-[#F7EDE4] rounded-2xl p-4 shadow-sm border border-[#D5B398]/50 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#E8D2BF] flex items-center justify-center text-[#603B25]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#422719]">Books Available Today</p>
                        <p class="text-xs text-[#805538]">Ready to be borrowed</p>
                    </div>
                </div>
                <div class="text-2xl font-bold text-[#603B25]">{{ $availableBooksCount }}</div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-2 h-8 bg-[#603B25] rounded-full"></div>
                    <div>
                        <h3 class="text-xl font-bold text-[#422719]">Quick Actions</h3>
                        <p class="text-xs text-[#805538] mt-1">Manage your personal library activities easily.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Browse Books -->
                    <a href="{{ route('user.borrow') }}" class="group relative overflow-hidden bg-gradient-to-r from-[#603B25] to-[#805538] hover:from-[#422719] hover:to-[#68432D] text-white rounded-2xl p-5 flex items-center justify-between shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">
                        <div class="absolute -left-5 -bottom-10 w-28 h-28 rounded-full border-[12px] border-white/5"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-[#F7EDE4] text-[#603B25] flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                            <div>
                                <span class="block text-lg font-bold">Browse Books</span>
                                <span class="text-xs text-[#E8D2BF]">Find available books</span>
                            </div>
                        </div>
                    </a>

                    <!-- My Records -->
                    <a href="{{ route('user.records') }}" class="group relative overflow-hidden bg-gradient-to-r from-[#805538] to-[#A97852] hover:from-[#68432D] hover:to-[#805538] text-white rounded-2xl p-5 flex items-center justify-between shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">
                        <div class="absolute -left-5 -bottom-10 w-28 h-28 rounded-full border-[12px] border-white/5"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-[#F7EDE4] text-[#805538] flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <div>
                                <span class="block text-lg font-bold">My Records</span>
                                <span class="text-xs text-[#F0DCCB]">View your borrowing history</span>
                            </div>
                        </div>
                    </a>

                    <!-- Profile Settings -->
                    <a href="{{ route('profile.edit') }}" class="group relative overflow-hidden bg-gradient-to-r from-[#A97852] to-[#C49A78] hover:from-[#805538] hover:to-[#A97852] text-white rounded-2xl p-5 flex items-center justify-between shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300">
                        <div class="absolute -left-5 -bottom-10 w-28 h-28 rounded-full border-[12px] border-white/5"></div>
                        <div class="relative flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-[#F7EDE4] text-[#A97852] flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div>
                                <span class="block text-lg font-bold">My Profile</span>
                                <span class="text-xs text-[#F7EDE4]">Update your account details</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- My Active Borrows -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-2 h-8 bg-[#603B25] rounded-full"></div>
                    <div>
                        <h3 class="text-xl font-bold text-[#422719]">My Active Borrows</h3>
                        <p class="text-xs text-[#805538] mt-1">Books you currently have in your possession.</p>
                    </div>
                </div>

                <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-[#603B25]">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Book Title</th>
                                    <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Date Borrowed</th>
                                    <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Due Date</th>
                                    <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#D5B398]/50">
                                @forelse($activeBorrows as $record)
                                    @php
                                        // 🔥 THIS LINE FIXES THE "N/A" ISSUE
                                        // If due_date is empty in DB, it calculates it from borrowed_at
                                        $dueDate = $record->due_date ?? \Carbon\Carbon::parse($record->borrowed_at)->addDays(7);
                                        $isOverdue = now()->greaterThan($dueDate);
                                    @endphp
                                    <tr class="hover:bg-[#EBD5C1] transition duration-200">
                                        <td class="px-6 py-5">
                                            <span class="font-bold text-[#422719] text-sm">{{ $record->book->title ?? 'Deleted Book' }}</span>
                                        </td>
                                        <td class="px-6 py-5 text-sm font-mono text-[#805538]">
                                            {{ \Carbon\Carbon::parse($record->borrowed_at)->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-5 text-sm font-mono {{ $isOverdue ? 'text-[#8B4035] font-bold' : 'text-[#805538]' }}">
                                            {{ \Carbon\Carbon::parse($dueDate)->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-5">
                                            @if($isOverdue)
                                                <span class="inline-flex items-center gap-2 bg-[#F0DDDA] text-[#8B4035] px-3 py-1.5 rounded-full text-xs font-bold">
                                                    Overdue
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-2 bg-[#E8D2BF] text-[#805538] px-3 py-1.5 rounded-full text-xs font-bold">
                                                    Active
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-[#805538]">
                                            You have no active borrows at the moment.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 mb-2">
                <div class="flex items-center justify-center gap-4">
                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>
                    <p class="text-sm font-medium text-[#805538] text-center">Library Resource Management System</p>
                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>