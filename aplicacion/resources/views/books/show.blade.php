@php
	use Carbon\Carbon;
 	use Illuminate\Support\Facades\Http;

	// chapucilla para probar el wrap de guzzle que usa laravel,
	// si no hay foto devuelve 404 y si devuelve 404 usa otra por olid en lugar de isbn13
	// base url: https://covers.openlibrary.org/b/$key/$value-$size.jpg

	//$url = "https://covers.openlibrary.org/b/isbn/$book->isbn13-L.jpg";
	//$response = Http::get($url);

@endphp
<x-layouts.app>
	@section('title', $book->title)

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900">
		<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- TODO: limpiar boilerplate flash messages -->
			@if(session('success'))
				<div
					class="mb-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg flex items-center justify-between">
					<div class="flex items-center">
						<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd"
										d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
										clip-rule="evenodd"/>
						</svg>
						<span>{{ session('success') }}</span>
					</div>
					<button onclick="this.parentElement.remove()"
									class="text-green-800 dark:text-green-200 hover:text-green-600 dark:hover:text-green-400">
						<flux:icon.x-mark class="w-4 h-4"/>
					</button>
				</div>
			@endif

			<!-- breadcrumb -->
			<nav class="mb-8">
				<ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
					<li>
						<a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">
							Inicio
						</a>
					</li>
					<li>
						<span class="mx-2">
							/
						</span>
					</li>
					<li>
						<a href="{{ route('books.index') }}"
							 class="hover:text-gray-700 dark:hover:text-gray-300">
							Libros
						</a>
					</li>
					<li>
						<span class="mx-2">
							/
						</span>
					</li>
					<li class="text-gray-900 dark:text-white">
						{{ Str::limit($book->title, 30) }}
					</li>
				</ol>
			</nav>

			<!-- title libro -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="px-6 py-8">
					<div class="flex justify-between items-start mb-6">
						<div class="flex-1 ">
							<div>
								<h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
									{{ $book->title }}
								</h1>
								<p class="text-xl text-gray-600 dark:text-gray-400 mb-4">
									por {{ $book->author }}
								</p>
							</div>

							<!-- valoracion -->
							@if($book->avg_rating)
								<div class="flex items-center mb-4">
									<div class="flex text-amber-400">
										@for($i = 1; $i <= 5; $i++)
											<svg
												class="w-5 h-5 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"
												viewBox="0 0 20 20">
												<path
													d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
											</svg>
										@endfor
									</div>
								</div>
							@endif
						</div>

						<!-- cover -->
						<div class="flex flex-col space-y-4">
							<img src="https://covers.openlibrary.org/b/isbn/{{ $book->isbn13 }}-M.jpg" alt="portada de {{ $book->title }}">
							@can('books.edit')
								<a href="{{ route('books.edit', $book) }}"
									 class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
									<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
									</svg>
									Editar
								</a>
							@endcan
						</div>
					</div>

					<!-- info grid -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
						<div>
							<h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
								Información del libro
							</h3>
							<dl class="space-y-3">
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										ISBN-10
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white font-mono">
										{{ $book->isbn10 ?: 'Non disponible' }}
									</dd>
								</div>
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										ISBN-13
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white font-mono">
										{{ $book->isbn13 ?: 'Non disponible' }}
									</dd>
								</div>
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										Data de publicación
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white">
										{{ $book->publication_date ? Carbon::parse($book->publication_date)->format('d/m/Y') : 'No disponible' }}
									</dd>
								</div>
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										Número de reseñas
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white">
										0
									</dd>
								</div>
							</dl>
						</div>

						<div>
							<h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estadísticas</h3>
							<dl class="space-y-3">
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										Edicións dispoñibles
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white">
										0
									</dd>
								</div>
								<div>
									<dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
										En estanterías
									</dt>
									<dd class="mt-1 text-sm text-gray-900 dark:text-white">
										0
									</dd>
								</div>
							</dl>
						</div>
					</div>

					<!-- reseñas en modal (pa cuando me aburra mucho) -->
					@auth
						<div class="border-t border-gray-200 dark:border-gray-700 pt-8">
							<div class="flex justify-between items-center mb-6">
								<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Reseñas</h3>
								@can('reviews.create')
									<button onclick="toggleReviewForm()"
													class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
										<flux:icon.plus class="w-4 h-4 mr-2"/>
										Escribir reseña
									</button>
								@endcan
							</div>
							<div
								class="text-gray-900 dark:text-white px-4 py-4 border-b border-gray-200 dark:border-gray-700 overflow-hidden">
								<h3 class="text-lg font-semibold text-gray-900 dark:text-white">
									Encantoume
								</h3>
								<div class="flex items-center">
									<div class="flex text-amber-400">
										@for($i = 1; $i <= 5; $i++)
											<flux:icon.star
												class="w-4 h-4 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"/>
										@endfor
									</div>
								</div>

								<p class="mt-2">Quedei totalmente pasmado as 320 e pico páxinas, recomendadísimo!</p>

							</div>
						</div>
					@endauth

					<!-- TODO: listar reseñas -->
				</div>
			</div>
		</div>
	</div>

</x-layouts.app>
