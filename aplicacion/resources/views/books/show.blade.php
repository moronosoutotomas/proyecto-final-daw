<x-layouts.app :title="$book->title">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item :href="route('books.index')">Libros</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item>{{ $book->title }}</flux:breadcrumbs.item>
                </flux:breadcrumbs>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">{{ $book->title }}</h1>
                <p class="text-gray-600 dark:text-gray-400">por {{ $book->author }}</p>
            </div>
            <div class="flex space-x-2">
                <flux:button :href="route('books.edit', $book)" variant="outline" icon="pencil">
                    Editar
                </flux:button>
                <flux:button :href="route('books.index')" variant="ghost" icon="arrow-left">
                    Volver
                </flux:button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Book Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Book Cover -->
                <flux:card class="p-6">
                    <div class="flex flex-col sm:flex-row gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-48 h-64 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mx-auto sm:mx-0">
                                <flux:icon.book-open class="h-20 w-20 text-white" />
                            </div>
                        </div>
                        <div class="flex-1 space-y-4">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $book->title }}</h2>
                                <p class="text-lg text-gray-600 dark:text-gray-400">{{ $book->author }}</p>
                            </div>
                            
                            @if($book->avg_rating)
                                <div class="flex items-center space-x-2">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            <flux:icon.star class="h-5 w-5 {{ $i <= $book->avg_rating ? 'text-yellow-400' : 'text-gray-300' }}" />
                                        @endfor
                                    </div>
                                    <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ $book->avg_rating }}/5</span>
                                </div>
                            @endif
                            
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="font-medium text-gray-900 dark:text-white">ISBN-13:</span>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $book->isbn13 ?? 'No disponible' }}</p>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-900 dark:text-white">ISBN-10:</span>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $book->isbn10 ?? 'No disponible' }}</p>
                                </div>
                                @if($book->publication_date)
                                    <div>
                                        <span class="font-medium text-gray-900 dark:text-white">Fecha de publicación:</span>
                                        <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($book->publication_date)->format('d/m/Y') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </flux:card>

                <!-- Reviews Section -->
                <flux:card class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reseñas</h3>
                        <flux:button variant="outline" size="sm" icon="plus">
                            Escribir Reseña
                        </flux:button>
                    </div>
                    
                    @if($book->reviews && $book->reviews->count() > 0)
                        <div class="space-y-4">
                            @foreach($book->reviews->take(3) as $review)
                                <div class="border-l-4 border-blue-500 pl-4 py-2">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center space-x-2">
                                            <span class="font-medium text-gray-900 dark:text-white">{{ $review->user->name }}</span>
                                            <div class="flex text-yellow-400">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <flux:icon.star class="h-4 w-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" />
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if($review->content)
                                        <p class="text-gray-700 dark:text-gray-300">{{ $review->content }}</p>
                                    @endif
                                </div>
                            @endforeach
                            
                            @if($book->reviews->count() > 3)
                                <flux:button variant="ghost" size="sm" class="w-full">
                                    Ver todas las reseñas ({{ $book->reviews->count() }})
                                </flux:button>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-8">
                            <flux:icon.star class="h-12 w-12 text-gray-400 mx-auto mb-4" />
                            <p class="text-gray-500 dark:text-gray-400">No hay reseñas para este libro</p>
                            <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">Sé el primero en escribir una reseña</p>
                        </div>
                    @endif
                </flux:card>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <flux:card class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Acciones</h3>
                    <div class="space-y-3">
                        <flux:button variant="outline" class="w-full justify-start" icon="heart">
                            Agregar a Favoritos
                        </flux:button>
                        <flux:button variant="outline" class="w-full justify-start" icon="archive-box">
                            Agregar a Estantería
                        </flux:button>
                        <flux:button variant="outline" class="w-full justify-start" icon="share">
                            Compartir
                        </flux:button>
                    </div>
                </flux:card>

                <!-- Book Stats -->
                <flux:card class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estadísticas</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Reseñas:</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $book->reviews ? $book->reviews->count() : 0 }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Valoración promedio:</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $book->avg_rating ?? 'N/A' }}/5</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Agregado:</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $book->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </flux:card>

                <!-- Related Books -->
                <flux:card class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Libros Relacionados</h3>
                    <div class="space-y-3">
                        @php
                            $relatedBooks = \App\Models\Book::where('author', $book->author)
                                ->where('id', '!=', $book->id)
                                ->take(3)
                                ->get();
                        @endphp
                        
                        @forelse($relatedBooks as $relatedBook)
                            <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                <div class="w-8 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded flex items-center justify-center">
                                    <flux:icon.book-open class="h-4 w-4 text-white" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $relatedBook->title }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $relatedBook->author }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 dark:text-gray-400">No hay libros relacionados</p>
                        @endforelse
                    </div>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
