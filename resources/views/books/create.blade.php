
<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">

        <div class="relative overflow-hidden rounded-2xl shadow-lg
                    bg-gradient-to-r from-[#422719] via-[#70452D] to-[#B98763]
                    px-6 py-7 sm:px-10">

            <div class="absolute -right-10 -top-16 w-56 h-56
                        rounded-full border-[25px] border-white/5"></div>

            <div class="relative z-10">

                <p class="text-xs font-semibold text-[#E8D2BF]
                          uppercase tracking-[0.2em] mb-2">
                    Library Management System
                </p>

                <h2 class="font-bold text-3xl text-[#F7EDE4]">
                    Add New Book
                </h2>

                <p class="text-sm text-[#E8D2BF] mt-2">
                    Add a new book to your library collection.
                </p>

            </div>

        </div>

    </x-slot>


    <!-- Main Content -->
    <div class="min-h-screen bg-[#E8D2BF] py-10">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Form Card -->
            <div class="bg-[#F7EDE4] rounded-2xl shadow-md
                        border border-[#D5B398]/50 overflow-hidden">

                <!-- Form Heading -->
                <div class="bg-[#603B25] px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl
                                    bg-[#E8D2BF] flex items-center
                                    justify-center text-[#603B25]">

                            <svg class="w-6 h-6" fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M12 4v16m8-8H4"/>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-lg font-bold text-[#F7EDE4]">
                                Book Information
                            </h3>

                            <p class="text-sm text-[#E8D2BF]">
                                Enter the details of the new book.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Form Body -->
                <div class="p-6 sm:p-8">

                    <form action="{{ route('books.store') }}"
                          method="POST">

                        @csrf

                        <!-- Book Title -->
                        <div class="mb-6">

                            <label class="block text-sm font-bold
                                          text-[#603B25] mb-2">
                                Book Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Enter book title"
                                class="w-full px-4 py-3
                                       bg-[#E8D2BF] border border-[#D5B398]
                                       rounded-xl text-[#422719]
                                       placeholder-[#A1846C]
                                       focus:ring-2 focus:ring-[#805538]
                                       focus:border-[#805538] transition">

                            @error('title')
                                <span class="text-[#A34336] text-sm mt-2 block">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        <!-- Author -->
                        <div class="mb-6">

                            <label class="block text-sm font-bold
                                          text-[#603B25] mb-2">
                                Author
                            </label>

                            <input
                                type="text"
                                name="author"
                                value="{{ old('author') }}"
                                placeholder="Enter author's name"
                                class="w-full px-4 py-3
                                       bg-[#E8D2BF] border border-[#D5B398]
                                       rounded-xl text-[#422719]
                                       placeholder-[#A1846C]
                                       focus:ring-2 focus:ring-[#805538]
                                       focus:border-[#805538] transition">

                            @error('author')
                                <span class="text-[#A34336] text-sm mt-2 block">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        <!-- ISBN -->
                        <div class="mb-6">

                            <label class="block text-sm font-bold
                                          text-[#603B25] mb-2">
                                ISBN
                            </label>

                            <input
                                type="text"
                                name="isbn"
                                value="{{ old('isbn') }}"
                                placeholder="Enter ISBN number"
                                class="w-full px-4 py-3
                                       bg-[#E8D2BF] border border-[#D5B398]
                                       rounded-xl text-[#422719]
                                       placeholder-[#A1846C]
                                       focus:ring-2 focus:ring-[#805538]
                                       focus:border-[#805538] transition">

                            @error('isbn')
                                <span class="text-[#A34336] text-sm mt-2 block">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        <!-- Category -->
                        <div class="mb-8">

                            <label class="block text-sm font-bold
                                          text-[#603B25] mb-2">
                                Category
                            </label>

                            <select
                                name="category_id"
                                class="w-full px-4 py-3
                                       bg-[#E8D2BF] border border-[#D5B398]
                                       rounded-xl text-[#422719]
                                       focus:ring-2 focus:ring-[#805538]
                                       focus:border-[#805538] transition">

                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('category_id')
                                <span class="text-[#A34336] text-sm mt-2 block">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        <!-- Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row
                                    items-center justify-between gap-4
                                    border-t border-[#D5B398]/50 pt-6">

                            <!-- Cancel -->
                            <a href="{{ route('books.index') }}"
                               class="w-full sm:w-auto text-center
                                      bg-[#E8D2BF] hover:bg-[#D5B398]
                                      text-[#603B25] font-semibold
                                      px-7 py-3 rounded-xl transition">

                                Cancel

                            </a>


                            <!-- Save Book -->
                            <button type="submit"
                                    class="w-full sm:w-auto inline-flex
                                           items-center justify-center gap-2
                                           bg-[#603B25] hover:bg-[#422719]
                                           text-white font-bold
                                           px-8 py-3 rounded-xl
                                           shadow-md transition duration-200
                                           hover:-translate-y-0.5">

                                <svg class="w-5 h-5" fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                                Save Book

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- Footer -->
            <div class="text-center mt-8">

                <p class="text-sm font-medium text-[#805538]">
                    Library Resource Management System
                </p>

            </div>

        </div>

    </div>

</x-app-layout>
