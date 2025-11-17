@php use Carbon\Carbon; @endphp
<x-layouts.app xmlns:livewire="http://www.w3.org/1999/html">
	@section('title', 'Libros')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- flash messages -->
			<x-flash-message />

			<!-- header -->
			<div class="mb-8">
				<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
					<div>
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Libros</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Explora a nosa colección de libros</p>
					</div>
					@can('books.create')
						<a href="{{ route('books.create') }}"
							 class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
							<flux:icon.plus-circle/>
							<span class="mx-1">Novo libro</span>
						</a>
					@endcan
				</div>
			</div>

			<!-- searchbar -->
			<div
				class="mb-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden"
			>
				<livewire:books-search-bar/>
			</div>

			<!-- tabla desktop -->
			<div
				class="hidden md:block bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
						<thead class="bg-gray-50 dark:bg-gray-700">
						<tr>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								ISBN
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Título
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Autor
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Publicación
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Valoración
							</th>

							@role('bibliotecario|lector')
							<th scope="col"
									class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
								Accións
							</th>
							@endrole
						</tr>
						</thead>
						<tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
						@forelse($books as $book)
							<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
								<td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900 dark:text-white">
									<a href="/books/{{ $book->id }}" class="hover:underline">
										{{ $book->isbn13 }}
									</a>
								</td>

								<td class="px-6 py-4">
									<div class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
										
										<!-- cover, si no carga saltará el placeholder -->
										<img
											class="w-10 h-10 rounded-md object-cover bg-gray-200 dark:bg-gray-700"
											src="https://covers.openlibrary.org/b/isbn/{{ $book->isbn13 }}-S.jpg"
											alt="portada de {{ $book->title }}"
											onerror="this.onerror=null; this.src='https://placehold.co/200x300/e5e7eb/9ca3af?text=portada de {{ $book->title }}';"
										>
										<a href="/books/{{ $book->id }}" class="hover:underline ps-2 truncate">
											{{ $book->title }}
										</a>
									</div>
								</td>

								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
									{{ $book->author, 30 }}
								</td>

								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
									{{ $book->publication_date ? Carbon::parse($book->publication_date)->format('d/m/Y') : '-' }}
								</td>

								<td class="px-6 py-4 whitespace-nowrap">
									@if($book->avg_rating)
										<div class="flex items-center">
											<div class="flex text-amber-400">
												@for($i = 1; $i <= 5; $i++)
													<flux:icon.star
														class="w-4 h-4 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"/>
												@endfor
											</div>
										</div>
									@else
										<span class="text-sm text-gray-400 dark:text-gray-500">Sen valorar</span>
									@endif
								</td>

								@role('bibliotecario|lector')
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
									<div class="flex justify-between items-center gap-2">

										{{-- TODO --}}
										{{-- https://v2.bladewindui.com/component/dropmenu --}}
										@can('bookshelves.manage')
											<div class="relative" x-data="{ open: false }">
												<button @click="open = !open" @click.away="open = false"
																class="cursor-pointer flex items-center space-x-2 px-3 py-3 sm:px-2 sm:py-2 rounded-md text-sm font-medium duration-300 ease-in-out text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
													<flux:icon.plus-circle />
												</button>

												{{-- Animación con Alpine.js --}}
												<div x-show="open"
														 x-transition:enter="transition ease-out duration-100"
														 x-transition:enter-start="transform opacity-0 scale-95"
														 x-transition:enter-end="transform opacity-100 scale-100"
														 x-transition:leave="transition ease-in duration-75"
														 x-transition:leave-start="transform opacity-100 scale-100"
														 x-transition:leave-end="transform opacity-0 scale-95"
														 class="absolute right-0 sm:right-0 left-0 sm:left-auto mt-2 w-48 rounded-md shadow-lg bg-white border border-gray-200 dark:border-gray-700 z-50 dark:bg-gray-900"
														 style="display: none;">
													<div class="py-1">
														<form method="POST"
																	action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 1)->first(), 'book' => $book]) }}">
															@csrf
															<button type="submit"
																			class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-green-600 transition duration-150 dark:text-white cursor-pointer">
																Lidos
															</button>
														</form>
														<form method="POST"
																	action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 2)->first(), 'book' => $book]) }}">
															@csrf
															<button type="submit"
																			class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-blue-600 transition duration-150 dark:text-white cursor-pointer">
																Lendo
															</button>
														</form>
														<form method="POST"
																	action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 3)->first(), 'book' => $book]) }}">
															@csrf
															<button type="submit"
																			class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-amber-600 transition duration-150 dark:text-white cursor-pointer">
																Pendentes
															</button>
														</form>
													</div>
												</div>
											</div>
										@endcan

										@can('books.edit')
											{{-- editar --}}
											<a href="{{ route('books.edit', $book) }}"
												 class="px-3 py-3 sm:px-2 sm:py-2 text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
												<flux:icon.pencil-square/>
											</a>

											{{-- eliminar --}}
											<form action="{{ route('books.destroy', $book) }}" method="POST"
														class="inline delete-form">
												@csrf
												@method('DELETE')
												<button type="submit"
																class="px-3 py-3 sm:px-2 sm:py-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors">
													<flux:icon.trash/>
												</button>
											</form>
										@endcan
									</div>
								</td>
								@endrole
							</tr>
						@empty
							<tr>
								<td colspan="6" class="px-6 py-12 text-center">
									<div class="text-gray-500 dark:text-gray-400">
										<flux:icon.book-open
											class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500"/>
										<h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
											Non hai libros
										</h3>
										<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
											Engade o teu primeiro libro.
										</p>
									</div>
								</td>
							</tr>
						@endforelse
						</tbody>
					</table>
				</div>
			</div>

			<!-- cards móvil -->
			<div class="block md:hidden space-y-4">
				@forelse($books as $book)
					<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
						<div class="flex gap-4">
							<!-- cover -->
							<a href="/books/{{ $book->id }}" class="flex-shrink-0">
								<img
									class="w-16 h-24 rounded-md object-cover bg-gray-200 dark:bg-gray-700"
									src="https://covers.openlibrary.org/b/isbn/{{ $book->isbn13 }}-S.jpg"
									alt="portada de {{ $book->title }}"
									onerror="this.onerror=null; this.src='https://placehold.co/200x300/e5e7eb/9ca3af?text={{ substr($book->title, 0, 1) }}';"
								>
							</a>

							<!-- content -->
							<div class="flex-1 min-w-0">
								<a href="/books/{{ $book->id }}" class="block">
									<h3 class="text-base font-semibold text-gray-900 dark:text-white hover:text-amber-600 dark:hover:text-amber-400 line-clamp-2">
										{{ $book->title }}
									</h3>
								</a>

								<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
									{{ $book->author }}
								</p>

								<p class="mt-1 text-xs font-mono text-gray-500 dark:text-gray-500">
									ISBN: {{ $book->isbn13 }}
								</p>

								<div class="mt-2 flex flex-col gap-1">
									@if($book->publication_date)
										<p class="text-xs text-gray-500 dark:text-gray-400">
											{{ Carbon::parse($book->publication_date)->format('d/m/Y') }}
										</p>
									@endif

									@if($book->avg_rating)
										<div class="flex items-center">
											<div class="flex text-amber-400">
												@for($i = 1; $i <= 5; $i++)
													<flux:icon.star
														class="w-3 h-3 {{ $i <= $book->avg_rating ? 'fill-current' : 'text-gray-300 dark:text-gray-600' }}"/>
												@endfor
											</div>
										</div>
									@else
										<span class="text-xs text-gray-400 dark:text-gray-500">Sen valorar</span>
									@endif
								</div>

								@role('bibliotecario|lector')
								<div class="mt-3 flex items-center gap-2 pt-3 border-t border-gray-200 dark:border-gray-700">
									@can('bookshelves.manage')
										<div class="relative" x-data="{ open: false }">
											<button @click="open = !open" @click.away="open = false"
															class="px-3 py-1.5 text-xs font-medium rounded-md text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors border border-blue-600 dark:border-blue-400">
												<flux:icon.plus-circle class="w-4 h-4 inline mr-1"/>
												Añadir
											</button>

											<div x-show="open"
													 x-transition:enter="transition ease-out duration-100"
													 x-transition:enter-start="transform opacity-0 scale-95"
													 x-transition:enter-end="transform opacity-100 scale-100"
													 x-transition:leave="transition ease-in duration-75"
													 x-transition:leave-start="transform opacity-100 scale-100"
													 x-transition:leave-end="transform opacity-0 scale-95"
													 class="absolute left-0 mt-2 w-40 rounded-md shadow-lg bg-white border border-gray-200 dark:border-gray-700 z-50 dark:bg-gray-900"
													 style="display: none;">
												<div class="py-1">
													<form method="POST"
																action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 1)->first(), 'book' => $book]) }}">
														@csrf
														<button type="submit"
																		class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-green-600 transition duration-150 dark:text-white">
															Lidos
														</button>
													</form>
													<form method="POST"
																action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 2)->first(), 'book' => $book]) }}">
														@csrf
														<button type="submit"
																		class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-blue-600 transition duration-150 dark:text-white">
															Lendo
														</button>
													</form>
													<form method="POST"
																action="{{ route('bookshelves.addBook', ['bookshelf' => $bookshelves->where('bookshelf_type_id', 3)->first(), 'book' => $book]) }}">
														@csrf
														<button type="submit"
																		class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-amber-600 transition duration-150 dark:text-white">
															Pendentes
														</button>
													</form>
												</div>
											</div>
										</div>
									@endcan

									@can('books.edit')
										<a href="{{ route('books.edit', $book) }}"
											 class="px-3 py-1.5 text-xs font-medium rounded-md text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors border border-blue-600 dark:border-blue-400">
											<flux:icon.pencil-square class="w-4 h-4 inline"/>
										</a>

										<form action="{{ route('books.destroy', $book) }}" method="POST"
													class="inline delete-form">
											@csrf
											@method('DELETE')
											<button type="submit"
															class="px-3 py-1.5 text-xs font-medium rounded-md text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors border border-red-600 dark:border-red-400">
												<flux:icon.trash class="w-4 h-4 inline"/>
											</button>
										</form>
									@endcan
								</div>
								@endrole
							</div>
						</div>
					</div>
				@empty
					<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
						<div class="text-gray-500 dark:text-gray-400">
							<flux:icon.book-open
								class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500"/>
							<h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">
								Non hai libros
							</h3>
							<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
								Engade o teu primeiro libro.
							</p>
						</div>
					</div>
				@endforelse
			</div>

			<!-- paginacion -->
			@if($books->hasPages())
				<div class="mt-6">
					{{ $books->links() }}
				</div>
			@endif
		</div>
	</div>

</x-layouts.app>
