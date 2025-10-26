<x-layouts.app>
    @section('title', 'Os meus andeis')

    <div
        class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 bg-gray-50 border-gray-200 text-gray-900 dark:border-gray-700 dark:text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Flash Messages -->
            @if(session('success'))
                <div
                    class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()"
                            class="text-green-800 dark:text-green-200 hover:text-green-600 dark:hover:text-green-400">
                        <flux:icon.x-mark variant="solid" class="w-4 h-4"/>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div
                    class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()"
                            class="text-red-800 dark:text-red-200 hover:text-red-600 dark:hover:text-red-400">
                        <flux:icon.x-mark variant="solid" class="w-4 h-4"/>
                    </button>
                </div>
            @endif

            @if(session('info'))
                <div
                    class="mb-6 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-200 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <flux:icon.check-circle variant="solid" class="w-5 h-5 mr-2"/>
                        <span>{{ session('info') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()"
                            class="text-blue-800 dark:text-blue-200 hover:text-blue-600 dark:hover:text-blue-400">
                        <flux:icon.x-mark variant="solid" class="w-4 h-4"/>
                    </button>
                </div>
            @endif

            <!-- Breadcrumbs -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Inicio</a>
                    </li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-900 dark:text-white">Os meus andeis</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Andeis</h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Xestiona os teus andeis</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bookshelves as $bookshelf)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $bookshelf->name }}
                                </h3>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                {{ $bookshelf->books->count() }} {{ $bookshelf->books->count() === 1 ? 'libro' : 'libros' }}
                            </p>

                            <!-- Preview -->
                            @if($bookshelf->books->count() > 0)
                                <div class="space-y-2 mb-4">
                                    @foreach($bookshelf->books->take(3) as $book)
                                        <div class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <svg class="w-4 h-4 mr-2 text-amber-500" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="truncate">{{ $book->title }}</span>
                                        </div>
                                    @endforeach
                                    @if($bookshelf->books->count() > 3)
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            e {{ $bookshelf->books->count() - 3 }} máis...
                                        </p>
                                    @endif
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <flux:icon.book-open class="mx-auto h-8 w-8 text-gray-400 dark:text-gray-500"/>
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Andel vacío</p>
                                </div>
                            @endif

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <a href="{{ route('books.index') }}"
                                   class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                    <flux:icon.plus-circle/>
                                    Engadir libros
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
