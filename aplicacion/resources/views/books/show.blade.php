@php
	use Carbon\Carbon;
@endphp
<x-layouts.app>
	@section('title', $book->title)

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900">
		<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- flash messages -->
			<x-flash-message />

			<!-- breadcrumb -->
			<nav class="mb-8 overflow-x-auto">
				<ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400 min-w-max">
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

			<!-- datos libro -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="px-6 py-8">
					<div class="sm:flex justify-between items-start mb-6">
						<div class="flex-1 ">
							<!-- title libro -->
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
											<flux:icon.star
												class="w-4 h-4 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"/>
										@endfor
									</div>
								</div>
							@endif

							<!-- info grid -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
								<div>
									<h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
										Información do libro
									</h3>
									<div class="space-y-3">
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												ISBN-10
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white font-mono">
												{{ $book->isbn10 ?: 'Non disponible' }}
											</div>
										</div>
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												ISBN-13
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white font-mono">
												{{ $book->isbn13 ?: 'Non disponible' }}
											</div>
										</div>
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												Data de publicación
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white">
												{{ $book->publication_date ? Carbon::parse($book->publication_date)->format('d/m/Y') : 'Non dispoñible' }}
											</div>
										</div>
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												Número de reseñas
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white">
												0
											</div>
										</div>
									</div>
								</div>

								<div>
									<h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estatísticas</h3>
									<div class="space-y-3">
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												Edicións dispoñibles
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white">
												0
											</div>
										</div>
										<div>
											<span class="text-sm font-medium text-gray-500 dark:text-gray-400">
												En andeis
											</span>
											<div class="mt-1 text-sm text-gray-900 dark:text-white">
												0
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- cover, si no carga saltará el placeholder -->
						<div class="flex flex-col space-y-4">
							<img src="https://covers.openlibrary.org/b/isbn/{{ $book->isbn13 }}-M.jpg"
									 alt="portada de {{ $book->title }}"
									 class="shadow-lg rounded-lg dark:shadow-white/10 bg-gray-200 dark:bg-gray-700"
									 onerror="this.onerror=null; this.src='https://placehold.co/200x300/e5e7eb/9ca3af?text=portada de {{ $book->title }}';"
							>
							@can('books.edit')
								<a href="{{ route('books.edit', $book) }}"
									 class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
									<flux:icon.pencil-square class="w-5 h-5 mr-2" />
									Editar
								</a>
							@endcan
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

							<article>
								<!-- usuario -->
								<div class="flex items-center mb-4">
									<div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
										<svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
												 xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
														clip-rule="evenodd"></path>
										</svg>
									</div>

									<div class="ms-2 font-medium dark:text-white">
										<p>
											Tipo de incógnito
											<time
												datetime="2014-08-16 19:00"
												class="block text-sm text-gray-500 dark:text-gray-400">
												dende agosto 2025
											</time>
										</p>
									</div>
								</div>

								<!-- valoracion -->
								<div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
									@if($book->avg_rating)
										<div class="flex text-amber-400">
											@for($i = 1; $i <= 5; $i++)
												<flux:icon.star
													class="w-4 h-4 {{ $i <= 4 ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"/>
											@endfor
										</div>
									@endif
									<h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">Moi fino</h3>
								</div>
								<footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
									<p>
										<time datetime="2025-03-03 19:00">Marzo 3, 2025</time>
									</p>
								</footer>

								<p class="mb-2 text-gray-500 dark:text-gray-400">
									É a terceira vez que o leo e non será a derradeira. Encántame este libro. Doadísimo de ler,
									entretido, apaixoante e moi recomendado. Hai que lelo unha vez na vida polo menos!
								</p>

								<aside>
									<p class="mt-1 text-xs text-gray-500 dark:text-gray-400">A 19 persoas parecéulles útil</p>
									<div class="flex items-center mt-3">
										<a href="#"
											 class="px-2 py-1.5 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
											Útil
										</a>

										<a href="#"
											 class="ps-4 text-sm font-medium text-amber-600 hover:underline dark:text-amber-500 border-gray-200 ms-4 border-s md:mb-0 dark:border-gray-600">
											Denunciar abuso
										</a>
									</div>
								</aside>
							</article>
						</div>
					@endauth

					<!-- TODO: listar reseñas -->
				</div>
			</div>
		</div>
	</div>

</x-layouts.app>
