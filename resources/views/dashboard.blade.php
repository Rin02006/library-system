<x-app-layout>

    <!-- Welcome Banner -->
    <x-slot name="header">
        <div class="relative overflow-hidden rounded-2xl shadow-lg bg-gradient-to-r from-[#422719] via-[#70452D] to-[#B98763] px-6 py-8 sm:px-10 sm:py-9">
            <div class="absolute -right-10 -top-16 w-64 h-64 rounded-full border-[25px] border-white/5"></div>
            <div class="absolute right-20 -bottom-24 w-48 h-48 rounded-full bg-[#E8D2BF]/10"></div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <p class="text-[#E8D2BF] text-sm font-semibold uppercase tracking-[0.2em] mb-2">Library Management System</p>
                    <h1 class="text-3xl sm:text-4xl font-bold text-[#F7EDE4]">Welcome back, {{ Auth::user()->name }}!</h1>
                    <p class="text-[#F0DCCB] mt-3 text-sm sm:text-base">Here is the summary of your library's status today.</p>
                    <div class="w-20 h-1 bg-[#D5B398] rounded-full mt-5"></div>
                </div>

                <!-- Quick Link Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <a href="{{ route('books.index') }}" class="inline-flex justify-center items-center gap-2 bg-[#E8D2BF] hover:bg-[#D5B398] text-[#422719] font-bold py-3 px-5 rounded-xl shadow-md transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Manage Inventory
                    </a>
                    <a href="{{ route('borrowings.index') }}" class="inline-flex justify-center items-center gap-2 bg-transparent border-2 border-[#E8D2BF] hover:bg-[#E8D2BF] text-[#E8D2BF] hover:text-[#422719] font-bold py-3 px-5 rounded-xl shadow-md transition duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        View All Records
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#E8D2BF] py-7">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Library Statistics -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-2 h-8 bg-[#603B25] rounded-full"></div>
                    <div>
                        <h3 class="text-xl font-bold text-[#422719]">Library Statistics</h3>
                        <p class="text-xs text-[#805538] mt-1">Overview of your library collection.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Total Books -->
                    <div class="group relative overflow-hidden bg-gradient-to-r from-[#F7EDE4] to-[#EBD5C1] p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <div class="absolute -right-5 -bottom-10 w-36 h-36 rounded-full bg-[#C49A78]/20"></div>
                        <div class="relative flex items-center gap-6">
                            <div class="w-20 h-20 rounded-full bg-[#E8D2BF] text-[#603B25] flex items-center justify-center group-hover:scale-105 transition">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H12v17H6.5A2.5 2.5 0 014 17.5v-12zM20 5.5A2.5 2.5 0 0017.5 3H12v17h5.5a2.5 2.5 0 002.5-2.5v-12z"/></svg>
                            </div>
                            <div>
                                <p class="text-4xl font-bold text-[#422719]">{{ $totalBooks }}</p>
                                <p class="text-base font-medium text-[#805538]">Total Books</p>
                                <p class="text-xs text-[#A97852] mt-1">Books in the library</p>
                            </div>
                        </div>
                    </div>

                    <!-- Available Books -->
                    <div class="group relative overflow-hidden bg-gradient-to-r from-[#F7EDE4] to-[#EBD5C1] p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <div class="absolute -right-5 -bottom-10 w-36 h-36 rounded-full bg-[#A97852]/15"></div>
                        <div class="relative flex items-center gap-6">
                            <div class="w-20 h-20 rounded-full bg-[#E8D2BF] text-[#805538] flex items-center justify-center group-hover:scale-105 transition">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12l4 4L19 6"/><circle cx="12" cy="12" r="10" stroke-width="1.8"/></svg>
                            </div>
                            <div>
                                <p class="text-4xl font-bold text-[#422719]">{{ $available }}</p>
                                <p class="text-base font-medium text-[#805538]">Available</p>
                                <p class="text-xs text-[#A97852] mt-1">Ready for borrowing</p>
                            </div>
                        </div>
                    </div>

                    <!-- Borrowed Books -->
                    <div class="group relative overflow-hidden bg-gradient-to-r from-[#F7EDE4] to-[#EBD5C1] p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <div class="absolute -right-5 -bottom-10 w-36 h-36 rounded-full bg-[#B98763]/20"></div>
                        <div class="relative flex items-center gap-6">
                            <div class="w-20 h-20 rounded-full bg-[#E8D2BF] text-[#A97852] flex items-center justify-center group-hover:scale-105 transition">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-2M10 2h8a2 2 0 012 2v12a2 2 0 01-2 2h-8a2 2 0 01-2-2V4a2 2 0 012-2z"/></svg>
                            </div>
                            <div>
                                <p class="text-4xl font-bold text-[#422719]">{{ $borrowed }}</p>
                                <p class="text-base font-medium text-[#805538]">Borrowed</p>
                                <p class="text-xs text-[#A97852] mt-1">Currently borrowed</p>
                            </div>
                        </div>
                    </div>

                    <!-- Overdue Books -->
                    @isset($overdue)
                    <div class="group relative overflow-hidden bg-gradient-to-r from-[#F7EDE4] to-[#EBD5C1] p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <div class="absolute -right-5 -bottom-10 w-36 h-36 rounded-full bg-[#805538]/15"></div>
                        <div class="relative flex items-center gap-6">
                            <div class="w-20 h-20 rounded-full bg-[#E8D2BF] text-[#805538] flex items-center justify-center group-hover:scale-105 transition">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="2" d="M12 7v5m0 4h.01"/></svg>
                            </div>
                            <div>
                                <p class="text-4xl font-bold text-[#422719]">{{ $overdue }}</p>
                                <p class="text-base font-medium text-[#805538]">Overdue</p>
                                <p class="text-xs text-[#A97852] mt-1">Books past their due date</p>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>

            <!-- Book Status Overview -->
            <div class="relative overflow-hidden bg-gradient-to-r from-[#F7EDE4] to-[#EBD5C1] rounded-2xl shadow-md p-6 sm:p-8 mb-8">
                <div class="absolute -right-20 -bottom-32 w-96 h-96 rounded-full border-[35px] border-[#C49A78]/15"></div>
                <div class="relative z-10">
                    <div class="mb-7">
                        <h3 class="text-xl font-bold text-[#422719]">Book Status Overview</h3>
                        <p class="text-sm text-[#805538] mt-1">View the current availability of library books.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div class="relative w-full h-64">
                            <canvas id="libraryChart"></canvas>
                        </div>
                        <div class="space-y-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-4 h-4 rounded-full bg-[#603B25]"></div>
                                    <span class="font-semibold text-[#603B25]">Available</span>
                                </div>
                                <span class="text-xl font-bold text-[#422719]">{{ $available }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-4 h-4 rounded-full bg-[#B98763]"></div>
                                    <span class="font-semibold text-[#805538]">Borrowed</span>
                                </div>
                                <span class="text-xl font-bold text-[#422719]">{{ $borrowed }}</span>
                            </div>
                            <div class="border-t border-[#C49A78]/40 pt-5">
                                <p class="text-sm text-[#805538]">Total Library Collection</p>
                                <p class="text-3xl font-bold text-[#422719] mt-1">{{ $totalBooks }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-2 h-8 bg-[#603B25] rounded-full"></div>
                    <div>
                        <h3 class="text-xl font-bold text-[#422719]">Recent Activity</h3>
                        <p class="text-xs text-[#805538] mt-1">The 5 most recent borrowing transactions.</p>
                    </div>
                </div>

                <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#603B25]">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">User</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Book</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#D5B398]/50">
                            @forelse($recentActivity as $activity)
                                <tr class="hover:bg-[#EBD5C1] transition duration-200">
                                    <td class="px-6 py-4 font-bold text-[#422719] text-sm">{{ $activity->user->name ?? 'Unknown' }}</td>
                                    <td class="px-6 py-4 text-[#805538] text-sm">{{ $activity->book->title ?? 'Deleted Book' }}</td>
                                    <td class="px-6 py-4 text-[#805538] text-sm">{{ \Carbon\Carbon::parse($activity->borrowed_at)->format('M d, Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if($activity->returned_at)
                                            <span class="inline-flex bg-[#E0E8D9] text-[#45613C] px-3 py-1 rounded-full text-xs font-bold">Returned</span>
                                        @else
                                            <span class="inline-flex bg-[#E8D2BF] text-[#805538] px-3 py-1 rounded-full text-xs font-bold">Borrowed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-[#805538]">No recent activity.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('libraryChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Available', 'Borrowed'],
                datasets: [{
                    data: [{{ $available }}, {{ $borrowed }}],
                    backgroundColor: ['#603B25', '#B98763'],
                    borderWidth: 4,
                    borderColor: '#F7EDE4',
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#422719',
                        titleColor: '#F7EDE4',
                        bodyColor: '#F7EDE4',
                        padding: 12,
                        cornerRadius: 8
                    }
                }
            }
        });
    </script>

</x-app-layout>