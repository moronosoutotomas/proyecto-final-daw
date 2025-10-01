<x-layouts.app :title="__('Nuevo Libro')">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item :href="route('books.index')">Libros</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item>Nuevo Libro</flux:breadcrumbs.item>
                </flux:breadcrumbs>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">Agregar Nuevo Libro</h1>
                <p class="text-gray-600 dark:text-gray-400">Completa la información del libro</p>
            </div>
            <flux:button :href="route('books.index')" variant="ghost" icon="arrow-left">
                Volver
            </flux:button>
        </div>

        <!-- Form -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <flux:card class="p-6">
                    <form action="{{ route('books.store') }}" method="post" class="space-y-6">
                        @csrf
                        
                        <!-- Basic Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información Básica</h3>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <flux:field>
                                        <flux:label>Título del Libro</flux:label>
                                        <flux:input name="title" placeholder="Ingresa el título del libro" required />
                                        @error('title')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                                
                                <div>
                                    <flux:field>
                                        <flux:label>Autor</flux:label>
                                        <flux:input name="author" placeholder="Nombre del autor" required />
                                        @error('author')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                            </div>
                        </div>

                        <!-- ISBN Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Identificación</h3>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <flux:field>
                                        <flux:label>ISBN-10</flux:label>
                                        <flux:input name="isbn10" placeholder="978-0-123456-78-9" />
                                        @error('isbn10')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                                
                                <div>
                                    <flux:field>
                                        <flux:label>ISBN-13</flux:label>
                                        <flux:input name="isbn13" placeholder="978-0-123456-78-9" />
                                        @error('isbn13')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información Adicional</h3>
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <flux:field>
                                        <flux:label>Fecha de Publicación</flux:label>
                                        <flux:input name="publication_date" type="date" />
                                        @error('publication_date')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                                
                                <div>
                                    <flux:field>
                                        <flux:label>Valoración Promedio</flux:label>
                                        <flux:input name="avg_rating" type="number" min="1" max="5" step="0.1" placeholder="4.5" />
                                        @error('avg_rating')
                                            <flux:error>{{ $message }}</flux:error>
                                        @enderror
                                    </flux:field>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <flux:button :href="route('books.index')" variant="ghost">
                                Cancelar
                            </flux:button>
                            <flux:button type="submit" variant="primary" icon="check">
                                Crear Libro
                            </flux:button>
                        </div>
                    </form>
                </flux:card>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Tips -->
                <flux:card class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Consejos</h3>
                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-start space-x-2">
                            <flux:icon.light-bulb class="h-5 w-5 text-yellow-500 mt-0.5 flex-shrink-0" />
                            <p>El ISBN es único para cada libro y ayuda a identificarlo</p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <flux:icon.light-bulb class="h-5 w-5 text-yellow-500 mt-0.5 flex-shrink-0" />
                            <p>Puedes agregar la valoración promedio si ya conoces el libro</p>
                        </div>
                        <div class="flex items-start space-x-2">
                            <flux:icon.light-bulb class="h-5 w-5 text-yellow-500 mt-0.5 flex-shrink-0" />
                            <p>La fecha de publicación es opcional pero recomendada</p>
                        </div>
                    </div>
                </flux:card>

                <!-- Recent Books -->
                <flux:card class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Libros Recientes</h3>
                    <div class="space-y-3">
                        @forelse(\App\Models\Book::latest()->take(3)->get() as $recentBook)
                            <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                <div class="w-8 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded flex items-center justify-center">
                                    <flux:icon.book-open class="h-4 w-4 text-white" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $recentBook->title }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recentBook->author }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 dark:text-gray-400">No hay libros registrados</p>
                        @endforelse
                    </div>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
