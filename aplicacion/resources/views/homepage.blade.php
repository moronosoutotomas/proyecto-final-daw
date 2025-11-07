<x-layouts.app>

	@section('title', 'Inicio')

	<div class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:from-blue-950 dark:to-amber-950 py-12">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center py-16">
				<h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
					Benvido a <span class="text-amber-600">Bookbag</span>
				</h1>
				<p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
					atopa e rexistra as túas lecturas
				</p>
				<div class="flex flex-col sm:flex-row gap-4 justify-center">
					<a href="{{ route('books.index') }}"
						 class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-lg font-medium transition duration-300 transform hover:scale-105">
						Explorar libros
					</a>
					<a href="{{ route('about') }}"
						 class="border border-amber-600 text-amber-600 hover:bg-amber-600 hover:text-white px-8 py-3 rounded-lg font-medium transition duration-300">
						Coñece máis
					</a>
				</div>
			</div>
		</div>
	</div>

</x-layouts.app>
