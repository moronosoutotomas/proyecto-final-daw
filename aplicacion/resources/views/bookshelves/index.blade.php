<x-layouts.app>
	@section('title', 'Os meus andeis')

	<div
		class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 bg-gray-50 border-gray-200 text-gray-900 dark:border-gray-700 dark:text-white">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- flash messages -->
			<x-flash-message />

			<!-- breadcrumb -->
			<nav class="mb-8">
				<ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
					<li>
						<a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Inicio</a>
					</li>
					<li><span class="mx-2">/</span></li>
					<li class="text-gray-900 dark:text-white">Os meus andeis</li>
				</ol>
			</nav>

			<!-- header -->
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

							<!-- preview -->
							@if($bookshelf->books->count() > 0)
								<div class="space-y-2 mb-4">
									@foreach($bookshelf->books as $book)
										<div class="group flex items-center text-sm text-gray-700 dark:text-gray-300">
											@if($bookshelf->id === 1)
												<flux:icon.clock
													variant="outline"
													class="w-4 h-4 mr-2 text-amber-500"
												/>
											@elseif($bookshelf->id === 2)
												<flux:icon.magnifying-glass
													variant="outline"
													class="w-4 h-4 mr-2 text-amber-500"
												/>
											@else
												<flux:icon.bookmark
													variant="outline"
													class="w-4 h-4 mr-2 text-amber-500"
												/>
											@endif
											<span class="truncate">
                        {{ $book->title }}
                      </span>
											<form action="{{ route('bookshelves.removeBook', [$bookshelf, $book]) }}" method="POST"
														class="inline delete-form opacity-0 group-hover:opacity-100">
												@csrf
												@method('DELETE')
												<button type="submit"
																class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
													<flux:icon.trash class="w-4 h-4"/>
												</button>
											</form>
										</div>
									@endforeach
								</div>
							@else
								<div class="text-center py-4">
									<flux:icon.book-open class="mx-auto h-8 w-8 text-gray-400 dark:text-gray-500"/>
									<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Andel baleiro</p>
								</div>
							@endif

							<!-- actions -->
							<!-- TODO: estaria chulo meter una modal aqui que permitiese añadir un array de libros de una tacada -->
							{{--<div class="flex space-x-2">
									<a href="{{ route('books.index') }}"
										 class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
											<flux:icon.plus-circle/>
											Engadir libros a este andel
									</a>
							</div>--}}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</x-layouts.app>

