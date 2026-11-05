<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl shadow-lg bg-gradient-to-r from-[#422719] via-[#70452D] to-[#B98763] px-6 py-7 sm:px-10">
            
            <div class="absolute -right-10 -top-16 w-56 h-56 rounded-full border-[25px] border-white/5"></div>

            <div class="relative z-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-5">
                <div>
                    <p class="text-xs font-semibold text-[#E8D2BF] uppercase tracking-[0.2em] mb-2">
                        Library Management System
                    </p>

                    <h2 class="font-bold text-3xl text-[#F7EDE4]">
                        My Borrowing Records
                    </h2>

                    <p class="text-sm text-[#E8D2BF] mt-2">
                        View your personal borrowing history.
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="min-h-screen bg-[#E8D2BF] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Table Container -->
            <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 overflow-hidden">
                
                <div class="px-6 py-5 border-b border-[#D5B398]/50 flex flex-col sm:flex-row justify-between sm:items-center gap-2">
                    <div>
                        <h3 class="text-lg font-bold text-[#422719]">Borrowing History</h3>
                        <p class="text-sm text-[#805538] mt-1">All the books you have borrowed in the past.</p>
                    </div>
                </div>

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
                            @forelse($borrowings as $record)
                                @php
                                    // Calculate Due Date and Overdue status
                                    $dueDate = $record->due_date ?? \Carbon\Carbon::parse($record->borrowed_at)->addDays(7);
                                    $isOverdue = !$record->returned_at && now()->greaterThan($dueDate);
                                @endphp
                            <tr class="hover:bg-[#EBD5C1] transition duration-200">
                                
                                <!-- Book Title -->
                                <td class="px-6 py-5">
                                    <span class="font-bold text-[#422719] text-sm whitespace-nowrap">
                                        {{ $record->book->title ?? 'Deleted Book' }}
                                    </span>
                                </td>

                                <!-- Date Borrowed -->
                                <td class="px-6 py-5 text-sm font-mono text-[#805538]">
                                    {{ \Carbon\Carbon::parse($record->borrowed_at)->format('M d, Y') }}
                                </td>

                                <!-- Due Date -->
                                <td class="px-6 py-5 text-sm font-mono {{ $isOverdue ? 'text-[#8B4035] font-bold' : 'text-[#805538]' }}">
                                    {{ \Carbon\Carbon::parse($dueDate)->format('M d, Y') }}
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-5">
                                    @if($record->returned_at)
                                        <span class="inline-flex items-center gap-2 bg-[#E0E8D9] text-[#45613C] px-3 py-1.5 rounded-full text-xs font-bold">
                                            <span class="w-2 h-2 rounded-full bg-[#668653]"></span>
                                            Returned
                                        </span>
                                    @elseif($isOverdue)
                                        <span class="inline-flex items-center gap-2 bg-[#F0DDDA] text-[#8B4035] px-3 py-1.5 rounded-full text-xs font-bold animate-pulse">
                                            <span class="w-2 h-2 rounded-full bg-[#8B4035]"></span>
                                            Overdue
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-2 bg-[#E8D2BF] text-[#805538] px-3 py-1.5 rounded-full text-xs font-bold">
                                            <span class="w-2 h-2 rounded-full bg-[#A97852]"></span>
                                            Borrowed
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <!-- Empty State -->
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 rounded-full bg-[#E8D2BF] flex items-center justify-center text-[#805538] mb-4">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-[#422719]">No Borrowing Records</h3>
                                        <p class="text-sm text-[#805538] mt-2">You haven't borrowed any books yet.</p>
                                        <a href="{{ route('user.borrow') }}" class="mt-5 bg-[#603B25] hover:bg-[#422719] text-white font-semibold px-5 py-2.5 rounded-xl transition shadow-md">
                                            Browse Books
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Footer -->
            <div class="mt-8 pb-3">
                <div class="flex items-center justify-center gap-4">
                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>
                    <p class="text-sm font-medium text-[#805538] text-center">Library Resource Management System</p>
                    <div class="hidden sm:block flex-1 h-px bg-[#B98763]/50"></div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>