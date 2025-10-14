<x-layouts.app>
    @section('title', $book->title)

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-800 dark:text-green-200 hover:text-green-600 dark:hover:text-green-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Breadcrumbs -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Inicio</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('books.index') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Libros</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-900 dark:text-white">{{ Str::limit($book->title, 30) }}</li>
                </ol>
            </nav>

            <!-- Book Details -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-8">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $book->title }}</h1>
                            <p class="text-xl text-gray-600 dark:text-gray-400 mb-4">por {{ $book->author }}</p>
                            
                            <!-- Rating -->
                            @if($book->avg_rating)
                                <div class="flex items-center mb-4">
                                    <div class="flex text-amber-400">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">{{ $book->avg_rating }}/5</span>
                                </div>
                            @endif
                        </div>
                        
                        @can('books.edit')
                        <div class="flex space-x-2">
                            <a href="{{ route('books.edit', $book) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Editar
                            </a>
                        </div>
                        @endcan
                    </div>

                    <!-- Book Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del libro</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ISBN-10</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white font-mono">{{ $book->isbn10 ?: 'No disponible' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ISBN-13</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white font-mono">{{ $book->isbn13 ?: 'No disponible' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Data de publicación</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                        {{ $book->publication_date ? \Carbon\Carbon::parse($book->publication_date)->format('d/m/Y') : 'No disponible' }}
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Número de reseñas</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book->reviews_count ?? 0 }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estadísticas</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Edicións dispoñibles</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book->editions_count ?? 0 }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">En estanterías</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book->bookshelves_count ?? 0 }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    @auth
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-8">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reseñas</h3>
                            @can('reviews.create')
                            <button onclick="toggleReviewForm()" 
                                    class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Escribir reseña
                            </button>
                            @endcan
                        </div>

                        <!-- Review Form (Hidden by default) -->
                        @can('reviews.create')
                        <div id="reviewForm" class="hidden mb-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">Tu reseña</h4>
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                
                                <div class="mb-4">
                                    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Valoración</label>
                                    <select name="rating" id="rating" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-800 dark:text-white">
                                        <option value="">Selecciona una valoración</option>
                                        <option value="1">1 - Pésimo</option>
                                        <option value="2">2 - Malo</option>
                                        <option value="3">3 - Regular</option>
                                        <option value="4">4 - Bueno</option>
                                        <option value="5">5 - Excelente</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Comentario</label>
                                    <textarea name="content" id="content" rows="4" required 
                                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-800 dark:text-white"
                                              placeholder="Comparte tu opinión sobre este libro..."></textarea>
                                </div>
                                
                                <div class="flex space-x-3">
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                        Publicar reseña
                                    </button>
                                    <button type="button" onclick="toggleReviewForm()" 
                                            class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endcan

                        <!-- Reviews List -->
                        <div class="space-y-4">
                            @forelse($book->reviews as $review)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-amber-600 rounded-full flex items-center justify-center text-white text-sm font-medium">
                                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $review->user->name }}</p>
                                                <div class="flex text-amber-400">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        @if(auth()->id() === $review->user_id)
                                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="delete-review-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 text-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $review->content }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                        {{ $review->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No hay reseñas</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Sé el primero en escribir una reseña.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function toggleReviewForm() {
                const form = document.getElementById('reviewForm');
                form.classList.toggle('hidden');
            }

            document.addEventListener('DOMContentLoaded', function() {
                const forms = document.querySelectorAll('.delete-review-form');
                
                forms.forEach(form => {
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        
                        Swal.fire({
                            title: "¿Estás seguro?",
                            text: "No podrás revertir esta acción",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Sí, eliminar",
                            cancelButtonText: "Cancelar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
</x-layouts.app>
