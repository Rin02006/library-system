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
                        Manage Books
                    </h2>

                    <p class="text-sm text-[#E8D2BF] mt-2">
                        Organize, monitor, and manage your library collection.
                    </p>
                </div>

                <!-- Add Book Button -->
                <a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 bg-[#E8D2BF] hover:bg-[#D5B398] text-[#422719] font-bold py-3 px-5 rounded-xl shadow-md transition duration-300 hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/>
                    </svg>
                    Add New Book
                </a>
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

            <!-- Search and Information -->
            <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 p-5 sm:p-6 mb-7">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-5">
                    <div>
                        <h3 class="text-lg font-bold text-[#422719]">Book Collection</h3>
                        <p class="text-sm text-[#805538] mt-1">Search and find books in your library.</p>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-[#E8D2BF] px-4 py-2 rounded-lg">
                        <svg class="w-5 h-5 text-[#805538]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H12v17H6.5A2.5 2.5 0 014 17.5v-12zM20 5.5A2.5 2.5 0 0017.5 3H12v17h5.5a2.5 2.5 0 002.5-2.5v-12z"/>
                        </svg>
                        <span class="text-sm font-semibold text-[#603B25]">Library Books</span>
                    </div>
                </div>

                <!-- Search and Filter Form -->
                <form method="GET" action="{{ route('books.index') }}" class="flex flex-col sm:flex-row gap-3">
                    
                    <!-- Search Input -->
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-5 h-5 text-[#A97852]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7" stroke-width="2"/>
                                <path stroke-linecap="round" stroke-width="2" d="M16 16l4 4"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search by book title or author..." class="w-full pl-12 pr-4 py-3 bg-[#E8D2BF] border border-[#D5B398] rounded-xl text-[#422719] placeholder-[#A1846C] focus:ring-2 focus:ring-[#805538] focus:border-[#805538] transition">
                    </div>

                    <!-- Category Dropdown -->
                    <select name="category_id" class="w-full sm:w-56 py-3 px-4 bg-[#E8D2BF] border border-[#D5B398] rounded-xl text-[#422719] focus:ring-2 focus:ring-[#805538] focus:border-[#805538] transition">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Search Button -->
                    <button type="submit" class="inline-flex items-center justify-center gap-2 bg-[#603B25] hover:bg-[#422719] text-white font-semibold px-7 py-3 rounded-xl shadow-sm transition duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" stroke-width="2"/>
                            <path stroke-linecap="round" stroke-width="2" d="M16 16l4 4"/>
                        </svg>
                        Filter
                    </button>

                    <!-- Clear Button -->
                    @if($search || $categoryId)
                        <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center bg-[#D5B398] hover:bg-[#C49A78] text-[#422719] font-semibold px-6 py-3 rounded-xl transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <!-- Books Table -->
            <div class="bg-[#F7EDE4] rounded-2xl shadow-md border border-[#D5B398]/50 overflow-hidden">

                <!-- Table Heading -->
                <div class="px-6 py-5 border-b border-[#D5B398]/50 flex flex-col sm:flex-row justify-between sm:items-center gap-2">
                    <div>
                        <h3 class="text-lg font-bold text-[#422719]">All Books</h3>
                        <p class="text-sm text-[#805538] mt-1">Manage your registered library books.</p>
                    </div>
                    <div class="text-sm font-semibold text-[#805538]">
                        {{ $books->total() }} Books Found
                    </div>
                </div>

                <!-- Responsive Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#603B25]">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Title</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Author</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">ISBN</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Category</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-[#F7EDE4] uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#D5B398]/50">
                            @forelse($books as $book)
                                <tr class="hover:bg-[#EBD5C1] transition duration-200">
                                    <!-- Book Title -->
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-[#E8D2BF] flex items-center justify-center text-[#603B25] flex-shrink-0">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5.5A2.5 2.5 0 016.5 3H12v17H6.5A2.5 2.5 0 014 17.5v-12zM20 5.5A2.5 2.5 0 0017.5 3H12v17h5.5a2.5 2.5 0 002.5-2.5v-12z"/>
                                                </svg>
                                            </div>
                                            <span class="font-bold text-[#422719] text-sm whitespace-nowrap">{{ $book->title }}</span>
                                        </div>
                                    </td>

                                    <!-- Author -->
                                    <td class="px-6 py-5 text-sm text-[#805538]">{{ $book->author }}</td>

                                    <!-- ISBN -->
                                    <td class="px-6 py-5 text-sm font-mono text-[#805538]">{{ $book->isbn }}</td>

                                    <!-- Category -->
                                    <td class="px-6 py-5">
                                        <span class="inline-flex items-center bg-[#E8D2BF] text-[#68432D] px-3 py-1 rounded-lg text-xs font-semibold">
                                            {{ $book->category->name ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-5">
                                        @if($book->status == 'Available')
                                            <span class="inline-flex items-center gap-2 bg-[#E0E8D9] text-[#45613C] px-3 py-1.5 rounded-full text-xs font-bold">
                                                <span class="w-2 h-2 rounded-full bg-[#668653]"></span>
                                                Available
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-2 bg-[#EBD5C1] text-[#805538] px-3 py-1.5 rounded-full text-xs font-bold">
                                                <span class="w-2 h-2 rounded-full bg-[#A97852]"></span>
                                                {{ $book->status }}
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-5">
                                        <div class="flex justify-end items-center gap-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center gap-1 bg-[#E8D2BF] hover:bg-[#D5B398] text-[#603B25] font-semibold text-xs px-3 py-2 rounded-lg transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 4.487l1.687-1.687a2 2 0 112.828 2.828l-9.9 9.9a4 4 0 01-1.414.943l-3.01 1.003 1.003-3.01a4 4 0 01.943-1.414l7.863-7.863zM19 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h4"/>
                                                </svg>
                                                Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 bg-[#F0DDDA] hover:bg-[#E4C5BF] text-[#8B4035] font-semibold text-xs px-3 py-2 rounded-lg transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12m-10 0V5a1 1 0 011-1h6a1 1 0 011 1v2m-9 0l1 13h8l1-13M10 11v5m4-5v5"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-20 h-20 rounded-full bg-[#E8D2BF] flex items-center justify-center text-[#805538] mb-4">
                                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 5.5A2.5 2.5 0 016.5 3H12v17H6.5A2.5 2.5 0 014 17.5v-12zM20 5.5A2.5 2.5 0 0017.5 3H12v17h5.5a2.5 2.5 0 002.5-2.5v-12z"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-[#422719]">No Books Found</h3>
                                            <p class="text-sm text-[#805538] mt-2">
                                                @if($search || $categoryId)
                                                    No books match your search or filter.
                                                @else
                                                    Your library collection is currently empty.
                                                @endif
                                            </p>
                                            @if(!$search && !$categoryId)
                                                <a href="{{ route('books.create') }}" class="mt-5 bg-[#603B25] hover:bg-[#422719] text-white font-semibold px-5 py-2.5 rounded-xl transition">
                                                    + Add Your First Book
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($books->hasPages())
                    <div class="px-6 py-5 border-t border-[#D5B398]/50">
                        {{ $books->appends(request()->query())->links() }}
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