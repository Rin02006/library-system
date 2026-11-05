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
                        Borrow Records
                    </h2>

                    <p class="text-sm text-[#E8D2BF] mt-2">
                        Track book transactions, returns, and overdue records.
                    </p>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="min-h-screen bg-[#E8D2BF] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 bg-[#E0E8D9] border border-[#A5B797] text-[#45613C] px-5 py-4 rounded-xl shadow-sm">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="font-semibold text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Table Container -->
            <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 overflow-hidden">
                
                <div class="px-6 py-5 border-b border-[#D5B398]/50 flex flex-col sm:flex-row justify-between sm:items-center gap-2">
                    <div>
                        <h3 class="text-lg font-bold text-[#422719]">All Transactions</h3>
                        <p class="text-sm text-[#805538] mt-1">View the borrowing history of your library.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#603B25]">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Book Title</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Borrowed By</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Date Borrowed</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Due Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#D5B398]/50">
                            @forelse($borrowings as $record)
                            
                            @php
                                // 🔥 THIS FIXES THE N/A ISSUE
                                // If due_date is missing in the DB, it calculates 7 days from borrowed_at
                                $calculatedDueDate = $record->due_date ?? \Carbon\Carbon::parse($record->borrowed_at)->addDays(7);
                                $isOverdue = !$record->returned_at && now()->greaterThan($calculatedDueDate);
                            @endphp

                            <tr class="hover:bg-[#EBD5C1] transition duration-200">
                                
                                <!-- Book Title -->
                                <td class="px-6 py-5">
                                    <span class="font-bold text-[#422719] text-sm whitespace-nowrap">
                                        {{ $record->book->title ?? 'Deleted Book' }}
                                    </span>
                                </td>

                                <!-- Borrowed By -->
                                <td class="px-6 py-5 text-sm text-[#805538]">
                                    {{ $record->user->name ?? 'Deleted User' }}
                                </td>

                                <!-- Date Borrowed -->
                                <td class="px-6 py-5 text-sm font-mono text-[#805538]">
                                    {{ \Carbon\Carbon::parse($record->borrowed_at)->format('M d, Y') }}
                                </td>

                                <!-- Due Date -->
                                <td class="px-6 py-5 text-sm font-mono {{ $isOverdue ? 'text-[#8B4035] font-bold' : 'text-[#805538]' }}">
                                    {{ \Carbon\Carbon::parse($calculatedDueDate)->format('M d, Y') }}
                                </td>
                                
                                <!-- Status Logic -->
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

                                <!-- Action -->
                                <td class="px-6 py-5 text-right">
                                    @if(!$record->returned_at)
                                        <form action="{{ route('borrowings.return', $record->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-1 bg-[#E8D2BF] hover:bg-[#D5B398] text-[#603B25] font-semibold text-xs px-4 py-2 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l-4-4 4-4m-4 4h10a5 5 0 010 10h-2"/>
                                                </svg>
                                                Return
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[#A97852] text-xs font-semibold">No Action Needed</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <!-- Empty State -->
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 rounded-full bg-[#E8D2BF] flex items-center justify-center text-[#805538] mb-4">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-[#422719]">No Transactions Found</h3>
                                        <p class="text-sm text-[#805538] mt-2">No borrowing transactions have been recorded yet.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                @if($borrowings->hasPages())
                    <div class="px-6 py-4 border-t border-[#D5B398]/50 bg-[#F7EDE4]">
                        {{ $borrowings->links() }}
                    </div>
                @endif

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