<x-layouts.app :title="__('Libros')">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item>Libros</flux:breadcrumbs.item>
                </flux:breadcrumbs>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">Catálogo de Libros</h1>
                <p class="text-gray-600 dark:text-gray-400">Gestiona tu colección de libros</p>
            </div>
            <flux:button :href="route('books.create')" variant="primary" icon="plus">
                Nuevo Libro
            </flux:button>
        </div>

        <!-- Search and Filters -->
        <flux:card class="p-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <flux:input placeholder="Buscar libros por título, autor o ISBN..." />
                </div>
                <div class="flex gap-2">
                    <flux:button variant="outline" icon="funnel">
                        Filtros
                    </flux:button>
                    <flux:button variant="outline" icon="arrow-path">
                        Ordenar
                    </flux:button>
                </div>
            </div>
        </flux:card>

        <!-- Books Grid -->
        @if($books->count() > 0)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($books as $book)
                    <flux:card class="group hover:shadow-lg transition-shadow duration-200">
                        <div class="p-6">
                            <!-- Book Cover Placeholder -->
                            <div class="aspect-[3/4] mb-4 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-200">
                                <flux:icon.book-open class="h-16 w-16 text-white" />
                            </div>
                            
                            <!-- Book Info -->
                            <div class="space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ $book->title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $book->author }}</p>
                                
                                @if($book->publication_date)
                                    <p class="text-xs text-gray-500 dark:text-gray-500">
                                        {{ \Carbon\Carbon::parse($book->publication_date)->format('Y') }}
                                    </p>
                                @endif
                                
                                @if($book->avg_rating)
                                    <div class="flex items-center space-x-1">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                <flux:icon.star class="h-4 w-4 {{ $i <= $book->avg_rating ? 'text-yellow-400' : 'text-gray-300' }}" />
                                            @endfor
                                        </div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $book->avg_rating }}/5</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Actions -->
                            <div class="mt-4 flex space-x-2">
                                <flux:button :href="route('books.show', $book)" variant="primary" size="sm" class="flex-1">
                                    Ver
                                </flux:button>
                                <flux:button :href="route('books.edit', $book)" variant="outline" size="sm" icon="pencil">
                                </flux:button>
                                <flux:button 
                                    variant="outline" 
                                    size="sm" 
                                    icon="trash" 
                                    class="text-red-600 hover:text-red-700 hover:bg-red-50 dark:hover:bg-red-900/20"
                                    onclick="deleteBook({{ $book->id }})"
                                >
                                </flux:button>
                            </div>
                        </div>
                    </flux:card>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        @else
            <!-- Empty State -->
            <flux:card class="p-12 text-center">
                <flux:icon.book-open class="h-16 w-16 text-gray-400 mx-auto mb-4" />
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No hay libros registrados</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Comienza agregando tu primer libro a la colección</p>
                <flux:button :href="route('books.create')" variant="primary" icon="plus">
                    Agregar Primer Libro
                </flux:button>
            </flux:card>
        @endif
    </div>

    <!-- Delete Form (Hidden) -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteBook(bookId) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir esta acción. El libro será eliminado permanentemente.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#ef4444",
                    cancelButtonColor: "#6b7280",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('delete-form');
                        form.action = `/books/${bookId}`;
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</x-layouts.app>
