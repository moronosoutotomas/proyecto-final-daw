@php use Carbon\Carbon; @endphp
<x-layouts.app xmlns:livewire="http://www.w3.org/1999/html">
	@section('title', 'Libros')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900"
	>
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- TODO: limpiar boilerplate flash messages -->
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

			<!-- header -->
			<div class="mb-8">
				<div class="flex justify-between items-center">
					<div>
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Libros</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Explora a nosa colección de libros</p>
					</div>
					@can('books.create')
						<a href="{{ route('books.create') }}"
							 class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
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
				<livewire:search-bar/>
			</div>

			<!-- tabla -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
						<thead class="bg-gray-50 dark:bg-gray-700">
						<tr>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								ISBN
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								TÍTULO
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								AUTOR
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								PUBLICACIÓN
							</th>
							<th scope="col"
									class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								VALORACIÓN
							</th>

							@role('bibliotecario|lector')
							<th scope="col"
									class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 tracking-wider">
								ACCIÓNS
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
										<img
											class="w-10 h-10 rounded-md"
											src="https://covers.openlibrary.org/b/isbn/{{ $book->isbn13 }}-S.jpg"
											alt="portada de {{ $book->title }}"
										>
										<a href="/books/{{ $book->id }}" class="hover:underline ps-2">
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
									<div class="flex justify-between items-center">

										{{-- TODO --}}
										{{-- https://v2.bladewindui.com/component/dropmenu --}}
										@can('bookshelves.manage')
											<div class="relative" x-data="{ open: false }">
												<button @click="open = !open" @click.away="open = false"
																class="flex items-center space-x-2 px-2 py-2 rounded-md text-sm font-medium duration-300 ease-in-out text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
													<flux:icon.plus-circle/>
												</button>

												{{-- Animación con Alpine.js --}}
												<div x-show="open"
														 x-transition:enter="transition ease-out duration-100"
														 x-transition:enter-start="transform opacity-0 scale-95"
														 x-transition:enter-end="transform opacity-100 scale-100"
														 x-transition:leave="transition ease-in duration-75"
														 x-transition:leave-start="transform opacity-100 scale-100"
														 x-transition:leave-end="transform opacity-0 scale-95"
														 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 dark:bg-gray-900 dark:ring-white dark:ring-opacity-5"
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
											{{-- editar --}}
											<a href="{{ route('books.edit', $book) }}"
												 class="px-2 py-2 text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
												<flux:icon.pencil-square/>
											</a>

											{{-- eliminar --}}
											<form action="{{ route('books.destroy', $book) }}" method="POST"
														class="inline delete-form">
												@csrf
												@method('DELETE')
												<button type="submit"
																class="px-2 py-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors">
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

			<!-- paginacion -->
			@if($books->hasPages())
				<div class="mt-6">
					{{ $books->links() }}
				</div>
			@endif
		</div>
	</div>

</x-layouts.app>
