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
                        Borrow a Book
                    </h2>

                    <p class="text-sm text-[#E8D2BF] mt-2">
                        Browse and borrow from our available collection.
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

            <!-- Error Message -->
            @if($errors->has('error'))
                <div class="mb-6 flex items-center gap-3 bg-[#F0DDDA] border border-[#E4C5BF] text-[#8B4035] px-5 py-4 rounded-xl shadow-sm">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="font-semibold text-sm">{{ $errors->first('error') }}</p>
                </div>
            @endif

            <!-- Book Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($books as $book)
                <div class="group relative overflow-hidden bg-[#F7EDE4] rounded-2xl shadow-md hover:shadow-xl border border-[#D5B398]/50 transition duration-300 flex flex-col justify-between">
                    
                    <!-- Decorative background circle -->
                    <div class="absolute -right-5 -bottom-10 w-36 h-36 rounded-full bg-[#C49A78]/10"></div>

                    <div class="p-6 relative z-10">
                        <!-- Book Icon -->
                        <div class="w-14 h-14 rounded-xl bg-[#E8D2BF] text-[#603B25] flex items-center justify-center mb-4 shadow-sm group-hover:scale-105 transition">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H12v17H6.5A2.5 2.5 0 014 17.5v-12zM20 5.5A2.5 2.5 0 0017.5 3H12v17h5.5a2.5 2.5 0 002.5-2.5v-12z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-[#422719] mb-1">{{ $book->title }}</h3>
                        <p class="text-sm text-[#805538] mb-4">By {{ $book->author }}</p>
                        
                        <span class="inline-flex items-center gap-2 bg-[#E0E8D9] text-[#45613C] px-3 py-1.5 rounded-full text-xs font-bold">
                            <span class="w-2 h-2 rounded-full bg-[#668653]"></span>
                            Available
                        </span>
                    </div>

                    <div class="p-6 pt-0 relative z-10">
                        <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-[#603B25] hover:bg-[#422719] text-white font-bold py-3 px-4 rounded-xl shadow-md transition duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16V4m0 0L7 9m5-5l5 5M5 20h14"/>
                                </svg>
                                Borrow This Book
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16 bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50">
                    <div class="w-20 h-20 rounded-full bg-[#E8D2BF] flex items-center justify-center text-[#805538] mx-auto mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#422719]">No Books Available</h3>
                    <p class="text-sm text-[#805538] mt-1">All books are currently borrowed. Please check back later.</p>
                </div>
                @endforelse
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