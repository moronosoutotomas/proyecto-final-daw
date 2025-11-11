<x-layouts.app>
	@section('title', 'Novo libro')

	<div
		class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900"
	>
		<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
			<!-- breadcrumb -->
			<nav class="mb-8">
				<ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
					<li><a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Inicio</a></li>
					<li><span class="mx-2">/</span></li>
					<li><a href="{{ route('books.index') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Libros</a></li>
					<li><span class="mx-2">/</span></li>
					<li class="text-gray-900 dark:text-white">Novo libro</li>
				</ol>
			</nav>

			<!-- form -->
			<div
				class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
				<div class="px-6 py-8">
					<div class="mb-8">
						<h1 class="text-3xl font-bold text-gray-900 dark:text-white">Novo libro</h1>
						<p class="mt-2 text-gray-600 dark:text-gray-400">Engade un novo libro</p>
					</div>

					<form action="{{ route('books.store') }}" method="POST">
						@csrf

						<div class="space-y-6">
							<!-- isbn -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
								<div>
									<label for="isbn10" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
										ISBN-10
									</label>
									<input type="text"
												 name="isbn10"
												 id="isbn10"
												 value="{{ old('isbn10') }}"
												 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('isbn10') border-red-500 @enderror"
												 placeholder="978-84-376-0494-7">
									@error('isbn10')
									<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
									@enderror
								</div>

								<div>
									<label for="isbn13" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
										ISBN-13
									</label>
									<input type="text"
												 name="isbn13"
												 id="isbn13"
												 value="{{ old('isbn13') }}"
												 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('isbn13') border-red-500 @enderror"
												 placeholder="978-84-376-0494-7">
									@error('isbn13')
									<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
									@enderror
								</div>
							</div>

							<!-- title -->
							<div>
								<label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
									Título *
								</label>
								<input type="text"
											 name="title"
											 id="title"
											 value="{{ old('title') }}"
											 required
											 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('title') border-red-500 @enderror"
											 placeholder="O título do libro">
								@error('title')
								<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
								@enderror
							</div>

							<!-- author -->
							<div>
								<label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
									Autor *
								</label>
								<input type="text"
											 name="author"
											 id="author"
											 value="{{ old('author') }}"
											 required
											 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('author') border-red-500 @enderror"
											 placeholder="O nome do autor">
								@error('author')
								<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
								@enderror
							</div>

							<!-- fecha -->
							<div>
								<label for="publication_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
									Data de publicación
								</label>
								<input type="date"
											 name="publication_date"
											 id="publication_date"
											 value="{{ old('publication_date') }}"
											 class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:text-white @error('publication_date') border-red-500 @enderror">
								@error('publication_date')
								<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
								@enderror
							</div>
						</div>

						<!-- actions -->
						<div class="mt-8 flex justify-end space-x-3">
							<a href="{{ route('books.index') }}"
								 class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
								Cancelar
							</a>
							<button type="submit"
											class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
								Engadir
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-layouts.app>
