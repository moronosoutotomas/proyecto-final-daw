<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-amber-400 to-orange-400 px-6 py-4">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-white flex items-center">
                <flux:icon.book-open class="h-6 w-6 mr-2" />
                Libros Recientes
            </h3>
            <flux:button :href="route('books.index')" variant="ghost" size="sm" class="text-white hover:bg-white/20">
                Ver todos
            </flux:button>
        </div>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            @forelse($books as $book)
                <div class="flex items-center space-x-4 p-4 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 dark:from-slate-700 dark:to-slate-600 hover:shadow-md transition-all duration-200">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-20 bg-gradient-to-br from-amber-300 to-orange-400 rounded-lg flex items-center justify-center shadow-md">
                            <flux:icon.book-open class="h-8 w-8 text-white" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white truncate">{{ $book->title }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $book->author }}</p>
                        @if($book->publication_date)
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($book->publication_date)->format('Y') }}
                            </p>
                        @endif
                    </div>
                    <div class="flex-shrink-0">
                        <flux:button :href="route('books.show', $book)" variant="outline" size="sm" class="border-amber-200 text-amber-600 hover:bg-amber-50">
                            Ver
                        </flux:button>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gradient-to-br from-amber-100 to-orange-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <flux:icon.book-open class="h-10 w-10 text-amber-500" />
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No hay libros registrados</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Comienza agregando tu primer libro a la colección</p>
                    <flux:button :href="route('books.create')" variant="primary" class="bg-gradient-to-r from-amber-400 to-orange-400 hover:from-amber-500 hover:to-orange-500">
                        Agregar Primer Libro
                    </flux:button>
                </div>
            @endforelse
        </div>
    </div>
</div>
